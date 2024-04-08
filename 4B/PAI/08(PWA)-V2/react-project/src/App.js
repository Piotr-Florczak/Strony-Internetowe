import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import MyNavbar from "./MyNavbar";
import Panel1 from "./Panel1";
import Panel2 from "./Panel2";
import Panel3 from "./Panel3";
function App() {
    return (
        <Router>
                <MyNavbar />
                <Routes>
                    <Route path="/panel1" element={<Panel1 />} />
                    <Route path="/panel2" element={<Panel2 />} />
                    <Route path="/panel3" element={<Panel3 />} />
                </Routes>
        </Router>
    );
}

export default App;
