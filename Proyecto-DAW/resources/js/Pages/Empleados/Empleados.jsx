import { useState } from 'react';
import Header from "../Componentes/Header";
import { router } from '@inertiajs/react';
import PopupAñadir from "./Popups/PopupAñadir";
import PopupEditar from "./Popups/PopupEditar";
import PopupEliminar from "./Popups/PopupEliminar";

export default function Empleados({ usuarios, sesionUsuario }) {

    // Estados para los Popups
    const [popupAñadir, setPopupAñadir] = useState(false);
    const [popupEditar, setPopupEditar] = useState(false);
    const [popupEliminar, setPopupEliminar] = useState(false);

    // Estado para guardar el correo del usuario para eliminarlo
    const [correoEliminar, setCorreoEliminar] = useState('');
    // Estado para guardar la información del usuario
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

    // Solicitud POST para añadir usuario
    function confirmarAñadir(e) {
        e.preventDefault();
        mostrarPopupAñadir();
        router.post('/empleados/añadir', formData)
        setFormData({});
    };
    // Solicitud POST para editar usuario
    function confirmarEditar(e) {
        e.preventDefault();
        mostrarPopupEditar();
        router.post('/empleados/editar', formData);
        setFormData({});
    };
    // Solicitud POST para eliminar usuario
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
    function editar(usuario) {
        mostrarPopupEditar();
        setFormData(usuario);
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
                { usuarios &&  
                    <table className="tablaEmpleados">
                        <caption>Empleados</caption>
                        <tbody>
                            <tr>
                                <td style={{ border: 0 }}>
                                    <button className="añadirEmpleado" onClick={ añadir }>Añadir usuario</button>
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
                            { usuarios.map(usuario => (
                                <tr key={usuario.idUsuario}>
                                    <td>{usuario.nombre}</td>
                                    <td>{usuario.apellido}</td>
                                    <td>{usuario.correo}</td>
                                    <td>{usuario.rol}</td>
                                    <td>{new Date(usuario.created_at).toLocaleString()}</td>
                                    <td>{new Date(usuario.updated_at).toLocaleString()}</td>
                                    <td className="botonesEmpleados editar"><button onClick={() => editar(usuario) }>Editar</button></td>
                                    <td className="botonesEmpleados eliminar"><button onClick={() => eliminar(usuario.correo) }>Eliminar</button></td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                }
            </main>
        </>
    ); 
}