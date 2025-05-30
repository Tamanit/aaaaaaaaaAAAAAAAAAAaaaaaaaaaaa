import {
    Navbar,
    Nav,
    DropdownMenu,
    UncontrolledDropdown,
    DropdownToggle,
    DropdownItem, NavbarToggler, Collapse, NavbarText
} from "reactstrap";
import Head from "../components/Head.jsx";
import {Link, router} from '@inertiajs/react'
import {useState} from "react";

export function route(e) {
    e.preventDefault();
    router.visit(e.target.href);
}

export default ({children, title, isAuthenticated}) => {
    const [isOpen, setIsOpen] = useState(false);
    return (
        <>
            <Head title={title}/>
            <Navbar color="primary" fixed="top" dark expand="md">
                <NavbarToggler onClick={() => setIsOpen(!isOpen)}/>
                <Collapse isOpen={isOpen} navbar>
                    <Nav className="me-auto" navbar>
                        <UncontrolledDropdown nav inNavbar>
                            <DropdownToggle nav caret>CRM</DropdownToggle>
                            <DropdownMenu>
                                <DropdownItem href="/rents" onClick={route}>Аренды</DropdownItem>
                                <DropdownItem href="/users" onClick={route}>Арендаторы</DropdownItem>
                                <DropdownItem href="/reqs" onClick={route}>Обращения</DropdownItem>
                            </DropdownMenu>
                        </UncontrolledDropdown>
                        <UncontrolledDropdown nav inNavbar>
                            <DropdownToggle nav caret>Документы</DropdownToggle>
                            <DropdownMenu>
                                <DropdownItem href="/contracts" onClick={route}>Договоры</DropdownItem>
                                <DropdownItem href="/acts" onClick={route}>Акты</DropdownItem>
                                <DropdownItem href="/bills" onClick={route}>Счета</DropdownItem>
                                <DropdownItem href="/price-lists" onClick={route}>Прайс листы</DropdownItem>
                            </DropdownMenu>
                        </UncontrolledDropdown>
                    </Nav>
                    <NavbarText>
                        {isAuthenticated ? (
                            <Link href="/logout" method="post" as="button">
                                Выйти
                            </Link>
                        ) : (
                            <Link href="/login" method="get" as="button">
                                Войти
                            </Link>
                        )}
                    </NavbarText>
                </Collapse>
            </Navbar>
            <div className="h-20"></div>
            {children}
        </>
    )
}
