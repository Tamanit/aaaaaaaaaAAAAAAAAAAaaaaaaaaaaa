import {
    Navbar,
    Nav,
    DropdownMenu,
    UncontrolledDropdown,
    DropdownToggle,
    DropdownItem, NavbarToggler, Collapse, NavbarText, NavLink, NavItem, Button
} from "reactstrap";
import Head from "../components/Head.jsx";
import {Link, router, usePage} from '@inertiajs/react'
import {useState} from "react";

export function route(e) {
    e.preventDefault();
    router.visit(e.target.href);
}

const tenantWorker = [
    'Сотрудник арендатора'
];

const tenantAdmin = [
    'Администратор арендатора'
];



export default ({children, title}) => {
    const [isOpen, setIsOpen] = useState(false);

    const user = usePage().props.auth.user;

    const checkAdmin = () => {
        return tenantAdmin.includes(user.role);
    }


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
                                {checkAdmin() ? <DropdownItem href="/tenant/rents" onClick={route}>Арендовать рабочее место</DropdownItem> : null}
                                <DropdownItem href="/tenant/bookings" onClick={route}>Забронировать помещение</DropdownItem>
                            </DropdownMenu>
                        </UncontrolledDropdown>
                        {checkAdmin() ?
                        <UncontrolledDropdown nav inNavbar>
                            <DropdownToggle nav caret>Документы</DropdownToggle>
                            <DropdownMenu>
                                <DropdownItem href="/tenant/contracts" onClick={route}>Договоры</DropdownItem>
                                <DropdownItem href="/tenant/acts" onClick={route}>Акты</DropdownItem>
                                <DropdownItem href="/tenant/bills" onClick={route}>Счета</DropdownItem>
                                <DropdownItem href="/tenant/price-lists" onClick={route}>Прайс листы</DropdownItem>
                                <DropdownItem href="/tenant/tariffs" onClick={route}>Тарифы</DropdownItem>
                            </DropdownMenu>
                        </UncontrolledDropdown>
                            : null }
                        <NavItem>
                            <NavLink href="/tenant/components/">Нужна помощь?</NavLink>
                        </NavItem>
                    </Nav>
                    <NavbarText>
                        {user ? (
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
