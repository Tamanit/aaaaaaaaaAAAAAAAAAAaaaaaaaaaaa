import DefaultLayout from "../../layouts/DefaultLayout.jsx";
import SearchBar from "../../components/SearchBar/SearchBar.jsx";
import {Col, Container, Row} from "reactstrap";
import BookingCards from "../../components/BookingCards/BookingCards.jsx";
import BookingFilter from "../../components/Filter/BookingFilter.jsx";

export default () => {
    return (
        <DefaultLayout>
            <SearchBar errorMessage="erwerw"/>
            <Container fluid className="px-2">
                <Row>
                    <Col className="col-4"><BookingFilter/></Col>
                    <Col className="col-8"><BookingCards/></Col>
                </Row>
            </Container>
        </DefaultLayout>
    )
}
