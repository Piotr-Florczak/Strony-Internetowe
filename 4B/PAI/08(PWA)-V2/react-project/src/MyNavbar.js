import React from 'react';
import { Navbar, Nav } from 'react-bootstrap';
import { NavLink } from 'react-router-dom'; // Import z react-router-dom
import 'bootstrap/dist/css/bootstrap.min.css';

function MyNavbar() {
    return (
        <Navbar collapseOnSelect expand="lg" bg="dark" variant="dark">
            <Navbar.Brand as={NavLink} to="/home">PWA</Navbar.Brand>
            <Navbar.Toggle aria-controls="responsive-navbar-nav" />
            <Navbar.Collapse id="responsive-navbar-nav">
                <Nav className="mr-auto">
                    {/* Użyj bezpośrednio NavLink z react-router-dom jako 'as' */}
                    <Nav.Link as={NavLink} to="/panel1" >Formularz zliczający znaki</Nav.Link>
                    <Nav.Link as={NavLink} to="/panel2" >Funcja Kwadratowa</Nav.Link>
                    <Nav.Link as={NavLink} to="/panel3" >Tabliczka mnożenia</Nav.Link>
                </Nav>
            </Navbar.Collapse>
        </Navbar>
    );
}

export default MyNavbar;
