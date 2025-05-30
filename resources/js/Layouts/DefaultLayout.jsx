import {
    Container,
    NavbarToggler,
    Collapse,
    Navbar,
    Nav,
    NavItem,
    DropdownMenu,
    UncontrolledDropdown,
    DropdownToggle,
    DropdownItem
} from "reactstrap";
import Head from "../components/Head.jsx";
import {Link, usePage} from '@inertiajs/react'

export default ({children, title, isAuthenticated}) => {
    return (
        <>
            <Head title={title}/>
            <Navbar className="position-static z-3">
                <Nav className="me-auto d-flex flex-row fixed-top" >

                    <NavItem className="align-self-center" >
                        {isAuthenticated ? (
                            <Link href="/logout" method="post" as="button">
                                Выйти
                            </Link>
                        ) : (
                            <Link href="/login" method="get" as="button">
                                Войти
                            </Link>
                        )}
                    </NavItem>
                </Nav>

            </Navbar>
            {children}
        </>
    )
}
