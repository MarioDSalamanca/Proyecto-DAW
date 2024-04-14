export default function PopupEditar({ mostrarPopupEditar, confirmarEditar, formDatos, handleChange }) {
    return (
        <div className="popup añadir-editar">
            <div className='cerrar'>
                <button onClick={ mostrarPopupEditar }>x</button>
            </div>
            <h2>Editar un usuario</h2>
            <form onSubmit={ confirmarEditar }>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <label>Nombre</label><br />
                                <input type="text" name='nombre' value={ formDatos.nombre } onChange={ handleChange } minLength={2} />
                            </td>
                            <td>
                                <label>Apellido</label><br />
                                <input type="email" name='apellido' value={ formDatos.empleados.correo } onChange={ handleChange } minLength={2} />
                            </td>
                            <td>
                                <label>Correo</label><br />
                                <input type="date" name='correo' value={ formDatos.fecha } onChange={ handleChange } minLength={5} />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Contraseña</label><br />
                                <input type="text" name='contrasena' value={ formDatos.descripcion } onChange={ handleChange } minLength={8} />
                            </td>
                            <td>
                                <label>Rol</label><br />
                                <select name='rol' value={ formDatos.estado || '' } onChange={ handleChange } required >
                                    <option value=""></option>
                                    <option value="pendiente">pendiente</option>
                                    <option value="hecho">hecho</option>
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