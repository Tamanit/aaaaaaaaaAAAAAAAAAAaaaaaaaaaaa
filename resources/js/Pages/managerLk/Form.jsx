import ManagerLayout from "@/Layouts/ManagerLayout.jsx";
import {Button, Col, Container, Form, FormFeedback, FormGroup, Input, Label, Row} from "reactstrap";
import {router} from "@inertiajs/react";
import {useState} from "react";

export default ({meta, errors, id}) => {
    const vals = {};
    meta.inputs.map((input) => {
        vals[input.name] = input.value
    })

    const [values, setValues] = useState(vals);



    function handleSubmit(e) {
        e.preventDefault();

        let object = {};
        let formData = new FormData(e.target);
        formData.forEach((value, key) => object[key] = value);

        router.put(
            meta.submitLink + '/' + id,
            object
        )
    }

    function handleChange(e) {
        const key = e.target.name;
        const value = e.target.value
        setValues(values => ({
            ...values,
            [key]: value,
        }))
    }

    return (
        <ManagerLayout>
            <Container className="h-100">
                <h2>{meta.h2}</h2>
                <Form
                    onSubmit={handleSubmit}
                >
                    {meta.inputs.map((input) => {
                        return (
                            <FormGroup row>
                                {input.label ? <Label sm={2}>{input.label}</Label> : null}
                                <Col sm={10} className="position-relative">
                                    <Input
                                        name={input.name}
                                        id={input.name}
                                        type={input.type}
                                        placeholder={input.placeholder}
                                        value={values[input.name]}

                                        invalid={errors && errors[input.name] != undefined}
                                        onChange={handleChange}
                                    />

                                    <FormFeedback tooltip>
                                        {errors && errors[input.name] != undefined ? errors[input.name] : null}
                                    </FormFeedback>
                                </Col>
                            </FormGroup>
                        )
                    })}
                    <Button type="submit" color="success">
                        Сохранить
                    </Button>
                </Form>
            </Container>
        </ManagerLayout>
    );
}
