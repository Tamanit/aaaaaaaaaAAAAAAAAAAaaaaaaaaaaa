import ManagerLayout from "@/Layouts/ManagerLayout.jsx";
import {
    Alert,
    Button,
    Col,
    Container,
    Form,
    FormFeedback,
    FormGroup,
    Input,
    Label,
    UncontrolledAlert
} from "reactstrap";
import {router} from "@inertiajs/react";
import React, {useEffect, useRef, useState} from "react";
import TableInput from "@/Components/TableInput.jsx";
import TagInput from "@/components/TagInput/TagInput.jsx";

function formDataToJson(formData, update) {
    const object = {};

    for (let [key, value] of formData.entries()) {
        const arrayKeyMatch = key.match(/^([\w|\\]+)\[(\d+)]$/);
        if (arrayKeyMatch) {
            let field = arrayKeyMatch[1];
            const index = parseInt(arrayKeyMatch[2]);

            if (!object[field]) object[field] = [];
            object[field][index] = value;
        } else if (update && value instanceof File) {
            continue;
        } else {
            object[key] = value;
        }
    }

    return object;
}

export default ({meta, errors, id, flash}) => {

    const vals = {};
    meta.inputs.map((input) => {
        vals[input.name] = input.value
    })

    const [values, setValues] = useState(vals);
    const [alerts, setAlerts] = useState([]);
    const [noRedirect, setNoRedirect] = useState(false);
    const hasFile = useRef(false);

    useEffect(() => {
        flash.message
            ? setAlerts((alerts) => [
                ...alerts, flash.message
            ])
            : null

        let timerId = setTimeout(() => {
            alerts.length > 1 ? setAlerts((alerts) => alerts.slice(0, 1)) : setAlerts(([]))
        }, 2000)
        return () => clearTimeout(timerId);
    }, [flash]);

    function handleSubmit(e) {
        e.preventDefault();

        let formData = new FormData(e.target);

        let object = formDataToJson(formData, !!id)

        console.log(formData)
        router.visit(meta.submitLink + (noRedirect ? '?again=true' : ''), {
            method: id ? 'PUT' : 'POST',
            forceFormData: !id && hasFile,
            data: object
        })
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
                    className="mb-2"
                    encType="multipart/form-data"
                >
                    {meta.inputs.map((input) => {
                        input.type === 'file' ? hasFile.current = true : null
                        return (
                            input.type === 'table' ? <TableInput table={input.table} label={input.label}/> :
                                input.type === 'array' ?
                                    <FormGroup>
                                        {input.label ? <Label sm={3}>{input.label}</Label> : null}
                                        <TagInput name={input.name} tagsProps={JSON.parse(input.value)}/>
                                        <FormFeedback tooltip>
                                            {errors && errors[input.name] != undefined ? errors[input.name] : null}
                                        </FormFeedback>
                                    </FormGroup>
                                    : <FormGroup row className="mb-4">
                                        {input.label ? <Label sm={3}>{input.label}</Label> : null}
                                        <Col sm={9} className="position-relative">
                                            <Input
                                                name={input.name}
                                                id={input.name}
                                                type={input.type}
                                                placeholder={input.placeholder}
                                                value={values[input.name]}

                                                invalid={errors && errors[input.name] != undefined}
                                                onChange={handleChange}
                                            >
                                                {input.options && input.options.map((option) => {
                                                    return (<option value={option.id}>{option.value}</option>)
                                                })}
                                            </Input>


                                        </Col>
                                    </FormGroup>
                        )
                    })}
                    <Button type="submit" color="success" onClick={(e) => {
                        setNoRedirect(false)
                    }}>
                        Сохранить
                    </Button>
                    {
                        !id ? <Button type="submit" color="default" onClick={(e) => {
                                setNoRedirect(true)
                            }}>
                                Сохранить и создать еще
                            </Button>
                            : null
                    }

                </Form>
            </Container>
            <Container
                className="position-absolute bottom-0 end-0 p-3 w-auto"
            >
                {alerts.length > 0 && alerts.map((alert, i) => {
                    return <Alert key={i}>{alert}</Alert>
                })}
            </Container>
            <TagInput/>
        </ManagerLayout>
    )
        ;
}
