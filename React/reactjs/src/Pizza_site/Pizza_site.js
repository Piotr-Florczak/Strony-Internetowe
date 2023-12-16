import React from 'react';
import ReactDOM from 'react-dom/client';
//import './Pizza_site_style.css';
import pizzaData from './data.js';

function Pizza_site(){
    return (
        <div className='container'>
            <Header />
            <Menu />
            <Footer />
        </div>
    )
    
}
export default Pizza_site;
function Header() {
    const style = {color: 'red', fontSize: '48px' , textTransform: 'uppercase'}
    return(
        <header className='header'>
            <h1 > Fast React Pizza Co.</h1>
        </header>
    )
};


function Menu() {
    const pizzas = pizzaData;
    const numPizzas = pizzas.length;
    return(
        <main className='menu'>
            <h2> Our menu</h2>

            <p>
            Authentic Italian cuisine. 6 creative dishes to choose from. All from our stone oven, all organic, all delicius
            </p>

            {numPizzas > 0 && (
                <ul className='pizzas'>
                {pizzas.map((pizza) => ( 
                    <Pizza pizzaObj={pizza} key={[pizza.name]} />
                ))}
            </ul>
            )}
        </main>        
    )
};

function Pizza(props) {
    return(
        <li className= {`pizza ${props.pizzaObj.soldOut ? "sold-out": ""}`}>
            <img src={props.pizzaObj.photoName} alt={props.pizzaObj.name} />
            <div>
                <h3>{props.pizzaObj.name}</h3>
                <p>{props.pizzaObj.ingredients}</p>
                <span>{props.pizzaObj.soldOut ? "SOLD OUT" : props.pizzaObj.price}</span>
            </div>
        </li>
    )
}

function Footer() {
    const hour = new Date().getHours();
    const openHour = 12;
    const closeHour = 22;
    return (
        <footer className='footer'>
            <footer>
                {hour >= openHour && hour <=closeHour ?
                    <div className='order'>
                        <p>
                            We're open untill {closeHour}:00. Come visit us or order online. 
                        </p>
                        <button className='btn'>Order</button>
                    </div>
                :
                <p>We're closed untill {openHour}:00 next day </p>
                }
            </footer>
        </footer>
    )
};



