import React, { useState } from 'react';
import { Container, Row, Col, Form, Button } from 'react-bootstrap';

function Panel3() {
    const [width, setWidth] = useState(10);
    const [height, setHeight] = useState(10);
    const [start, setStart] = useState(0);
    const [end, setEnd] = useState(0);

    const generateTableContent = () => {
        const rows = [];
        const od = start;
        const doVal = end;
        for (let i = od; i < height + od; i++) {
            const cols = [];
            for (let j = od; j < width + od; j++) {
                const result = (i + 1) * (j + 1);
                const grayscale = Math.min(Math.floor((result / 150) * 255), 255);
                cols.push(
                    <td key={`col-${j}`} style={{ backgroundColor: `rgb(${grayscale}, ${grayscale}, ${grayscale})`, color: 'yellow' }}>
                        {result}
                    </td>
                );
            }
            rows.push(
                <tr key={`row-${i}`}>
                    <th>{i + 1}</th>
                    {cols}
                    <th>{i + 1}</th>
                </tr>
            );
        }
        return rows;
    };

    return (
        <Container>
            <Row className="justify-content-md-center">
                <Col md={6}>
                    <Form>
                        <Form.Group className="mb-3">
                            <Form.Label>Szerokość</Form.Label>
                            <Form.Control type="number" value={width} onChange={e => setWidth(parseInt(e.target.value))} />
                        </Form.Group>
                        <Form.Group className="mb-3">
                            <Form.Label>Wysokość</Form.Label>
                            <Form.Control type="number" value={height} onChange={e => setHeight(parseInt(e.target.value))} />
                        </Form.Group>
                        <Form.Group className="mb-3">
                            <Form.Label>Od</Form.Label>
                            <Form.Control type="number" value={start} onChange={e => setStart(parseInt(e.target.value))} />
                        </Form.Group>
                        <Form.Group className="mb-3">
                            <Form.Label>Do</Form.Label>
                            <Form.Control type="number" value={end} onChange={e => setEnd(parseInt(e.target.value))} />
                        </Form.Group>
                        <Button variant="primary" onClick={() => {}}>Generuj</Button>
                    </Form>
                </Col>
            </Row>
            <Row>
                <Col>
                    <table style={{width: '100%', height: '100%'}}>
                        <tbody>
                        {generateTableContent()}
                        </tbody>
                    </table>
                </Col>
            </Row>
        </Container>
    );
}

export default Panel3;
