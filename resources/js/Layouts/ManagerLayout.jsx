import {
    Navbar,
    Nav,
    DropdownMenu,
    UncontrolledDropdown,
    DropdownToggle,
    DropdownItem, NavbarToggler, Collapse, NavbarText, Button
} from "reactstrap";
import Head from "../components/Head.jsx";
import {Link, router, usePage} from '@inertiajs/react'
import {useState} from "react";

export function route(e) {
    e.preventDefault();
    router.visit(e.target.href);
}

export default ({children, title}) => {
    const [isOpen, setIsOpen] = useState(false);

    const auth = usePage().props.auth;
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
                                <DropdownItem href="/manager/booking" onClick={route}>Бронирования</DropdownItem>
                                <DropdownItem href="/manager/rents" onClick={route}>Аренды</DropdownItem>
                                <DropdownItem href="/manager/users" onClick={route}>Арендаторы</DropdownItem>
                                <DropdownItem href="/manager/organizations" onClick={route}>Организации</DropdownItem>
                                <DropdownItem href="/manager/reqs" onClick={route}>Обращения</DropdownItem>
                            </DropdownMenu>
                        </UncontrolledDropdown>
                        <UncontrolledDropdown nav inNavbar>
                            <DropdownToggle nav caret>Документы</DropdownToggle>
                            <DropdownMenu>
                                <DropdownItem href="/manager/contracts" onClick={route}>Договоры</DropdownItem>
                                <DropdownItem href="/manager/acts" onClick={route}>Акты</DropdownItem>
                                <DropdownItem href="/manager/bills" onClick={route}>Счета</DropdownItem>
                                <DropdownItem href="/manager/price-lists" onClick={route}>Прайс листы</DropdownItem>
                                <DropdownItem href="/manager/tariffs" onClick={route}>Тарифы</DropdownItem>
                            </DropdownMenu>
                        </UncontrolledDropdown>
                        <UncontrolledDropdown nav inNavbar>
                            <DropdownToggle nav caret>Сервис</DropdownToggle>
                            <DropdownMenu>
                                <DropdownItem href="/manager/rent-unit-types" onClick={route}>Типы арендуемых единиц</DropdownItem>
                                <DropdownItem href="/manager/rent-units" onClick={route}>Арендуемые еденицы</DropdownItem>
                                <DropdownItem href="/manager/rooms" onClick={route}>Помещения</DropdownItem>
                            </DropdownMenu>
                        </UncontrolledDropdown>
                    </Nav>
                    <NavbarText>
                        {auth['user'] ? (
                            <Button onClick={e => {e.preventDefault(); router.post('/logout')}}>
                                Выйти
                            </Button>
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
