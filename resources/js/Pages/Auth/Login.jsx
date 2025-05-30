import {Alert, Button, Col, FormFeedback, FormGroup, Input, Label, Row} from "reactstrap";
import ClearLayout from "../../layouts/ClearLayout.jsx";
import {router, usePage} from "@inertiajs/react";


export default () => {
    const { errors } = usePage().props;
    const { csrfToken } = usePage().props;

    function handleSubmit(e) {
        e.preventDefault();
        router.post(
            '/login',
            new FormData(e.target)
        )
    }

    return (
        <ClearLayout title="Вход">
            <Row
            className="
            col-12
            col-sm-auto
            ">
                <Col
                    className="
                        border
                        border-primary
                        rounded
                    "
                >
                    <h2 size="xxl">Вход</h2>
                    {errors.auth != undefined
                        ? <Alert color="danger">{errors.auth}</Alert>
                        : null}

                    <form
                        onSubmit={handleSubmit}
                    >
                        <FormGroup className="position-relative">
                            <Label>
                                E-mail
                            </Label>
                            <Input
                                name="email"
                                placeholder="Введите email. . ."
                                type="email"
                                invalid={errors.email != undefined}
                            />
                            <FormFeedback tooltip>
                                {errors.email != undefined ? errors.email: null}
                            </FormFeedback>
                        </FormGroup>
                        <FormGroup className="position-relative">
                            <Label>
                                Пароль
                            </Label>
                            <Input
                                placeholder="Введите пароль. . ."
                                type="password"
                                name="password"
                                invalid={errors.password != undefined}
                            />
                            <FormFeedback tooltip>
                                {errors.password != undefined ? errors.password: null}
                            </FormFeedback>
                        </FormGroup>
                        <FormGroup className="custom-control custom-checkbox">
                            <input
                                id="rememberMe"
                                className="custom-control-input"
                                type="checkbox"
                                name="rememberMe"
                            />
                            <Label
                                for="rememberMe"
                                className="custom-control-label"
                            >
                                Запомнить меня?
                            </Label>
                        </FormGroup>
                        <FormGroup>
                            <Input
                                name="_token"
                                type="hidden"
                                value={csrfToken}
                            ></Input>
                            <Button
                                className="w-100"
                                type="submit"
                                value="Войти"
                                color="primary"
                                outline
                            >Войти</Button>
                        </FormGroup>
                    </form>
                </Col>
            </Row>
        </ClearLayout>
    )
}
