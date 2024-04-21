export default function PopupEditar({ mostrarPopupEditar, confirmarEditar, formDatos, handleChange }) {
        console.log(formDatos)
    return (
        <div className="popup añadir-editar">
            <div className='cerrar'>
                <button onClick={ mostrarPopupEditar }>x</button>
            </div>
            <h2>Editar una tarea</h2>
            <form onSubmit={ (e) => confirmarEditar(e, '/inventario/editar') }>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <label>Precio de venta</label><br />
                                <input type="number" name='precio' value={ formDatos.precio } onChange={ handleChange } min={1} step={0.1} />
                            </td>
                            <td>
                                <label>Nuevo Stock</label><br />
                                <input type="number" name='stock' value={ formDatos.stock } onChange={ handleChange } minLength={1} />
                            </td>
                            <td>
                                <div className='guardar'>
                                    <button type='submit' style={{width: "10vw"}}>Guardar</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    );
};