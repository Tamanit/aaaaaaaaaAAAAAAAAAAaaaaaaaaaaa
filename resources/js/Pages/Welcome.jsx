import {Button, Col, FormFeedback, FormGroup, Input, Label, Row} from "reactstrap";
import ClearLayout from "../layouts/ClearLayout.jsx";
import DefaultLayout from "@/layouts/DefaultLayout.jsx";

export default () => {
    return (
        <DefaultLayout>
            <Row>
                <Col
                    className="
                        border
                        border-primary
                        rounded
                    "
                >Hello world!</Col></Row>

        </DefaultLayout>
    )
}
