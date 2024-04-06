import { useState } from 'react';
import Header from "../Componentes/Header";
import { router } from '@inertiajs/react';
import PopupAñadir from "./Popups/PopupAñadir";
import PopupEditar from "./Popups/PopupEditar";
import PopupEliminar from "./Popups/PopupEliminar";

export default function Empleados({ usuarios, sesionUsuario }) {

    // Estados para los popups
    const [popupAñadir, setPopupAñadir] = useState(false);
    const [popupEditar, setPopupEditar] = useState(false);
    const [popupEliminar, setPopupEliminar] = useState(false);

    // Estado para guardar el correo del usuario para eliminarlo
    const [correoEliminar, setCorreoEliminar] = useState('');
    // Estado para guardar la información del usuario para editarlo
    const [usuarioEditar, setUsuarioEditar] = useState(null);

    // Funciones para mostrar u ocultar los popups
    const mostrarPopupAñadir = () => setPopupAñadir(!popupAñadir);
    const mostrarPopupEditar = () => setPopupEditar(!popupEditar);
    const mostrarPopupEliminar = () => setPopupEliminar(!popupEliminar);

    // Formulario para añadir
    const [formAñadir, setFormAñadir] = useState({
        nombre: '',
        apellido: '',
        correo: '',
        contrasena: '',
        rol: '',
    });

    // Actualizar valores de los inputs
    function handleChange(e) {
        const { name, value } = e.target;
        setFormAñadir(prev => ({
            ...prev,
            [name]: value.trim(),
        }));
    };

    // Funciones para mandar solicitudes post
    function confirmarAñadir(e) {
        e.preventDefault();
        mostrarPopupAñadir();
        router.post('/empleados/añadir', formAñadir)
        setFormAñadir({
            nombre: '',
            apellido: '',
            correo: '',
            contrasena: '',
            rol: '',
        });
    };

    function confirmarEditar(e) {
        e.preventDefault();
        console.log('Enviando solicitud...');
    };

    function confirmarEliminar() {
        mostrarPopupEliminar(); 
        router.post('/empleados/eliminar', { correo: correoEliminar })
    }

    // Para setear los datos del usuaio seleccionado y mostrar el Popup
    function editar(usuario) {
        mostrarPopupEditar();
        setUsuarioEditar(usuario)
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
                { popupAñadir && <PopupAñadir mostrarPopupAñadir={ mostrarPopupAñadir } confirmarAñadir={ confirmarAñadir } formAñadir={ formAñadir } handleChange={ handleChange } /> }
                { popupEditar && <PopupEditar mostrarPopupEditar={ mostrarPopupEditar } confirmarEditar={ confirmarEditar } usuarioEditar={ usuarioEditar } handleChange={ handleChange } /> }
                { popupEliminar && <PopupEliminar mostrarPopupEliminar={ mostrarPopupEliminar } confirmarEliminar={ confirmarEliminar } correoEliminar={ correoEliminar } /> }
                { usuarios &&  
                    <table className="tablaEmpleados">
                        <caption>Empleados</caption>
                        <tbody>
                            <tr>
                                <td style={{ border: 0 }}>
                                    <button className="añadirEmpleado" onClick={ mostrarPopupAñadir }>Añadir usuario</button>
                                </td>
                            </tr>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th></th>
                                <th></th>
                            </tr>
                            { usuarios.map(usuario => (
                                <tr key={usuario.IdUsuario}>
                                    <td>{usuario.Nombre}</td>
                                    <td>{usuario.Apellido}</td>
                                    <td>{usuario.Correo}</td>
                                    <td>{usuario.Rol}</td>
                                    <td className="botonesEmpleados editar"><button onClick={() => editar(usuario) }>Editar</button></td>
                                    <td className="botonesEmpleados eliminar"><button onClick={() => eliminar(usuario.Correo) }>Eliminar</button></td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                }
            </main>
        </>
    ); 
}