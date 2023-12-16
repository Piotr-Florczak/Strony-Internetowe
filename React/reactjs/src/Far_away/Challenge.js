import { useState } from "react";

function Challenge()
{
    const [count,setCount] = useState(0);
    return(
    <div style={{display: "flex"}}>
        <button>-</button>
        <p>{count}</p>
        <button>+</button>  
     </div>
    )
        
}
export default Challenge;