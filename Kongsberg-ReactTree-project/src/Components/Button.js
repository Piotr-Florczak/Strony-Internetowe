import { useState, useRef} from 'react';
import Constants from "../Includes/constants";
import { Text} from '@react-three/drei';
import gsap from "gsap";
import { angleToRadiands } from '../Other/angleToRadians';

const Button = ({state}) =>
{
    const [isPressed, setIsPressed] = useState(false);
    const refBut = useRef(null);
    state(isPressed) ;

    const handleClick = () => {
        setIsPressed(!isPressed); // Zamiana stanu na przeciwny
        if(isPressed) animateButtonPress(0.00, 0.2)
        else animateButtonPress(-0.014, 0.5)
        Constants.button_sound.play();
    }      

    const animateButtonPress = (to, time) =>
    {
        gsap.to(refBut.current.position, {y: to, duration: time, onComplete: () =>{state(isPressed)}} );
    }

    return(
        <>
        <group position={[0,0,0.08]}>
            <mesh position={[-4.75, 0.41,-4.1]}>
                <boxGeometry args={[0.12,0.03,0.12]}></boxGeometry>
                <meshBasicMaterial color={"black"}></meshBasicMaterial>
            </mesh>
            <group ref={refBut}>
                <mesh position={[-4.75, 0.43, -4.1]} onClick={handleClick} >
                    <cylinderGeometry args={[0.04,0.04,0.022]}></cylinderGeometry>
                    <meshStandardMaterial color={'red'}></meshStandardMaterial>
                </mesh>
                <Text position={[-4.75, 0.442, -4.1]} rotation={[angleToRadiands(-90), angleToRadiands(0), angleToRadiands(-90)]} fontSize={0.02}>
                    PRESS
                </Text>
            </group>
            
        </group>
        </>
    )
}
export default Button;