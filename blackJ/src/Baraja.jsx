// Baraja.jsx
import React from 'react';
// Baraja.jsx

const barajita = [
    { numero: '2', palo: 'S'},
    { numero: '3', palo: 'S'},
    { numero: '4', palo: 'S' },
    { numero: '5', palo: 'S' },
    { numero: '6', palo: 'S' },
    { numero: '7', palo: 'S'},
    { numero: '8', palo: 'S'},
    { numero: '9', palo: 'S' },
    { numero: '10', palo: 'S'},
    { numero: 'J', palo: 'S' },
    { numero: 'Q', palo: 'S' },
    { numero: 'K', palo: 'S' },
    { numero: 'A', palo: 'S' },
  
    { numero: '2', palo: 'H'},
    { numero: '3', palo: 'H'  },
    { numero: '4', palo: 'H'  },
    { numero: '5', palo: 'H' },
    { numero: '6', palo: 'H' },
    { numero: '7', palo: 'H' },
    { numero: '8', palo: 'H' },
    { numero: '9', palo: 'H' },
    { numero: '10', palo: 'H'},
    { numero: 'J', palo: 'H' },
    { numero: 'Q', palo: 'H' },
    { numero: 'K', palo: 'H'},
    { numero: 'A', palo: 'H' },
  
    { numero: '2', palo: 'D' },
    { numero: '3', palo: 'D'},
    { numero: '4', palo: 'D'},
    { numero: '5', palo: 'D' },
    { numero: '6', palo: 'D' },
    { numero: '7', palo: 'D' },
    { numero: '8', palo: 'D' },
    { numero: '9', palo: 'D' },
    { numero: '10', palo: 'D' },
    { numero: 'J', palo: 'D' },
    { numero: 'Q', palo: 'D' },
    { numero: 'K', palo: 'D' },
    { numero: 'A', palo: 'D' },
  
    { numero: '2', palo: 'T' },
    { numero: '3', palo: 'T'},
    { numero: '4', palo: 'T' },
    { numero: '5', palo: 'T' },
    { numero: '6', palo: 'T' },
    { numero: '7', palo: 'T' },
    { numero: '8', palo: 'T' },
    { numero: '9', palo: 'T'},
    { numero: '10', palo: 'T'},
    { numero: 'J', palo: 'T' },
    { numero: 'Q', palo: 'T' },
    { numero: 'K', palo: 'T' },
    { numero: 'A', palo: 'T' }
  ];
  

class Baraja {
  constructor() {
    this.cartas = barajita;
    this.barajar();
  }

  barajar() {
    for (let i = this.cartas.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [this.cartas[i], this.cartas[j]] = [this.cartas[j], this.cartas[i]];
    }
  }

  sacarCarta() {
    return this.cartas.pop();
  }
}

export default new Baraja();