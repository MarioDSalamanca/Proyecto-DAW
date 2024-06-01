export default function PopupAñadir({ mostrarPopupAñadir, confirmarAñadir, formDatos, handleChange }) {
    
    return (
        <div className="popup añadir-editar">
            <div className='cerrar'>
                <button onClick={ mostrarPopupAñadir }>x</button>
            </div>
            <h2>Añadir un cliente</h2>
            <form onSubmit={ (e) => confirmarAñadir(e, '/clientes/añadir') }>
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
                                <label>Cipa</label><br />
                                <input type="number" name='cipa' value={ formDatos.cipa || '' } onChange={ handleChange } min={1} max={9999999999} />
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