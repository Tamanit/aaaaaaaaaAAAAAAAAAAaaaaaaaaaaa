import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import {Head, usePage} from '@inertiajs/react';
import DefaultLayout from "@/layouts/DefaultLayout.jsx";
import {Alert, Badge, Button, Container, Table} from "reactstrap";
import ManagerLayout from "@/layouts/ManagerLayout.jsx";

export default function ManagerRent() {
    const {rents} = usePage().props;
    return (
        <ManagerLayout>
            <Head title="Аренды"/>
            <Container fluid >
                <h3>
                    Аренды
                    <small className="text-muted"> Что-то тут интересненькое</small>
                </h3>
                <Alert color="info">
                    Тут что-то про аренду
                </Alert>
                <Table hover responsive>
                    <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Арендатор
                        </th>
                        <th>
                            Дата
                        </th>
                        <th>
                            Тариф
                        </th>
                        <th>
                            Количество мест
                        </th>
                        <th>
                            Дата начала аренды
                        </th>
                        <th>
                            Срок аренды
                        </th>
                        <th>
                            Цена
                        </th>
                        <th>
                            Договор
                        </th>
                        <th>
                            Акты
                        </th>
                        <th>
                            Статус
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    {/*{rents.map((rent) => (*/}
                    {/*    <tr key={rent.id}>*/}
                    {/*        <td>{rent.organization}</td>*/}
                    {/*        <td>{rent.registration_date}</td>*/}
                    {/*        <td>{rent.tariff}</td>*/}
                    {/*        <td>{rent.number_of_places}</td>*/}
                    {/*        <td>{rent.rent_at}</td>*/}
                    {/*        <td>{rent.price}</td>*/}
                    {/*        <td>{rent.contract}</td>*/}
                    {/*        <td>{rent.acts}</td>*/}
                    {/*        <td>{rent.status}</td>*/}
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
