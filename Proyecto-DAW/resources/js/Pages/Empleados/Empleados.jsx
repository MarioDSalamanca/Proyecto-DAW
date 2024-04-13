import { useState } from 'react';
import { router } from '@inertiajs/react';
import Header from "../Componentes/Header";
import PopupAñadir from "./Popups/PopupAñadir";
import PopupEditar from "./Popups/PopupEditar";
import PopupEliminar from "./Popups/PopupEliminar";
import Buscador from '../Componentes/Buscador';

export default function Empleados({ datosServidor, sesionUsuario }) {

    // Estados
        const [popupAñadir, setPopupAñadir] = useState(false);
        const [popupEditar, setPopupEditar] = useState(false);
        const [popupEliminar, setPopupEliminar] = useState(false);
        const [correoEliminar, setCorreoEliminar] = useState('');
        const [formDatos, setFormDatos] = useState({});
        const [datosFiltrados, setDatosFiltrados] = useState(datosServidor);

    // Llamadas para iniciar las acciones
        function añadir() {
            mostrarPopupAñadir();
            setFormDatos({});
        }
        function editar(empleado) {
            mostrarPopupEditar();
            setFormDatos(empleado);
        };
        function eliminar(correo) {
            mostrarPopupEliminar();
            setCorreoEliminar(correo);
        };

    // Funciones para mostrar los PopUps
        const mostrarPopupAñadir = () => setPopupAñadir(!popupAñadir);
        const mostrarPopupEditar = () => setPopupEditar(!popupEditar);
        const mostrarPopupEliminar = () => setPopupEliminar(!popupEliminar);

    // Setear los valores de los formularios de Añadir y Editar
        function handleChange(e) {
            const { name, value } = e.target;
            setFormDatos(prev => ({
                ...prev,
                [name]: value.trim(),
            }));
        }

    // Solicitudes POST al servidor
        function confirmarAñadir(e) {
            e.preventDefault();
            mostrarPopupAñadir();
            router.post('/empleados/añadir', formDatos)
            setFormDatos({});
            window.location.reload()
        };
        function confirmarEditar(e) {
            e.preventDefault();
            mostrarPopupEditar();
            router.post('/empleados/editar', formDatos);
            setFormDatos({});
            window.location.reload()
        };
        function confirmarEliminar() {
            mostrarPopupEliminar(); 
            router.post('/empleados/eliminar', { correo: correoEliminar });
            window.location.reload()
        }

    return (
        <>
            <Header sesion={ sesionUsuario }/>
            <main>
                { popupAñadir && <PopupAñadir mostrarPopupAñadir={ mostrarPopupAñadir } confirmarAñadir={ confirmarAñadir } formDatos={ formDatos } handleChange={ handleChange } /> }
                { popupEditar && <PopupEditar mostrarPopupEditar={ mostrarPopupEditar } confirmarEditar={ confirmarEditar } formDatos={ formDatos } handleChange={ handleChange } /> }
                { popupEliminar && <PopupEliminar mostrarPopupEliminar={ mostrarPopupEliminar } confirmarEliminar={ confirmarEliminar } correoEliminar={ correoEliminar } /> }
                { datosServidor &&  
                    <table className="tablaDatos">
                        <caption>Empleados</caption>
                        <tbody>
                            <tr>
                                <td style={{ border: 0 }} colSpan="2">
                                    <button className="añadirEmpleado" onClick={ añadir }>Añadir empleado</button>
                                </td>
                                <td style={{ border: 0 }} colSpan="5">
                                    <Buscador datosServidor={ datosServidor } setDatosFiltrados={ setDatosFiltrados } 
                                    campos={[ 'nombre', 'apellido', 'correo', 'rol' ]} />
                                </td>
                            </tr>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th>Creado</th>
                                <th>Actualizado</th>
                                <th></th>
                                <th></th>
                            </tr>
                            { datosFiltrados.length === 0 ? (
                                    <tr>
                                        <td colSpan="9"><p className="sin-resultados">No se encontraron resultados</p></td>
                                    </tr>
                                ) : ( datosFiltrados.map(empleado => (
                                <tr key={empleado.idEmpleado}>
                                    <td>{empleado.nombre}</td>
                                    <td>{empleado.apellido}</td>
                                    <td>{empleado.correo}</td>
                                    <td>{empleado.rol}</td>
                                    <td>{new Date(empleado.created_at).toLocaleString()}</td>
                                    <td>{new Date(empleado.updated_at).toLocaleString()}</td>
                                    <td className="botonesEmpleados editar"><button onClick={() => editar(empleado) }>Editar</button></td>
                                    <td className="botonesEmpleados eliminar"><button onClick={() => eliminar(empleado.correo) }>Eliminar</button></td>
                                </tr>
                                ))
                            )}
                        </tbody>
                    </table>
                }
            </main>
        </>
    ); 
}