import { useState } from 'react';
import Header from "../Componentes/Header";
import { router } from '@inertiajs/react';
import PopupAñadir from "./Popups/PopupAñadir";
import PopupEditar from "./Popups/PopupEditar";
import PopupEliminar from "./Popups/PopupEliminar";

export default function Empleados({ empleados, sesionUsuario }) {

    // Estados para los Popups
    const [popupAñadir, setPopupAñadir] = useState(false);
    const [popupEditar, setPopupEditar] = useState(false);
    const [popupEliminar, setPopupEliminar] = useState(false);

    // Estado para guardar el correo del empleado para eliminarlo
    const [correoEliminar, setCorreoEliminar] = useState('');
    // Estado para guardar la información del empleado
    const [formData, setFormData] = useState({});

    // Funciones para mostrar u ocultar los popups
    const mostrarPopupAñadir = () => setPopupAñadir(!popupAñadir);
    const mostrarPopupEditar = () => setPopupEditar(!popupEditar);
    const mostrarPopupEliminar = () => setPopupEliminar(!popupEliminar);

    // Actualizar valores de los inputs de los Popups
    function handleChange(e) {
        const { name, value } = e.target;
        setFormData(prev => ({
            ...prev,
            [name]: value.trim(),
        }));
    }

    // Solicitud POST para añadir empleado
    function confirmarAñadir(e) {
        e.preventDefault();
        mostrarPopupAñadir();
        router.post('/empleados/añadir', formData)
        setFormData({});
    };
    // Solicitud POST para editar empleado
    function confirmarEditar(e) {
        e.preventDefault();
        mostrarPopupEditar();
        router.post('/empleados/editar', formData);
        setFormData({});
    };
    // Solicitud POST para eliminar empleado
    function confirmarEliminar() {
        mostrarPopupEliminar(); 
        router.post('/empleados/eliminar', { correo: correoEliminar });
    }

    // Mostrar el Popup con los valores vacíos
    function añadir() {
        mostrarPopupAñadir();
        setFormData({});
    }
    // Para setear los datos del usuaio seleccionado y mostrar el Popup
    function editar(empleado) {
        mostrarPopupEditar();
        setFormData(empleado);
    };
    // Para setear el correo seleccionado y mostrar el Popup
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