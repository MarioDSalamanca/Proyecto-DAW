import { useState } from 'react'
import Header from "../Componentes/Header";

export default function Empleados({ usuarios, sesionUsuario }) {

    // Estados para los popups
    const [popupAñadirVisible, setPopupAñadirVisible] = useState(false);
    const [popupEditarVisible, setPopupEditarVisible] = useState(false);
    const [popupEliminarVisible, setPopupEliminarVisible] = useState(false);

    // Funciones para mostrar u ocultar los popups
    const mostrarPopupAñadir = () => setPopupAñadirVisible(true);
    const mostrarPopupEditar = () => setPopupEditarVisible(true);
    const mostrarPopupEliminar = () => setPopupEliminarVisible(true);

    const ocultarPopups = () => {
        setPopupAñadirVisible(false);
        setPopupEditarVisible(false);
        setPopupEliminarVisible(false);
    };

    const añadir = () => {
        mostrarPopupAñadir();
    };

    const editar = () => {
        mostrarPopupEditar();
    };

    const eliminar = () => {
        mostrarPopupEliminar();
    };

    return (
        <>
            <Header sesion={ sesionUsuario }/>
            <main>
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
                            <th></th>
                            <th></th>
                        </tr>
                        { usuarios.map(usuario => (
                            <tr key={usuario.IdUsuario}>
                                <td>{usuario.Nombre}</td>
                                <td>{usuario.Apellido}</td>
                                <td>{usuario.Correo}</td>
                                <td>{usuario.Rol}</td>
                                <td className="botonesEmpleados editar"><button onClick={ editar }>Editar</button></td>
                                <td className="botonesEmpleados eliminar"><button onClick={ eliminar }>Eliminar</button></td>
                            </tr>
                        ))}
                    </tbody>
                </table>
                }
                { popupAñadirVisible && (
                    <div className="popup añadir">
                        <form>
                            <h2>Añadir un usuario</h2>
                            {/* Contenido del formulario para añadir usuario */}
                        </form>
                    </div>
                )}
                { popupEditarVisible && (
                    <div className="popup editar">
                        <form>
                            <h2>Editar un usuario</h2>
                            {/* Contenido del formulario para editar usuario */}
                        </form>
                    </div>
                )}
                { popupEliminarVisible && (
                    <div className="popup eliminar">
                        <form>
                            <h2>Eliminar un usuario</h2>
                            {/* Contenido del formulario para eliminar usuario */}
                        </form>
                    </div>
                )}
            </main>
        </>
    ); 
}