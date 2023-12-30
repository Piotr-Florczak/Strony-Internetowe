import { angleToRadiands } from "../Other/angleToRadians";
import Rj45 from "../Models/Rj45";
import { useEffect, useRef } from "react";
import { render } from "@testing-library/react";
import LineFromTo from "./LineFromTo";
import { useState } from "react";
import { Line } from "@react-three/drei";
import React from "react";

function Rj45Group() {
  const rj45_color_array = ["rj45_red", "rj45_blue", "rj45_green"];
  const [isConnect, setIsConnect] = useState(false);
  const [selectedRj45, setSelectedRj45] = useState(null);
  const [lines, setLines] = useState([]);

  const [lastClicked, setLastClicked] = useState(null);
  const [connections, setConnections] = useState({});
  const moduleRefs = useRef(
    Array(3)
      .fill()
      .map(() => React.createRef())
  );

  const ref = null;
  let mem = null;
  let memID = null;
  // const handleRj45Click = (position,id,ref) => {
  //   if (mem) {
  //     console.log(position + " " + mem);

  //     setLines((prevLines) => [...prevLines, [mem, position]]);
  //     setIsConnect(true);

  //     mem = null;
  //     memID =null;

  //   } else {
  //     mem = position;
  //     memID = ref;
  //   }
  // };

  function test1() {
    alert("s");
  }
  const handleRj45Click = (id) => {
    if (lastClicked === null) {
      // Jeśli to pierwsze kliknięcie, zapisz ID klikniętego modułu
      setLastClicked(id);
    } else {
      // Jeśli to drugie kliknięcie, aktualizuj stany obu modułów
      setConnections((prevConnections) => {
        const newState = {
          ...prevConnections,
          [lastClicked]: !prevConnections[lastClicked],
          [id]: !prevConnections[id],
        };

        console.log(
          `Moduł 1 o ID: ${lastClicked}, Stan: ${
            newState[lastClicked] ? "Połączony" : "Niepołączony"
          }`
        );
        console.log(
          `Moduł 2 o ID: ${id}, Stan: ${
            newState[id] ? "Połączony" : "Niepołączony"
          }`
        );
        console.log("ich pozycje to ----------------------");
        console.log(moduleRefs.current[lastClicked].current.position);
        console.log(moduleRefs.current[id].current.position);
        if (newState[lastClicked] && newState[id]) {
          setLines((prevLines) => [
            ...prevLines,
            [
              moduleRefs.current[lastClicked].current.position,
              moduleRefs.current[id].current.position,
            ],
          ]);
        }
        else
        {
          console.log("nie można połaczyć lini")
        }

        return newState;
      });

      // Zresetuj wartość lastClicked
      setLastClicked(null);
    }
  };

  return (
    <>
      {lines.map((linePoints, index) => (
        <LineFromTo key={index} start={linePoints[0]} end={linePoints[1]} />
      ))}
      <Rj45
        position={[1, 1, 1]}
        src={rj45_color_array[1]}
        isSelected={selectedRj45 === 0}
        isConnect={connections[0] || false}
        onClick={() => handleRj45Click(0)}
        ref={moduleRefs.current[0]}
      />
      <Rj45
        position={[3, 2, 1]}
        src={rj45_color_array[2]}
        isSelected={selectedRj45 === 1}
        isConnect={connections[1] || false}
        onClick={() => handleRj45Click(1)}
        ref={moduleRefs.current[1]}
      />
      <Rj45
        position={[3, 5, 1]}
        src={rj45_color_array[0]}
        isSelected={selectedRj45 === 2}
        isConnect={connections[2] || false}
        onClick={() => handleRj45Click(2)}
        ref={moduleRefs.current[2]}
      />
    </>
  );
}
export default Rj45Group;
