// Carta.jsx
import React from 'react';
import './App.css';

const Carta = ({ carta }) => {
    return (
      <div className="carta">
        {/* Usa la propiedad imagen de la carta para mostrar la imagen */}
        <img src={carta.imagen} alt={`${carta.numero}${carta.palo}`} />
      </div>
    );
  };

export default Carta;
