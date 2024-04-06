import React, { useState } from 'react';
import { Form, Container } from 'react-bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';

function Panel1() {
    const [login, setLogin] = useState('');
    const [imie, setImie] = useState('');
    const [nazwisko, setNazwisko] = useState('');
    const [opis, setOpis] = useState('');

    const handleInputChange = (e, setter) => {
        setter(e.target.value);
    };

    // Komponent do wyświetlania liczby znaków w input
    const CharacterCount = ({ value, maxLength }) => (
        <span className="character-count">{`${value.length}/${maxLength}`}</span>
    );

    return (
        <Container className="mt-5">
            <Form>
                {/** Styling dla Form.Group został zmodyfikowany, aby umożliwić pozycjonowanie informacji o liczbie znaków */}
                <Form.Group className="position-relative">
                    <Form.Label>Login:</Form.Label>
                    <Form.Control
                        type="text"
                        maxLength="22"
                        placeholder="Wpisz login"
                        value={login}
                        onChange={(e) => handleInputChange(e, setLogin)}
                    />
                    <CharacterCount value={login} maxLength={22} />
                </Form.Group>

                <Form.Group className="position-relative">
                    <Form.Label>Imię:</Form.Label>
                    <Form.Control
                        type="text"
                        maxLength="33"
                        placeholder="Wpisz imię"
                        value={imie}
                        onChange={(e) => handleInputChange(e, setImie)}
                    />
                    <CharacterCount value={imie} maxLength={33} />
                </Form.Group>

                <Form.Group className="position-relative">
                    <Form.Label>Nazwisko:</Form.Label>
                    <Form.Control
                        type="text"
                        maxLength="55"
                        placeholder="Wpisz nazwisko"
                        value={nazwisko}
                        onChange={(e) => handleInputChange(e, setNazwisko)}
                    />
                    <CharacterCount value={nazwisko} maxLength={55} />
                </Form.Group>

                <Form.Group className="position-relative">
                    <Form.Label>Opis:</Form.Label>
                    <Form.Control
                        as="textarea"
                        maxLength="255"
                        placeholder="Wpisz opis"
                        value={opis}
                        onChange={(e) => handleInputChange(e, setOpis)}
                    />
                    <CharacterCount value={opis} maxLength={255} />
                </Form.Group>
            </Form>

            <style type="text/css">
                {`
                .character-count {
                    position: absolute;
                    right: 10px;
                    bottom: 10px;
                    background-color: rgba(255, 255, 255, 0.8);
                    padding: 0 5px;
                }
                `}
            </style>
        </Container>
    );
}

export default Panel1;
