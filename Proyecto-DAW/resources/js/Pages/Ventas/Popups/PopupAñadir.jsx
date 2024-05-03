import FuncionesPopupAñadir from './FuncionesPopupAñadir';

export default function PopupAñadir({ mostrarPopupAñadir, confirmarAñadir, formDatos, handleChange, empleados, clientes, productos }) {  

    const {
        handleChangeProductos,
        agregarSelect,
        eliminarSelect,
    } = FuncionesPopupAñadir();

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
                                <label>CIPA</label><br />
                                <input type="number" name='cipa' value={ formDatos.cipa || '' } onChange={ handleChange } minLength={10} maxLength={10} />
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
                            <td colSpan={3}>
                                <label>Productos</label><br />
                                <div id="contenedor-selects">
                                    <p>
                                        <button id="agregar1" type="button" onClick={ () => agregarSelect(productos, formDatos) }>+</button> {/* Pasé 'productos' y 'formDatos' como argumentos a la función 'agregarSelect' */}
                                        <select id="productos1" name="productos1" value={formDatos.productos} onChange={ (e) => handleChangeProductos(e, productos) } required > {/* Pasé 'productos' como argumento a la función 'handleChangeProductos' */}
                                            <option value=""></option>
                                            {productos.map((producto) => (
                                            <option key={producto.idInventario} value={producto.nombre}>{producto.nombre}</option>
                                            ))}
                                        </select>
                                        <input type="number" name="unidades-1" onChange={ (e) => handleChangeProductos(e, productos) } min={1} required />
                                    </p>
                                </div>
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