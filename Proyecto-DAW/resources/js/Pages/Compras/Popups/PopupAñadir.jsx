export default function PopupAñadir({ mostrarPopupAñadir, confirmarAñadir, formDatos, handleChange, proveedores }) {
    console.log(formDatos)
    return (
        <div className="popup añadir-editar">
            <div className='cerrar'>
                <button onClick={ mostrarPopupAñadir }>x</button>
            </div>
            <h2>Añadir una tarea</h2>
            <form onSubmit={ (e) => confirmarAñadir(e, '/compras/añadir') }>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <label>Fármaco</label><br />
                                <input type="text" name='farmaco' value={ formDatos.farmaco || '' } onChange={ handleChange } minLength={2} />
                            </td>
                            <td>
                                <label>Nombre comercial</label><br />
                                <input type="text" name='nombre' value={ formDatos.nombre || '' } onChange={ handleChange } minLength={2} />
                            </td>
                            <td>
                                <label>Precio de venta</label><br />
                                <input type="number" name='precio' value={ formDatos.precio || '' } onChange={ handleChange } step={0.1} min={1} />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Importe</label><br />
                                <input type="number" name='importe' value={ formDatos.importe || '' } onChange={ handleChange } step={0.1} min={1} />
                            </td>
                            <td>
                                <label>Unidades</label><br />
                                <input type="number" name='unidades' value={ formDatos.unidades || '' } onChange={ handleChange } step={10} min={10} />
                            </td>
                            <td>
                                <label>¿Necesita prescripción?</label><br />
                                <select name='prescripcion' value={ formDatos.prescripcion || '' } onChange={ handleChange } required >
                                    <option value=""></option>
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Fecha</label><br />
                                <input type="datetime-local" name='fecha' value={ formDatos.fecha || '' } onChange={ handleChange } minLength={8} />
                            </td>
                            <td>
                                <label>Proveedor</label><br />
                                <select name='proveedor' value={ formDatos.proveedor || '' } onChange={ handleChange } required >
                                    <option value=""></option>
                                    {proveedores.map((proveedor) => (
                                        <option key={proveedor} value={proveedor}>{proveedor}</option>
                                    ))}
                                </select>
                            </td>
                            <td colSpan={1}>
                                <div className='guardar'>
                                    <button type='submit'>Guardar</button>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    );
};