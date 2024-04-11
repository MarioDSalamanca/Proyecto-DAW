import React, { useState } from 'react';
import Header from "../Componentes/Header";
import PopupAñadir from "./Popups/PopupAñadir";
import PopupEditar from "./Popups/PopupEditar";
import PopupEliminar from "./Popups/PopupEliminar";
import Buscador from './Buscador';

export default function Empleados({ empleados, sesionUsuario }) {
    const [popupAñadir, setPopupAñadir] = useState(false);
    const [popupEditar, setPopupEditar] = useState(false);
    const [popupEliminar, setPopupEliminar] = useState(false);
    const [correoEliminar, setCorreoEliminar] = useState('');
    const [formData, setFormData] = useState({});

    const mostrarPopupAñadir = () => setPopupAñadir(!popupAñadir);
    const mostrarPopupEditar = () => setPopupEditar(!popupEditar);
    const mostrarPopupEliminar = () => setPopupEliminar(!popupEliminar);

    function handleChange(e) {
        const { name, value } = e.target;
        setFormData(prev => ({
            ...prev,
            [name]: value.trim(),
        }));
    }

    function confirmarAñadir(e) {
        e.preventDefault();
        mostrarPopupAñadir();
        router.post('/empleados/añadir', formData)
        setFormData({});
    };
    function confirmarEditar(e) {
        e.preventDefault();
        mostrarPopupEditar();
        router.post('/empleados/editar', formData);
        setFormData({});
    };
    function confirmarEliminar() {
        mostrarPopupEliminar(); 
        router.post('/empleados/eliminar', { correo: correoEliminar });
    }

    function añadir() {
        mostrarPopupAñadir();
        setFormData({});
    }

    function editar(empleado) {
        mostrarPopupEditar();
        setFormData(empleado);
    };

    function eliminar(correo) {
        mostrarPopupEliminar();
        setCorreoEliminar(correo);
    };

    return (
        <>
            <Header sesion={ sesionUsuario }/>
            <main>
                { popupAñadir && <PopupAñadir mostrarPopupAñadir={ mostrarPopupAñadir } confirmarAñadir={ confirmarAñadir } formData={ formData } handleChange={ handleChange } /> }
                { popupEditar && <PopupEditar mostrarPopupEditar={ mostrarPopupEditar } confirmarEditar={ confirmarEditar } formData={ formData } handleChange={ handleChange } /> }
                { popupEliminar && <PopupEliminar mostrarPopupEliminar={ mostrarPopupEliminar } confirmarEliminar={ confirmarEliminar } correoEliminar={ correoEliminar } /> }
                { empleados &&  
                    <table className="tablaEmpleados">
                        <caption>Empleados</caption>
                        <tbody>
                            <tr>
                                <td style={{ border: 0 }}>
                                    <button className="añadirEmpleado" onClick={ añadir }>Añadir empleado</button>
                                </td>
                                <td style={{ border: 0 }} colSpan={5}>
                                    <Buscador empleados={ empleados } setEmpleadosFiltrados={ setEmpleadosFiltrados } />
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
                            { empleados.map(empleado => (
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
                            ))}
                        </tbody>
                    </table>
                }
            </main>
        </>
    ); 
}