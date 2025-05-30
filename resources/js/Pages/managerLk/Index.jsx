import ManagerLayout from "@/Layouts/ManagerLayout.jsx";
import {  route } from "@/Layouts/ManagerLayout.jsx";
import {
    Alert,
    Button,
    Col,
    Container,
    Nav,
    NavItem, NavLink,
    Pagination,
    PaginationItem,
    PaginationLink,
    Row,
    Table
} from "reactstrap";
import {Link, router} from "@inertiajs/react";

export default ({meta, paginator}) => {
    return (
        <ManagerLayout>
            <Container fluid>
                <Row className="my-3">
                    <Col>
                        <h2>{meta.h2}</h2>
                        <Alert color="info">Всего записей: {paginator.total}</Alert>
                        <Nav pills>
                            <NavItem><NavLink href={window.location.pathname + '/create' } onClick={route}>Создать <i
                                className="ni ni-fat-add"></i></NavLink></NavItem>
                        </Nav>
                    </Col>
                </Row>
                <Row>
                    <Col>
                        <Table striped borderless responsive size="sm" hover>
                            <thead>
                            <tr>
                                {meta.columns.map((columnName, i) => {
                                    return (<th key={i}>{columnName.label}</th>)
                                })}
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            {paginator.data.map((row, i) => {
                                return (<tr>
                                    {meta.columns.map((columnName, i) => {
                                        return (<td key={i}>{row[columnName.attribute]}</td>)
                                    })}
                                    <td
                                        className="d-flex flex-row-reverse gap-2"
                                    >
                                        <Link href={window.location.pathname + '/' + row.id}
                                              method="DELETE"><i className=" ni ni-fat-remove"></i></Link>

                                        <Link href={window.location.pathname + '/' + row.id + '/edit'}><i
                                        className="ni ni-settings-gear-65"></i></Link>
                                    </td>
                                </tr>)
                            })}
                            </tbody>
                        </Table>
                    </Col>
                </Row>
                <Row>
                    <Col className=" d-flex justify-content-center">
                        <Pagination className=" d-flex justify-content-center gap-3">
                            <PaginationItem>
                                <PaginationLink first href={paginator.first_page_url} onClick={(e) => {e.preventDefault(); router.visit(paginator.first_page_url)}}/>
                            </PaginationItem>
                            {
                                paginator.prev_page_url
                                ? <PaginationItem><PaginationLink previous href={paginator.prev_page_url} onClick={(e) => {e.preventDefault(); router.visit(paginator.prev_page_url)}}/></PaginationItem>
                                : null
                            }
                            { paginator.links.slice(1, paginator.links.length - 1).map((link) => {
                                return (<PaginationItem disabled={!link.url} active={link.active}><PaginationLink href={link.url} onClick={(e) => {e.preventDefault(); router.visit(link.url)}}>{link.label}</PaginationLink> </PaginationItem>)
                            })}
                            {
                                paginator.next_page_url
                                    ? <PaginationItem><PaginationLink next href={paginator.next_page_url} onClick={(e) => {e.preventDefault(); router.visit(paginator.next_page_url)}}/></PaginationItem>
                                    : null
                            }
                            <PaginationItem>
                                <PaginationLink last href={paginator.last_page_url} onClick={(e) => {e.preventDefault(); router.visit(paginator.last_page_url)}}/>
                            </PaginationItem>

                        </Pagination>
                    </Col>
                </Row>
            </Container>
        </ManagerLayout>
    )
}
