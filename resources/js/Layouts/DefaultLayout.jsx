import {Container, Navbar} from "reactstrap";
import Head from "../components/Head.jsx";

export default ({children, title}) => {
    return (
        <>
            <Head title={title}/>
            <Navbar
                className="navbar-horizontal navbar-dark bg-default"
                expand="lg"
            >
            </Navbar>
            {children}
        </>
    )
}
