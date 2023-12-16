import React, { useEffect, useState } from 'react';
function Test()
{
    const [advice,setAdvice] = useState("");
    const [number,setNumber] = useState(0)
    
    async function getAdvice() 
    {
        const res = await fetch("https://api.adviceslip.com/advice");
        const data = await res.json();
        console.log(data.slip.advice);
        setAdvice(data.slip.advice);
        setNumber((c) => c + 1);
    }
    useEffect(() =>
    {
        getAdvice();
    },[])
    return(
        <div>
            <h1>{advice}</h1>
            <button onClick={getAdvice}>Get advice</button>
            <p>
                You have read <strong>{number}</strong> pieces of advice
            </p>
        </div>
    )
}
export default Test;