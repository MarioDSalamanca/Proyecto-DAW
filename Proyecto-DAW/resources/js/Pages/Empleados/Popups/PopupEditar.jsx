export default function PopupEditar({ mostrarPopupEditar, confirmarEditar, usuarioEditar, handleChange }) {
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
                                <input type="text" name='nombre' value={ usuarioEditar.Nombre } onChange={ handleChange } minLength={2} />
                            </td>
                            <td>
                                <label>Apellido</label><br />
                                <input type="text" name='apellido' value={ usuarioEditar.Apellido } onChange={ handleChange } minLength={2} />
                            </td>
                            <td>
                                <label>Correo</label><br />
                                <input type="email" name='correo' value={ usuarioEditar.Correo } onChange={ handleChange } minLength={5} />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Contraseña</label><br />
                                <input type="text" name='contrasena' value={ usuarioEditar.Contrasena } onChange={ handleChange } minLength={8} />
                            </td>
                            <td>
                                <label>Rol</label><br />
                                <select name='rol' value={ usuarioEditar.Rol } onChange={ handleChange } required >
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