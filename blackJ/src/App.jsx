import React, { useState } from 'react';
import './App.css';
import Baraja from './baraja';
import Carta from './carta';

import card2S from './fotos/2S.png';
import card3S from './fotos/3S.png';
import card4S from './fotos/4S.png';
import card5S from './fotos/5S.png';
import card6S from './fotos/6S.png';
import card7S from './fotos/7S.png';
import card8S from './fotos/8S.png';
import card9S from './fotos/9S.png';
import card10S from './fotos/10S.png';
import cardJS from './fotos/JS.png';
import cardQS from './fotos/QS.png';
import cardKS from './fotos/KS.png';
import cardAS from './fotos/AS.png';
import card2cora from './fotos/2cora.png';
import card3H from './fotos/3H.png';
import card4H from './fotos/4H.png';
import card5H from './fotos/5H.png';
import card6H from './fotos/6H.png';
import card7H from './fotos/7H.png';
import card8H from './fotos/8H.png';
import card9H from './fotos/9H.png';
import card10H from './fotos/10H.png';
import cardJH from './fotos/JH.png';
import cardQH from './fotos/QH.png';
import cardKH from './fotos/KH.png';
import cardAH from './fotos/AH.png';
import card2diam from './fotos/2diam.png';
import card3D from './fotos/3D.png';
import card4D from './fotos/4D.png';
import card5D from './fotos/5D.png';
import card6D from './fotos/6D.png';
import card7D from './fotos/7D.png';
import card8D from './fotos/8D.png';
import card9D from './fotos/9D.png';
import card10D from './fotos/10D.png';
import cardJD from './fotos/JD.png';
import cardQD from './fotos/QD.png';
import cardKD from './fotos/KD.png';
import cardAD from './fotos/AD.png';
import card2trebol from './fotos/2trebol.png';
import card3C from './fotos/3C.png';
import card4C from './fotos/4C.png';
import card5C from './fotos/5C.png';
import card6C from './fotos/6C.png';
import card7C from './fotos/7C.png';
import card8C from './fotos/8C.png';
import card9C from './fotos/9C.png';
import card10C from './fotos/10C.png';
import cardJC from './fotos/JC.png';
import cardQC from './fotos/QC.png';
import cardKC from './fotos/KC.png';
import cardAC from './fotos/AC.png';
import atrascarta from './fotos/atras.jpg';

const valoresCartas = {
  '2': 2,
  '3': 3,
  '4': 4,
  '5': 5,
  '6': 6,
  '7': 7,
  '8': 8,
  '9': 9,
  '10': 10,
  'J': 10,
  'Q': 10,
  'K': 10,
  'A': 11 // As inicialmente se considera como 11, se ajustará a 1 si la suma excede 21
};

