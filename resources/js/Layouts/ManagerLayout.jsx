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
                    <UncontrolledDropdown nav inNavbar>
                        <DropdownToggle nav caret>
                            CRM
                        </DropdownToggle>
                        <DropdownMenu  className="position-absolute">
                            <DropdownItem> <Link href="/managerRent" method="get"> Аренды </Link></DropdownItem>
                            <DropdownItem> <Link href="/managerOrganisation" method="get"> Арендаторы </Link></DropdownItem>
                            <DropdownItem> <Link href="/managerReq" method="get"> Заявки</Link> </DropdownItem>
                        </DropdownMenu>
                    </UncontrolledDropdown>
                    <UncontrolledDropdown nav inNavbar>
                        <DropdownToggle nav caret>
                            Документы
                        </DropdownToggle>
                        <DropdownMenu  className="position-absolute">
                            <DropdownItem><Link href="/"> Договоры </Link></DropdownItem>
                            <DropdownItem><Link href="/"> Акты </Link></DropdownItem>
                            <DropdownItem><Link href="/"> Счета </Link></DropdownItem>
                            <DropdownItem><Link href="/"> Прайс лист </Link></DropdownItem>
                        </DropdownMenu>
                    </UncontrolledDropdown>
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
