export default function PopupEditar({ mostrarPopupEditar, confirmarEditar, formDatos, handleChange }) {
    return (
        <div className="popup añadir-editar">
            <div className='cerrar'>
                <button onClick={ mostrarPopupEditar }>x</button>
            </div>
            <h2>Editar el cliente</h2>
            <form onSubmit={ (e) => confirmarEditar(e, '/clientes/editar') }>
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
                                <label>Cipa</label><br />
                                <input type="number" name='cipa' value={ formDatos.cipa } onChange={ handleChange } minLength={10} maxLength={10} />
                            </td>
                        </tr>
                        <tr>
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