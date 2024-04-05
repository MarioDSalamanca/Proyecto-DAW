import { useState } from 'react';
import Header from "../Componentes/Header";
import { router, usePage } from '@inertiajs/react';

export default function Empleados({ usuarios, sesionUsuario }) {

    const { mensaje } = usePage().props

    // Estados para los popups
    const [popupAñadir, setPopupAñadir] = useState(false);
    const [popupEditar, setPopupEditar] = useState(false);
    const [popupEliminar, setPopupEliminar] = useState(false);
    const [correo, setCorreo] = useState('');

    // Funciones para mostrar u ocultar los popups
    const mostrarPopupAñadir = () => setPopupAñadir(!popupAñadir);
    const mostrarPopupEditar = () => setPopupEditar(!popupEditar);
    const mostrarPopupEliminar = () => setPopupEliminar(!popupEliminar);

    function añadir() {
        mostrarPopupAñadir();
    };

    const [formAñadir, setFormAñadir] = useState({
        nombre: '',
        apellido: '',
        correo: '',
        contrasena: '',
        rol: '',
    });

    function handleChange(e) {
        const { name, value } = e.target;
        setFormAñadir(prev => ({
            ...prev,
            [name]: value.trim(),
        }));
    };

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

    function editar() {
        mostrarPopupEditar();
    };

    function eliminar(correo) {
        mostrarPopupEliminar();
        setCorreo(correo);
    };
    
    function confirmarEliminar() {
        mostrarPopupEliminar();
        console.log('eliminar: ' + correo);
        router.post('/empleados/eliminar', { correo: correo });
    }
    
    return (
        <>
            <Header sesion={ sesionUsuario }/>
            <main>
                { mensaje && (
                    <div>
                        <h1>{ mensaje }</h1>
                    </div>
                )}
                { popupAñadir && (
                    <div className="popup añadir">
                        <div className='cerrar'>
                            <button onClick={ añadir }>x</button>
                        </div>
                        <h2>Añadir un usuario</h2>
                        <form onSubmit={ confirmarAñadir }>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <label>Nombre</label><br />
                                            <input type="text" name='nombre' value={ formAñadir.nombre } onChange={ handleChange } minLength={2} />
                                        </td>
                                        <td>
                                            <label>Apellido</label><br />
                                            <input type="text" name='apellido' value={ formAñadir.apellido } onChange={ handleChange } minLength={2} />
                                        </td>
                                        <td>
                                            <label>Correo</label><br />
                                            <input type="email" name='correo' value={ formAñadir.correo } onChange={ handleChange } minLength={5} />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>Contraseña</label><br />
                                            <input type="text" name='contrasena' value={ formAñadir.contrasena } onChange={ handleChange } minLength={8} />
                                        </td>
                                        <td>
                                            <label>Rol</label><br />
                                            <select name='rol' value={ formAñadir.rol } onChange={ handleChange } required >
                                                <option value=""></option>
                                                <option value="auxiliar">auxiliar</option>
                                                <option value="adjunto">adjunto</option>
                                                <option value="titular">titular</option>
                                            </select>
                                        </td>
                                        <td>
                                            <div className='guardar'>
                                                <button type='submit'>Guardar</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
                        <h2>Deseas eliminar al usuario { correo }?</h2>
                        <button onClick={ confirmarEliminar }>Confirmar</button>
                        <button onClick={ mostrarPopupEliminar }>Cancelar</button>
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