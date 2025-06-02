import RentLayout from "@/Layouts/RentLayout.jsx";
import {
    Button, ButtonGroup,
    Card,
    CardBody, CardImg,
    CardSubtitle,
    CardText,
    CardTitle,
    Col,
    Container, Input, Modal, ModalBody, ModalFooter, ModalHeader,
    Pagination,
    PaginationItem, PaginationLink,
    Row
} from "reactstrap";
import {router, usePage} from "@inertiajs/react";
import {useState} from "react";

export default ({meta, paginator, linkToPublic}) => {
    const url = usePage().url;
    const [modal, setModal] = useState(false);

    const toggle = () => setModal(!modal);

    return (
        <RentLayout>

            <Container>
                <h2>{meta.h2}</h2>

                {paginator.data.map((row, i) => {
                    return (
                        <Row
                            className="mb-2"

                        >
                            <Col>
                                <Row>
                                    <Card top width="100%">
                                        {row.img ? <CardImg
                                                alt={row.ing_alt}
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
                                            <CardText>
                                                {row.description}
                                            </CardText>
                                            <Button
                                                onClick={toggle}>
                                                Арендовать
                                            </Button>
                                        </CardBody>
                                    </Card>
                                </Row>
                            </Col>
                        </Row>
                    )
                })}
                <Row>
                    <Col className=" d-flex justify-content-center">
                        <Pagination className=" d-flex justify-content-center gap-3">
                            <PaginationItem>
                                <PaginationLink first href={paginator.first_page_url} onClick={(e) => {
                                    e.preventDefault();
                                    router.visit(paginator.first_page_url)
                                }}/>
                            </PaginationItem>
                            {
                                paginator.prev_page_url
                                    ? <PaginationItem><PaginationLink previous
                                                                      href={paginator.prev_page_url}
                                                                      onClick={(e) => {
                                                                          e.preventDefault();
                                                                          router.visit(paginator.prev_page_url)
                                                                      }}/></PaginationItem>
                                    : null
                            }
                            {paginator.links.slice(1, paginator.links.length - 1).map((link) => {
                                return (<PaginationItem disabled={!link.url}
                                                        active={link.active}><PaginationLink
                                    href={link.url} onClick={(e) => {
                                    e.preventDefault();
                                    router.visit(link.url)
                                }}>{link.label}</PaginationLink> </PaginationItem>)
                            })}
                            {
                                paginator.next_page_url
                                    ?
                                    <PaginationItem><PaginationLink next href={paginator.next_page_url}
                                                                    onClick={(e) => {
                                                                        e.preventDefault();
                                                                        router.visit(paginator.next_page_url)
                                                                    }}/></PaginationItem>
                                    : null
                            }
                            <PaginationItem>
                                <PaginationLink last href={paginator.last_page_url} onClick={(e) => {
                                    e.preventDefault();
                                    router.visit(paginator.last_page_url)
                                }}/>
                            </PaginationItem>

                        </Pagination>
                    </Col>
                </Row>
            </Container>
            <Modal isOpen={modal} toggle={toggle}>
                <ModalBody className="d-flex flex-column gap-2">
                    <Input type="date"/>
                    <ButtonGroup className="d-flex flex-wrap">
                        <Button>09:00</Button>
                        <Button>09:30</Button>
                        <Button>10:00</Button>
                        <Button>10:30</Button>
                        <Button>11:00</Button>
                        <Button>11:30</Button>
                        <Button>12:00</Button>
                        <Button>12:30</Button>
                        <Button>13:00</Button>
                        <Button>13:30</Button>
                        <Button>14:00</Button>
                        <Button>14:30</Button>
                        <Button>15:00</Button>
                        <Button>15:30</Button>
                        <Button>16:00</Button>
                        <Button>16:30</Button>
                        <Button>17:00</Button>
                        <Button>17:30</Button>
                        <Button>18:00</Button>
                    </ButtonGroup>
                </ModalBody>
                <ModalFooter>
                    <Button color="primary" onClick={toggle}>
                        Забронировать
                    </Button>
                </ModalFooter>
            </Modal>
        </RentLayout>
    )
}