function App() {
  const [jugador, setJugador] = useState([]);
  const [crupier, setCrupier] = useState([]);
  const [sumaJugador, setSumaJugador] = useState(0);
  const [sumaCrupier, setSumaCrupier] = useState(0);
  const [rondaActiva, setRondaActiva] = useState(false);
  const [mensaje, setMensaje] = useState('');
  const [end, setEnd] = useState(false);
  const [juegoFinalizado, setJuegoFinalizado] = useState(false);

  const barajita = {
    "2S": card2S,
    "3S": card3S,
    "4S": card4S,
    "5S": card5S,
    "6S": card6S,
    "7S": card7S,
    "8S": card8S,
    "9S": card9S,
    "10S": card10S,
    "JS": cardJS,
    "QS": cardQS,
    "KS": cardKS,
    "AS": cardAS,

    "2H": card2cora,
    "3H": card3H,
    "4H": card4H,
    "5H": card5H,
    "6H": card6H,
    "7H": card7H,
    "8H": card8H,
    "9H": card9H,
    "10H": card10H,
    "JH": cardJH,
    "QH": cardQH,
    "KH": cardKH,
    "AH": cardAH,

    "2D": card2diam,
    "3D": card3D,
    "4D": card4D,
    "5D": card5D,
    "6D": card6D,
    "7D": card7D,
    "8D": card8D,
    "9D": card9D,
    "10D": card10D,
    "JD": cardJD,
    "QD": cardQD,
    "KD": cardKD,
    "AD": cardAD,

    "2T": card2trebol,
    "3T": card3C,
    "4T": card4C,
    "5T": card5C,
    "6T": card6C,
    "7T": card7C,
    "8T": card8C,
    "9T": card9C,
    "10T": card10C,
    "JT": cardJC,
    "QT": cardQC,
    "KT": cardKC,
    "AT": cardAC,
    "atras": atrascarta
  };

  const iniciarRonda = () => {
    setJugador([]);
    setCrupier([]);
    setSumaJugador(0);
    setSumaCrupier(0);
    setRondaActiva(true);
    setMensaje('Nueva ronda iniciada.');
    setJuegoFinalizado(false); // Reiniciar el estado del juego

    // Repartir una carta al jugador
    repartirCarta();

    // Repartir dos cartas al crupier (una boca abajo y una boca arriba)
    repartirCarta(true);
    repartirCarta(true, true);
  };

  const repartirCarta = (esCrupier = false, bocaAbajo = false) => {
    const nuevaCarta = Baraja.sacarCarta();
    if (nuevaCarta) {
      if (esCrupier) {
        setCrupier(prevCrupier => {
          const updatedCrupier = [...prevCrupier, { ...nuevaCarta, visible: !bocaAbajo }];
          if (!bocaAbajo) {
            const suma = updatedCrupier.reduce((total, carta) => total + valoresCartas[carta.numero], 0);
            setSumaCrupier(suma);
          }
          return updatedCrupier;
        });
        setMensaje('El crupier sacó una carta.');
      } else {
        setJugador(prevJugador => {
          const updatedJugador = [...prevJugador, nuevaCarta];
          const suma = updatedJugador.reduce((total, carta) => total + valoresCartas[carta.numero], 0);
          setSumaJugador(suma);
          // Verificar si el jugador ha ganado al recibir una carta
          if (suma > 21) {
            setMensaje('¡Has perdido! El crupier gana.');
            setJuegoFinalizado(true);
            plantarse();
          }
          return updatedJugador;
        });
        setMensaje('Tú sacaste una carta.');
      }
    } else {
      setMensaje('No quedan cartas en la baraja.');
    }
  };

  const plantarse = () => {
    setRondaActiva(false);
    setJuegoFinalizado(true);

    // Cambiar la visibilidad de la segunda carta del crupier
    setCrupier(prevCrupier => {
      const updatedCrupier = [...prevCrupier];
      if (updatedCrupier.length > 1) {
        updatedCrupier[1].visible = true;
      }

      let sumaCrupier = updatedCrupier.reduce((total, carta) => total + (carta.visible ? valoresCartas[carta.numero] : 0), 0);
      while (sumaCrupier < 17) {
        const nuevaCarta = Baraja.sacarCarta();
        if (!nuevaCarta) {
          setMensaje('No quedan cartas en la baraja.');
          return updatedCrupier;
        }
        updatedCrupier.push({ ...nuevaCarta, visible: true });
        sumaCrupier = updatedCrupier.reduce((total, carta) => total + (carta.visible ? valoresCartas[carta.numero] : 0), 0);
      }

      if (sumaCrupier > 21) {
        setMensaje('El crupier se ha pasado de 21. ¡Ha perdido!');
       
      }

      setSumaCrupier(sumaCrupier);

      // Determinar ganador
      const sumaJugador = jugador.reduce((total, carta) => total + valoresCartas[carta.numero], 0);
      if (sumaJugador > 21) {
        setMensaje('¡Has perdido! El crupier gana.');
       
      } else {
        if (sumaCrupier > 21 || sumaJugador > sumaCrupier) {
          setMensaje('¡Has ganado! El crupier pierde.');
        
        } else if (sumaJugador === sumaCrupier) {
          setMensaje('¡Es un empate!');
        
        } else {
          setMensaje('¡Has perdido! El crupier gana.');
          
        }
      }

      return updatedCrupier;
    });
  };

  const pedirCarta = () => {
    if (sumaJugador <= 21) { // Verificar si el jugador no se ha pasado aún
      repartirCarta();
    } else {
      setJuegoFinalizado(true); // Cambiar el estado del juego a finalizado
    }
  };

  const barajarBaraja = () => {
    Baraja.barajar();
    setMensaje('La baraja ha sido barajada.');
  };

  const reiniciarJuego = () => {
    window.location.reload(); // Recargar la página para reiniciar el juego
  };

  return (
    <div className="App">
      <div className="tablero">
        <div className="fila-jugador">
          <h2>Jugador ⋆𐙚₊ </h2>
          <div className="cartas">
            {jugador.map((carta, index) => {
              const cardKey = `${carta.numero}${carta.palo}`;
              return(
                <img key={index} src={barajita[cardKey]} alt={`${carta.numero}${carta.palo}`} />
              );
            })}
          </div>
          <p>Suma: {sumaJugador}</p>
          <button onClick={pedirCarta} disabled={!rondaActiva || juegoFinalizado}>
            Pedir Carta
          </button>
          <button onClick={plantarse} disabled={!rondaActiva || juegoFinalizado} style={{ marginTop: '10px', marginRight: '10px' }}>
            Plantarse
          </button>
        </div>
        <div className="fila-crupier">
          <h2>Crupier ⋆⑅˚₊</h2>
          <div className="cartas">
          {crupier.map((carta, index) => {
            const cardKey = `${carta.numero}${carta.palo}`;
            return (
              <img key={index} src={juegoFinalizado || index !== 0 ? barajita[cardKey] : barajita['atras']} alt={index === 0 && !juegoFinalizado ? 'atrascito' : `${carta.numero}${carta.palo}`} />
            ); 
          })}
          </div>
          <p>Suma: {rondaActiva ? '' : sumaCrupier ? sumaCrupier : '??'}</p>
        </div>
      </div>
      <div className="acciones">
        <button onClick={barajarBaraja}>Barajar</button>
        {juegoFinalizado ? (
          <button onClick={reiniciarJuego}>Reiniciar</button>
        ) : (
          <button onClick={iniciarRonda}>Nueva Ronda</button>
        )}
      </div>
      <div className="mensaje">{mensaje}</div>
    </div>
  );
}

export default App;
