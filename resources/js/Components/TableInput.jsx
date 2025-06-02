import {Alert, Button, FormGroup, Input, Table} from "reactstrap";
import React, {useEffect, useRef, useState} from "react";
import {usePage} from "@inertiajs/react";
import TableInput from "@/Components/TableInput.jsx";

export default ({table, label}) => {
    const [rows, setRows] = useState([]);
    const {errors} = usePage().props;

    function handleChange(e) {
        const key = e.target.name;
        const value = e.target.value

        rows.find((o, i) => {
            for (let property in o) {
                if (property === key) {
                    o[property] = value;
                    return true;
                }
            }
        });


        setRows(rows => (rows));
    }

    function addRow(e) {
        e.preventDefault();
        let row = {};
        table.columnsTitles.map(input => {
            row[input.name + '[' + (rows.length) + ']'] = '';
        })

        setRows((rows) => ([
            ...rows,
            row
        ]))
    }

    function removeRow(e) {
        e.preventDefault();
        let index = e.target.target;
        let tempRows = [...rows];

        tempRows.splice(index, 1);
        setRows(tempRows);
    }

    return (
        <>
            <FormGroup>
                <label>{label}</label>
                {errors && table.columnsTitles.map(input => {
                    return errors[table.model+ '__' + table.condition + '__' + input.name] ?
                        <Alert color="danger">{errors[table.model+ '__' + table.condition + '__' + input.name]}</Alert> : null
                })}
                <Table borderless className="border table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        {table.columnsTitles.map((columnTitle, i) => {
                            return (columnTitle.type !== 'table' ? <th key={i}>{columnTitle.label}</th> : null)
                        })}
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    {rows && rows.map((values, i) => {

                        return (<tr key={i}>
                            <td>{i}</td>
                            {table.columnsTitles.map((input, j) => {
                                console.log(table.model)
                                return (input.type !== 'table' ?
                                        <td>
                                            <Input
                                                key={j}
                                                name={table.model + '__' + table.condition + '__' + input.name + '[' + i + ']'}
                                                id={table.model + '__' + table.condition + '__' + input.name + '[' + i + ']'}
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
                                        </td> : null

                                )
                            })}
                            <td className="d-flex flex-row-reverse"><Button onClick={removeRow} target={i} color="link"><i
                                className="m-auto ni ni-fat-remove"></i></Button></td>
                        </tr>)
                    })}
                    </tbody>
                </Table>
                <Button className="m-auto" size="sm" color="success" onClick={addRow}><i
                    className="ni ni-fat-add"></i></Button>
            </FormGroup>
            {/*TODO: сделать доп таблицы для более быстрого создания*/}
            {/*{tables.current.map((input, i) => {*/}
            {/*    return <TableInput table={input.table} label={input.label}></TableInput>*/}
            {/*})}*/}
        </>
    )
}
