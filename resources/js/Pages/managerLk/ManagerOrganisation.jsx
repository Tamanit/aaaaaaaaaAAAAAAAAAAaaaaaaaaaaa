import {Head, usePage} from '@inertiajs/react';
import {Alert, Container, Table} from "reactstrap";
import ManagerLayout from "@/Layouts/ManagerLayout.jsx";

export default function ManagerRent() {
    const {organisations} = usePage().props;
    return (
        <ManagerLayout>
            <Head title="Арендаторы"/>
            <Container fluid >
                <h3>
                    Аренды
                    <small className="text-muted"> Что-то тут интересненькое</small>
                </h3>
                <Alert color="info">
                    Тут что-то про организации
                </Alert>
                <Table hover responsive>
                    <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Полное наименование
                        </th>
                        <th>
                            ИНН
                        </th>
                        <th>
                            КПП
                        </th>
                        <th>
                            Банк
                        </th>
                        <th>
                            Р/С
                        </th>
                        <th>
                            К/С
                        </th>
                        <th>
                            БИК
                        </th>
                        <th>
                            ОКПО
                        </th>
                        <th>
                            Юридический адрес
                        </th>
                        <th>
                            Почтовый адрес
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    {/*{organisations.map((organisation) => (*/}
                    {/*    <tr key={organisation.id}>*/}
                    {/*        <td>{organisation.full_name}</td>*/}
                    {/*        <td>{organisation.inn}</td>*/}
                    {/*        <td>{organisation.kpp}</td>*/}
                    {/*        <td>{organisation.bank}</td>*/}
                    {/*        <td>{organisation.bank_account}</td>*/}
                    {/*        <td>{organisation.bank_korr_account}</td>*/}
                    {/*        <td>{organisation.bik}</td>*/}
                    {/*        <td>{organisation.okpo}</td>*/}
                    {/*        <td>{organisation.ur_address}</td>*/}
                    {/*        <td>{organisation.post_address}</td>*/}
                    {/*        <td>*/}
                    {/*            <Button color="primary" size="sm">Изменить</Button>*/}
                    {/*            <Button color="danger" size="sm" className="ms-2">Удалить</Button>*/}
                    {/*        </td>*/}
                    {/*    </tr>*/}
                    {/*))}*/}
                    </tbody>
                </Table>
            </Container>
        </ManagerLayout>
    )
        ;
}
