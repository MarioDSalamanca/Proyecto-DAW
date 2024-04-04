import { useState } from 'react'
import Header from "../Componentes/Header";

export default function Empleados({ usuarios, sesionUsuario }) {

    // Estados para los popups
    const [popupAñadir, setPopupAñadir] = useState(false);
    const [popupEditar, setPopupEditar] = useState(false);
    const [popupEliminar, setPopupEliminar] = useState(false);

    // Funciones para mostrar u ocultar los popups
    const mostrarPopupAñadir = () => setPopupAñadir(!popupAñadir);
    const mostrarPopupEditar = () => setPopupEditar(!popupEditar);
    const mostrarPopupEliminar = () => setPopupEliminar(!popupEliminar);

    const ocultarPopups = () => {
        setPopupAñadir(false);
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
                { popupAñadir && (
                    <div className="popup añadir">
                        <form>
                            <button onClick={ ocultarPopups }>X</button>
                            <h2>Añadir un usuario</h2>
                        </form>
                    </div>
                )}
                { popupEditar && (
                    <div className="popup editar">
                        <form>
                            <button onClick={ ocultarPopups }>X</button>
                            <h2>Editar un usuario</h2>
                        </form>
                    </div>
                )}
                { popupEliminar && (
                    <div className="popup eliminar">
                        <form>
                            <button onClick={ ocultarPopups }>X</button>
                            <h2>Eliminar un usuario</h2>
                        </form>
                    </div>
                )}
            </main>
        </>
    ); 
}