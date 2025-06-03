import RentLayout from "@/Layouts/RentLayout.jsx";
import {
    Button, ButtonGroup,
    Card,
    CardBody, CardImg,
    CardSubtitle,
    CardText,
    CardTitle,
    Col,
    Container, FormFeedback, FormGroup, Input, Label, Modal, ModalBody, ModalFooter, ModalHeader,
    Pagination,
    PaginationItem, PaginationLink,
    Row
} from "reactstrap";
import {router, usePage} from "@inertiajs/react";
import React, {useState} from "react";

export default ({meta, paginator, linkToPublic}) => {
    const url = usePage().url;
    const [modal, setModal] = useState(false);

    const toggle = () => setModal(!modal);

    return (
        <RentLayout>
            <Container>
                <h2>{meta.h2}</h2>
                <Row>
                    {paginator.data.map((row, i) => {
                        return (
                            <Col className="col-6">
                                <Card>
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
                            </Col>
                        )
                    })}
                </Row>
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
                    <FormGroup row className="mb-4">
                        <Label sm={3}>Желаемая дата аренды</Label>
                        <Col sm={9} className="position-relative">
                            <Input
                                type="date"
                            >
                            </Input>
                        </Col>
                    </FormGroup>
                    <FormGroup row className="mb-4">
                        <Label sm={3}>Срок аренды</Label>
                        <Col sm={9} className="position-relative">
                            <Input
                                type="select"
                            >
                                <option>1 месяц</option>
                                <option>2 месяца</option>
                                <option>3 месяца</option>
                            </Input>
                        </Col>
                    </FormGroup>
                    <FormGroup row className="mb-4">
                        <Label sm={3}>Кол-во рабочих мест</Label>
                        <Col sm={9} className="position-relative">
                            <Input
                                type="select"
                            >
                                <option>1 месяц</option>
                                <option>2 месяца</option>
                                <option>3 месяца</option>
                            </Input>
                        </Col>
                    </FormGroup>
                </ModalBody>
                <ModalFooter>
                    <Button color="primary" onClick={toggle}>
                        Арендовать
                    </Button>
                </ModalFooter>
            </Modal>
        </RentLayout>
    )
}
