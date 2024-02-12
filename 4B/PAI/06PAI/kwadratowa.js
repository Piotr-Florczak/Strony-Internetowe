function delta(a, b, c) {
    return b*b - 4*a*c;
}

function pointZero(deltaValue, a, b)
{
    if (deltaValue > 0)
    {
        const x1 = ((-1 * b) - Math.sqrt(deltaValue)) / (2 * a);
        const x2 = ((-1 * b) + Math.sqrt(deltaValue)) / (2 * a);
        return [x1, x2];
    } else if (deltaValue === 0)
    {
        const x1 = -b / (2 * a);
        return [x1];
    } else
    {
        return false;
    }
}

function generateDataForQuadraticFunction(a, b, c, range) {
    let data = [];
    for (let x = range.min; x <= range.max; x += 0.5) {
        let y = a * x * x + b * x + c;
        data.push({x: x, y: y});
    }
    return data;
}

function kwadratowa(a, b, c, drawGraph = false) {
    if (typeof a !== 'number' || typeof b !== 'number' || typeof c !== 'number') {
        return false;
    }

    const deltaValue = delta(a, b, c);
    const roots = pointZero(deltaValue, a, b);

    if (drawGraph) {
        const data = generateDataForQuadraticFunction(a, b, c, {min: -10, max: 10});
        const ctx = document.getElementById('myChart').getContext('2d');

        new Chart(ctx, {
            type: 'scatter',
            data: {
                datasets: [{
                    label: 'y = ax^2 + bx + c',
                    data: data.map(point => ({x: point.x, y: point.y})),
                    showLine: true,
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                }]
            },
            options: {
                scales: {
                    x: {
                        type: 'linear',
                        position: 'bottom'
                    }
                }
            }
        });
    }

    return roots;
}

kwadratowa(1, -3, 2, true);

