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
                { popupAñadir && (
                    <div className="popup añadir">
                        <form>
                            <div className='cerrar'>
                                <button onClick={ añadir }>x</button>
                            </div>
                            <h2>Añadir un usuario</h2>
                            <form>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label>Nombre</label><br />
                                                <input type="text" name='nombre' />
                                            </td>
                                            <td>
                                                <label>Apellido</label><br />
                                                <input type="text" name='apellido' />
                                            </td>
                                            <td>
                                                <label>Correo</label><br />
                                                <input type="email" name='correo' />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Contraseña</label><br />
                                                <input type="text" name='contrasena' />
                                            </td>
                                            <td>
                                                <label>Rol</label><br />
                                                <select name='rol'>
                                                    <option value=" " selected></option>
                                                    <option value="auxiliar">auxiliar</option>
                                                    <option value="adjunto">adjunto</option>
                                                    <option value="titular">titular</option>
                                                </select>
                                            </td>
                                            <td>
                                                <button className='guardar'>Guardar</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </form>
                    </div>
                )}
                { popupEditar && (
                    <div className="popup editar">
                        <form>
                            <button onClick={ editar }>x</button>
                            <h2>Editar un usuario</h2>
                        </form>
                    </div>
                )}
                { popupEliminar && (
                    <div className="popup eliminar">
                        <form>
                            <button onClick={ eliminar }>x</button>
                            <h2>Eliminar un usuario</h2>
                        </form>
                    </div>
                )}
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
            </main>
        </>
    ); 
}