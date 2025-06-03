import RentLayout from "@/Layouts/RentLayout.jsx";
import {
    Alert,
    Badge,
    Button, ButtonGroup,
    Card,
    CardBody,
    CardImg,
    CardSubtitle,
    CardText,
    CardTitle,
    Col,
    Container,
    Form, FormGroup,
    Input,
    InputGroup, InputGroupText, Label,
    Modal,
    ModalBody,
    ModalFooter,
    Offcanvas,
    OffcanvasBody,
    OffcanvasHeader,
    Pagination,
    PaginationItem,
    PaginationLink,
    Row
} from "reactstrap";
import {router, usePage} from "@inertiajs/react";
import {useRef, useState} from "react";

export default ({meta, paginator, linkToPublic}) => {
    const [modal, setModal] = useState(false);
    const [openOffcanvas, setOpenOffcanvas] = useState(false);
    const [paginatorState, setParinatorState] = useState(paginator);
    const props = usePage().props
    const currentRoomId = useRef()

    const startTimeButtons = [
        {label: '8:00 - 8:30', active: false, disabled: false},
        {label: '8:30 - 9:00', active: false, disabled: false},
        {label: '9:00 - 9:30', active: false, disabled: false},
        {label: '9:30 - 10:00', active: false, disabled: false},
        {label: '10:00 - 10:30', active: false, disabled: false},
        {label: '10:30 - 11:00', active: false, disabled: false},
        {label: '11:00 - 11:30', active: false, disabled: false},
        {label: '11:30 - 12:00', active: false, disabled: false},
        {label: '12:00 - 12:30', active: false, disabled: false},
        {label: '12:30 - 13:00', active: false, disabled: false},
        {label: '13:00 - 13:30', active: false, disabled: false},
        {label: '13:30 - 14:00', active: false, disabled: false},
        {label: '14:00 - 14:30', active: false, disabled: false},
        {label: '14:30 - 15:00', active: false, disabled: false},
        {label: '15:00 - 15:30', active: false, disabled: false},
        {label: '15:30 - 16:00', active: false, disabled: false},
        {label: '16:00 - 16:30', active: false, disabled: false},
        {label: '16:30 - 17:00', active: false, disabled: false},
        {label: '17:00 - 17:30', active: false, disabled: false},
        {label: '17:30 - 18:00', active: false, disabled: false},
        {label: '18:00 - 18:30', active: false, disabled: false},
        {label: '18:30 - 19:00', active: false, disabled: false},
        {label: '19:00 - 19:30', active: false, disabled: false},
        {label: '19:30 - 20:00', active: false, disabled: false},
        {label: '20:00 - 20:30', active: false, disabled: false},
        {label: '20:30 - 21:00', active: false, disabled: false}
    ];

    const [timeButtons, setTimeButtons] = useState(startTimeButtons)

    const [date, setDate] = useState((new Date()).toISOString().substring(0, 10))

    const [modelMessage, setModalMessage] = useState(false);

    const [message, setMessage] = useState('');

    const toggle = () => setModal(!modal);

    let offcanvasShow = () => {
        setOpenOffcanvas(openOffcanvas => !openOffcanvas)
    }

    async function submitSearch(e) {
        e.preventDefault()

        let formData = new FormData(e.target);
        const url = "/tenant/booking/search";
        try {
            const response = await fetch(url, {
                method: 'POST',
                body: formData,
            });

            if (!response.ok) {
                throw new Error(`Response status: ${response.status}`);
            }

            const json = await response.json();

            setParinatorState(json);
        } catch (error) {
            console.error(error.message);
        }
    }

    async function updateTimeBooking(time = null) {
        try {
            const url = '/tenant/booking/createForm?'
            const response = await fetch(url + new URLSearchParams({
                room_id: currentRoomId.current,
                date: time ?? date,
            }).toString()
            );

            if (!response.ok) {
                throw new Error(`Response status: ${response.status}`);
            }

            const json = await response.json();


            const bookedTime = json.flat();
            const tmpTimeButtons = [...startTimeButtons]

            console.log(bookedTime);

            bookedTime.map(time => {
                Object.assign(tmpTimeButtons.find(button => button.label === time),
                    {
                        disabled: true
                    })
            })

            console.log(tmpTimeButtons)

            setTimeButtons(tmpTimeButtons);

        } catch (error) {
            console.error(error.message);
        }
    }

    async function showModalBooking(e) {
        e.preventDefault();

        currentRoomId.current = e.target.dataset.roomtarget;

        await updateTimeBooking();

        setModal(true);
    }

    async function updateTime(e) {
        setDate(e.target.value)

        await updateTimeBooking(e.target.value);
    }

    function changeButtons(e) {
        e.preventDefault();

        let tmpTimeButtons = [...timeButtons];

        tmpTimeButtons[e.target.dataset.index].active = !tmpTimeButtons[e.target.dataset.index].active

        setTimeButtons(tmpTimeButtons);
    }

    async function submitBooking(e) {
        e.preventDefault();

        const url = "/tenant/booking/createBooking";
        try {

            let tmpTimeButtons = [...timeButtons];
            tmpTimeButtons = tmpTimeButtons.filter(timeButton => timeButton.active === true)

            const timeSlots = tmpTimeButtons.map(e => {
                return e.label;
            })

            const response = await fetch(url, {
                method: 'POST',
                body: JSON.stringify({
                    room_id: currentRoomId.current,
                    date: date,
                    time_slots: timeSlots,
                    _token: props.csrf,
                }),
                headers: {
                    "Content-Type": "application/json",
                }
            });

            if (!response.ok) {
                throw new Error(`Response status: ${response.status}`);
            }

            const json = await response.json();

            setModal(false);

            setMessage(json[0] + (json[1] ? ' Занятое время: ' + json[1] : ''));
            setModalMessage(true);

        } catch (error) {
            console.error(error.message);
        }
    }

    return (
        <RentLayout>
            <Container>
                <h2>{meta.h2}</h2>
                <Row>
                    <Button className="col-2 btn-icon btn-3" onClick={offcanvasShow} outline>
                        <span className="btn-inner--icon">
                            {openOffcanvas ? <i className="ni ni-bold-left"/> : <i className="ni ni-bold-right"/>}
                        </span>
                        <span className="btn-inner--text">Фильтр</span>
                    </Button>
                    <Form
                        className="col-8"
                        onSubmit={submitSearch}
                    >
                        <InputGroup>
                            <InputGroupText>
                                <i className="ni ni-world-2"></i>
                            </InputGroupText>
                            <Input name="search" type="search"/>
                        </InputGroup>
                        <input type="hidden" name="_token" value={props.csrf}/>
                    </Form>
                    <Offcanvas
                        isOpen={openOffcanvas}
                        fade={true}
                        toggle={offcanvasShow}
                    >
                        <OffcanvasHeader toggle={offcanvasShow}>
                            Фильтр
                        </OffcanvasHeader>
                        <OffcanvasBody>

                        </OffcanvasBody>
                    </Offcanvas>
                </Row>
                <Row className="my-5 justify-content-center gap-3">
                    {paginatorState.data.map((row, i) => {
                        return (

                            <Card top className="col-5">
                                {row.img ? <CardImg
                                        alt={row.img_alt}
                                        src={linkToPublic + '/' + row.img}
                                        style={{
                                            height: 180
                                        }}
                                        top
                                        width="100%"
                                    />
                                    : null}
                                <CardBody>
                                    <CardTitle tag="h5">
                                        {row.name}
                                    </CardTitle>
                                    <CardSubtitle
                                        className="d-flex flex-wrap gap-1"
                                    >
                                        {JSON.parse(row.inventory).map(item => <Badge color="info">{item}</Badge>)}
                                    </CardSubtitle>
                                    <CardText>
                                        {row.description}
                                    </CardText>
                                    <Button
                                        data-roomtarget={row.id}
                                        onClick={showModalBooking}>
                                        Арендовать
                                    </Button>
                                </CardBody>
                            </Card>
                        )
                    })}
                </Row>
                <Row>
                    <Col className=" d-flex justify-content-center">
                        <Pagination className=" d-flex justify-content-center gap-3">
                            <PaginationItem>
                                <PaginationLink first href={paginatorState.first_page_url} onClick={(e) => {
                                    e.preventDefault();
                                    router.visit(paginatorState.first_page_url)
                                }}/>
                            </PaginationItem>
                            {
                                paginatorState.prev_page_url
                                    ? <PaginationItem>
                                        <PaginationLink
                                            previous
                                            href={paginatorState.prev_page_url}
                                            onClick={(e) => {
                                                e.preventDefault();
                                                router.visit(paginatorState.prev_page_url)
                                            }}/>
                                    </PaginationItem>
                                    : null
                            }
                            {paginatorState.links.slice(1, paginatorState.links.length - 1).map((link) => {
                                return (<PaginationItem disabled={!link.url}
                                                        active={link.active}><PaginationLink
                                    href={link.url} onClick={(e) => {
                                    e.preventDefault();
                                    router.visit(link.url)
                                }}>{link.label}</PaginationLink> </PaginationItem>)
                            })}
                            {
                                paginatorState.next_page_url
                                    ?
                                    <PaginationItem>
                                        <PaginationLink
                                            next
                                            href={paginatorState.next_page_url}
                                            onClick={(e) => {
                                                e.preventDefault();
                                                router.visit(paginatorState.next_page_url)
                                            }}/></PaginationItem>
                                    : null
                            }
                            <PaginationItem>
                                <PaginationLink last href={paginatorState.last_page_url} onClick={(e) => {
                                    e.preventDefault();
                                    router.visit(paginatorState.last_page_url)
                                }}/>
                            </PaginationItem>

                        </Pagination>
                    </Col>
                </Row>
            </Container>
            <Modal isOpen={modal} toggle={toggle}>
                <ModalBody className="d-flex flex-column gap-2">
                    <FormGroup>
                        <Label>Выбор даты</Label>
                        <Input type="date" value={date} onChange={updateTime}/>

                    </FormGroup>
                    <FormGroup>
                        <Label>Выбор времени</Label>
                        <ButtonGroup className="d-flex flex-wrap">
                            {timeButtons.map((button, i) => {
                                return <Button key={i} data-index={i} active={button.active} disabled={button.disabled}
                                               onClick={changeButtons}>{button.label}</Button>
                            })}
                        </ButtonGroup>
                    </FormGroup>
                </ModalBody>
                <ModalFooter>
                    <Button color="primary" onClick={submitBooking}>
                        Забронировать
                    </Button>
                </ModalFooter>
            </Modal>
            <Modal centered isOpen={modelMessage} toggle={() => setModalMessage(false)} className="rounded">
                <ModalBody className="d-flex justify-content-center align-items-center bg-success rounded ">
                    <Alert color="transparent">{message}</Alert>
                </ModalBody>
            </Modal>
        </RentLayout>
    )
}
