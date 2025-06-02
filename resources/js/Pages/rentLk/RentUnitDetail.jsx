import DefaultLayout from "../../layouts/DefaultLayout.jsx";
import SearchBar from "../../components/SearchBar/SearchBar.jsx";
import {Button, Card, CardBody, CardSubtitle, CardText, CardTitle, Col, Container, Row} from "reactstrap";
import BookingCards from "../../components/BookingCards/BookingCards.jsx";
import BookingFilter from "../../components/Filter/BookingFilter.jsx";

export default () => {
    return (
        <DefaultLayout>
            <Container fluid className="col-6 m-auto">
                <Row>
                    <img src="" className="rounded float-left" alt="..."/>
                </Row>
                <Row>
                    <Card
                        style={{
                        }}
                        top
                        width="100%"
                    >
                        <CardBody>
                            <CardTitle tag="h5">
                                Юнит такойто
                            </CardTitle>
                            <CardSubtitle
                                className="mb-2 text-muted"
                                tag="h6"
                            >
                                Тип такойто
                            </CardSubtitle>
                            <CardText>
                                какоето описание
                            </CardText>
                            <Button>
                                Забронировать
                            </Button>
                        </CardBody>
                    </Card>
                </Row>
            </Container>
        </DefaultLayout>
    )
}
