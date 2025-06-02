import {Head, usePage} from '@inertiajs/react';
import {Alert, Button, Col, Container, Form, FormGroup, Input, Label, Table} from "reactstrap";
import ManagerLayout from "@/Layouts/ManagerLayout.jsx";

export default function ManagerRent() {
    // const {organisations} = usePage().props;
    return (
        <ManagerLayout>
            <Head title="Создание акта"/>

            <Container fluid>
                <Col className="col-6 m-auto">
                    <Alert color="info">
                        Создание акта
                    </Alert>
                    <Form>
                        <FormGroup>
                            <Label for="act_type">
                                Тип акта
                            </Label>
                            <Input
                                id="act_type"
                                name="act_type"
                                type="select"
                            >
                                <option>
                                    1
                                </option>
                                <option>
                                    2
                                </option>
                            </Input>
                        </FormGroup>
                        <FormGroup>
                            <Table size="sm">
                                <thead>
                                <tr>
                                    <th>
                                        Имущество
                                    </th>
                                    <th>
                                        Техническое состояние
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">
                                        <Input
                                            id="1"
                                            name="1"
                                            type="select"
                                        >
                                            <option>
                                                1
                                            </option>
                                            <option>
                                                2
                                            </option>
                                        </Input>
                                    </th>
                                    <td>
                                        <Input
                                            id="exampleText"
                                            name="text"
                                            type="textarea"
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <Input
                                            id="2"
                                            name="2"
                                            type="select"
                                        >
                                            <option>
                                                1
                                            </option>
                                            <option>
                                                2
                                            </option>
                                        </Input>
                                    </th>
                                    <td>
                                        <Input
                                            id="exampleText2"
                                            name="text"
                                            type="textarea"
                                        />
                                    </td>

                                </tr>
                                <tr>
                                    <th scope="row">
                                        <Input
                                            id="3"
                                            name="3"
                                            type="select"
                                        >
                                            <option>
                                                1
                                            </option>
                                            <option>
                                                2
                                            </option>
                                        </Input>
                                    </th>
                                    <td>
                                        <Input
                                            id="exampleText3"
                                            name="text"
                                            type="textarea"
                                        />
                                    </td>
                                </tr>
                                </tbody>
                            </Table>
                            <Button> + </Button>
                        </FormGroup>
                        <Button color="primary"> Составить </Button>
                    </Form>
                </Col>
            </Container>

        </ManagerLayout>
    )
        ;
}
