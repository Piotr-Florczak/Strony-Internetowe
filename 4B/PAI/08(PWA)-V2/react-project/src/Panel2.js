import React, { useState, useEffect } from 'react';
import { Scatter } from 'react-chartjs-2';
import { Chart as ChartJS, registerables } from 'chart.js';
import { Container, Row, Col, Form, Button } from 'react-bootstrap';

ChartJS.register(...registerables);

function Panel2() {
    const [a, setA] = useState(1);
    const [b, setB] = useState(1);
    const [c, setC] = useState(1);
    const [chartData, setChartData] = useState({
        datasets: [],
    });

    const generateDataForQuadraticFunction = (a, b, c, range) => {
        let data = [];
        for (let x = range.min; x <= range.max; x += 0.5) {
            let y = a * x * x + b * x + c;
            data.push({x, y});
        }
        return data;
    };

    useEffect(() => {
        const data = generateDataForQuadraticFunction(a, b, c, {min: -10, max: 10});
        setChartData({
            datasets: [{
                label: 'y = ax^2 + bx + c',
                data: data,
                showLine: true,
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
            }]
        });
    }, [a, b, c]);

    return (
        <Container className="mt-3">
            <Row>
                <Col md={4}>
                    <Form>
                        <Form.Group className="mb-3">
                            <Form.Label>a:</Form.Label>
                            <Form.Control type="number" value={a} onChange={e => setA(Number(e.target.value))} />
                        </Form.Group>
                        <Form.Group className="mb-3">
                            <Form.Label>b:</Form.Label>
                            <Form.Control type="number" value={b} onChange={e => setB(Number(e.target.value))} />
                        </Form.Group>
                        <Form.Group className="mb-3">
                            <Form.Label>c:</Form.Label>
                            <Form.Control type="number" value={c} onChange={e => setC(Number(e.target.value))} />
                        </Form.Group>
                        <Button variant="primary" type="button" onClick={() => setChartData({ datasets: [] })}>
                            Generuj wykres
                        </Button>
                    </Form>
                </Col>
                <Col md={8}>
                    <Scatter data={chartData} options={{
                        scales: {
                            x: {
                                type: 'linear',
                                position: 'bottom'
                            }
                        }
                    }} />
                </Col>
            </Row>
        </Container>
    );
}

export default Panel2;
