import React from 'react';
import ReactDOM from 'react-dom/client';
import Pizza_site from './Pizza_site/Pizza_site.js';
import Far_away from './Far_away/Far_away.js';
import Challenge from './Far_away/Challenge.js';

function App(){
    return (
        <div>
            <Far_away/>
            <Challenge /> 
        </div>
    )
}
const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(<App />);
