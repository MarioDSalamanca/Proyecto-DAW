export default function PopupAñadir({ mostrarPopupAñadir, confirmarAñadir, formDatos, handleChange, empleados }) {
    
    return (
        <div className="popup añadir-editar">
            <div className='cerrar'>
                <button onClick={ mostrarPopupAñadir }>x</button>
            </div>
            <h2>Añadir una tarea</h2>
            <form onSubmit={ (e) => confirmarAñadir(e, '/ventas/añadir') }>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <label>Nombre</label><br />
                                <input type="text" name='nombre' value={ formDatos.nombre || '' } onChange={ handleChange } minLength={2} />
                            </td>
                            <td>
                                <label>Empleado</label><br />
                                <select name='empleado' value={ formDatos.empleado || '' } onChange={ handleChange } required >
                                    <option value=""></option>
                                    {empleados.map((empleado) => (
                                        <option key={empleado} value={empleado}>{empleado}</option>
                                    ))}
                                </select>
                            </td>
                            <td>
                                <label>Fecha</label><br />
                                <input type="datetime-local" name='fecha' value={ formDatos.fecha || '' } onChange={ handleChange } minLength={8} />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Descripción</label><br />
                                <textarea name='descripcion' value={ formDatos.descripcion || '' } onChange={ handleChange } minLength={8} />
                            </td>
                            <td>
                                <label>Estado</label><br />
                                <select name='estado' value={ formDatos.estado || '' } onChange={ handleChange } required >
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