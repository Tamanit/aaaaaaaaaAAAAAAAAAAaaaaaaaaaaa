import {Container} from "reactstrap";
import Head from "../components/Head.jsx";

export default ({children, title}) => {
    return (
        <>
            <Head title={title}/>
            <Container
                className="
            h-100
            d-flex
            justify-content-center
            align-items-center
            "
            >
                {children}
            </Container>
        </>
    )
}
