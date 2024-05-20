export default function PopupAñadir({ mostrarPopupAñadir, confirmarAñadir, formDatos, handleChange }) {
    
    return (
        <div className="popup añadir-editar">
            <div className='cerrar'>
                <button onClick={ mostrarPopupAñadir }>x</button>
            </div>
            <h2>Añadir un usuario</h2>
            <form onSubmit={ (e) => confirmarAñadir(e, '/empleados/añadir') }>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <label>Nombre</label><br />
                                <input type="text" name='nombre' value={ formDatos.nombre || '' } onChange={ handleChange } minLength={2} />
                            </td>
                            <td>
                                <label>Apellido</label><br />
                                <input type="text" name='apellido' value={ formDatos.apellido || '' } onChange={ handleChange } minLength={2} />
                            </td>
                            <td>
                                <label>Correo</label><br />
                                <input type="email" name='correo' value={ formDatos.correo || '' } onChange={ handleChange } minLength={5} />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Contraseña</label><br />
                                <input type="text" name='contrasena' value={ formDatos.contrasena || '' } onChange={ handleChange } minLength={8} />
                            </td>
                            <td>
                                <label>Rol</label><br />
                                <select name='rol' value={ formDatos.rol || '' } onChange={ handleChange } required >
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
    );
};