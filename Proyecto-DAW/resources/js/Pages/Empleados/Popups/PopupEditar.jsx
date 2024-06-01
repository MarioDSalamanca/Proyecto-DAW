export default function PopupEditar({ mostrarPopupEditar, confirmarEditar, formDatos, handleChange }) {
    return (
        <div className="popup añadir-editar">
            <div className='cerrar'>
                <button onClick={ mostrarPopupEditar }>x</button>
            </div>
            <h2>Editar el empleado</h2>
            <form onSubmit={ (e) => confirmarEditar(e, '/empleados/editar') }>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <label>Nombre</label><br />
                                <input type="text" name='nombre' value={ formDatos.nombre } onChange={ handleChange } minLength={2} />
                            </td>
                            <td>
                                <label>Apellido</label><br />
                                <input type="text" name='apellido' value={ formDatos.apellido } onChange={ handleChange } minLength={2} />
                            </td>
                            <td>
                                <label>Correo</label><br />
                                <input type="email" name='correo' value={ formDatos.correo } onChange={ handleChange } minLength={5} />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Contraseña</label><br />
                                <input type="text" name='contrasena' value={ formDatos.contrasena } onChange={ handleChange } minLength={8} />
                            </td>
                            <td>
                                <label>Rol</label><br />
                                <select name='rol' value={ formDatos.rol } onChange={ handleChange } required >
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