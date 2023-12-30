import Model from "../Components/Model";
import { RMP_data } from "../Includes/RMP_201-8/data";
import Led from '../Components/Led'
import { angleToRadiands } from "../Other/angleToRadians";
import MultiSwich from "../Components/MultiSwitch";

const RMP_201_8 = ({ position, rotation }) => {
  return (
    <>
      <group position={position} rotation={[angleToRadiands(0),angleToRadiands(180),0]}>
        {/* Ledy */}
        
            {RMP_data.other_elements.map((item, index) => {return <Led data={item} button={true} key={index} />;})}
        <MultiSwich></MultiSwich>
      </group>
      <Model data={RMP_data} position={position} rotation={rotation}></Model>
      if (true)
      {
        console.log("XDDDDDDDDDDfjhsdkfhsddjhsdhsdisdhsfiddfjdsihsjdjsuofdshfisdbfodfhdsofgsdufndsifdshfdsgfusdgfbuods")
      }
    </>
  );
};

export default RMP_201_8;
