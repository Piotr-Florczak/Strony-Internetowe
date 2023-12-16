// import * as THREE from 'three';
// import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls';
// import * as dat from 'dat.gui';
// import { useEffect, useRef, useState } from "react";
// import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader.js';

//  function App() {

//     const anim = useRef(null);
//     const renderer = new THREE.WebGLRenderer(); 
//     const scene = new THREE.Scene();
//     const camera = new THREE.PerspectiveCamera(75,window.innerWidth / window.innerHeight,0.1,1000);
  
//     const BoxGeometry = new THREE.BoxGeometry();
//     const boxMaterial = new THREE.MeshStandardMaterial({color: 0x0000FF})
//     const box = new THREE.Mesh(BoxGeometry, boxMaterial);
//     const planeGeometry = new THREE.PlaneGeometry(30,30);
//     const planeMaterial = new THREE.MeshStandardMaterial({color: 0xFFFFFF})
//     const axesHelper = new THREE.AxesHelper(5);
//     const plane = new THREE.Mesh(planeGeometry,planeMaterial);
//     const girdHelpr = new THREE.GridHelper(30);
//     const gui = new dat.GUI();
//     const ambientLight = new THREE.AmbientLight(0x333333,10);

//     const directionalLight = new THREE.DirectionalLight(0xffffff, 1);
//     directionalLight.position.set(5, 10, 5);
//     directionalLight.castShadow = true;
//     scene.add(directionalLight);

//     { //test model import
//         const objectUrl = new URL('./3D/test2/untitled.gltf',import.meta.url);
//      const gltfLoader = new GLTFLoader();

//      gltfLoader.load(objectUrl.href,
//      function(gltf)
//      {
//        const model = gltf.scene;
//        scene.add(model);
//        model.position.set(-12,4,10)
//        model.castShadow=true;
//      },undefined, function(error)
//      {
//        console.error(error);
//      });
//     }
//     {  // ambientLIght controller
//       const options = {
//         ambientLightColor: '#333333',
//         ambientLightIntensity: 1 
//       }
//       gui.addColor(options,'ambientLightColor').onChange(function(e){
//         ambientLight.color.set(e);
//         renderer.render(scene, camera); 
//       })
//       gui.add(options,'ambientLightIntensity',0.1,100).onChange(function(e){
//         ambientLight.intensity=e;
//         renderer.render(scene, camera); 
//       })
//     }

//     camera.position.set(0, 2, 5);
//     plane.rotation.x = -0.5 * Math.PI;
//     box.position.set(5,5,5);
    

//     renderer.shadowMap.enabled = true;
//     renderer.setSize(window.innerWidth, window.innerHeight);

//     scene.add(axesHelper);
//     scene.add(box);
//     scene.add(plane);
//     scene.add(girdHelpr);
//     scene.add(ambientLight);

//     useEffect(() => 
//     {

//         plane.receiveShadow = true;
    
//         box.castShadow = true;
//         let controls = new OrbitControls(camera,renderer.domElement);
        
//         controls.addEventListener('change', () => 
//         {
//             renderer.render(scene, camera); 
//         });

//         document.body.appendChild(renderer.domElement);
//         renderer.render(scene, camera);
//         return () => 
//         {
//             controls.dispose(); 
//         };
//     }, []);

//     return (
//       <div>
//         <div ref={anim}></div>
//       </div>

//     );
// }

// export default App;

