import {
    Navbar,
    Nav,
    DropdownMenu,
    UncontrolledDropdown,
    DropdownToggle,
    DropdownItem, NavbarToggler, Collapse, NavbarText, NavLink, NavItem
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
            <Navbar color="info" fixed="top" dark expand="md">
                <NavbarToggler onClick={() => setIsOpen(!isOpen)}/>
                <Collapse isOpen={isOpen} navbar>
                    <Nav className="me-auto" navbar>
                        <UncontrolledDropdown nav inNavbar>
                            <DropdownToggle nav caret>Аренда</DropdownToggle>
                            <DropdownMenu>
                                <DropdownItem href="/lk/rents" onClick={route}>Арендовать рабочее место</DropdownItem>
                                <DropdownItem href="/lk/bookings" onClick={route}>Забронировать помещение</DropdownItem>
                            </DropdownMenu>
                        </UncontrolledDropdown>
                        <UncontrolledDropdown nav inNavbar>
                            <DropdownToggle nav caret>Документы</DropdownToggle>
                            <DropdownMenu>
                                <DropdownItem href="//lkcontracts" onClick={route}>Договоры</DropdownItem>
                                <DropdownItem href="/lk/acts" onClick={route}>Акты</DropdownItem>
                                <DropdownItem href="/lk/bills" onClick={route}>Счета</DropdownItem>
                                <DropdownItem href="/lk/price-lists" onClick={route}>Прайс листы</DropdownItem>
                                <DropdownItem href="/lk/tariffs" onClick={route}>Тарифы</DropdownItem>
                            </DropdownMenu>
                        </UncontrolledDropdown>
                        <NavItem>
                            <NavLink href="/lk/components/">Нужна помощь?</NavLink>
                        </NavItem>
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
