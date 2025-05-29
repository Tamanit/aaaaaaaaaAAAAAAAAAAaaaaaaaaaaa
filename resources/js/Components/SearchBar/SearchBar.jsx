import {Button, Col, Container, FormFeedback, FormGroup, Input, Row, Spinner} from "reactstrap";

export default ({errorMessage}) => {
    return (
        <Container fluid className="bg-primary py-1 ">
            <Col
                className="flex"
                md={{
                    offset: 3,
                    size: 6
                }}
                sm="12"
            >
                <FormGroup className="position-relative my-2 d-flex gap-1">

                    <Input
                        className="h-auto"
                        invalid={errorMessage}
                        placeholder="Поиск . . ."
                    />
                    <Button>
                        <Spinner size="sm"/>
                    </Button>
                    <FormFeedback tooltip>
                        {errorMessage}
                    </FormFeedback>
                </FormGroup>
            </Col>
        </Container>
    )
}
