import FuncionesPopupAñadir from './FuncionesPopupAñadir';

export default function PopupAñadir({ mostrarPopupAñadir, empleados, clientes, productos }) {  

    const {
        handleChangeDatos,
        handleChangeProductos,
        handleChangeUnidades,
        agregarSelect,
        eliminarSelect,
        venta
    } = FuncionesPopupAñadir();

    console.log("Venta: ",venta)

    return (
        <div className="popup añadir-editar">
            <div className='cerrar'>
                <button onClick={ mostrarPopupAñadir }>x</button>
            </div>
            <h2>Añadir una tarea</h2>
            <form onSubmit={ () => enviar() }>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <label>CIPA</label><br />
                                <input type="number" name='cipa' value={ venta.cipa || '' } onChange={ (e) => handleChangeDatos(e) } minLength={10} maxLength={10} />
                            </td>
                            <td>
                                <label>Empleado</label><br />
                                <select name='empleado' value={ venta.empleado || '' } onChange={ (e) => handleChangeDatos(e) } required >
                                    <option value=""></option>
                                    {empleados.map((empleado) => (
                                        <option key={empleado} value={empleado}>{empleado}</option>
                                    ))}
                                </select>
                            </td>
                            <td>
                                <label>Fecha</label><br />
                                <input type="datetime-local" name='fecha' value={ venta.fecha || '' } onChange={ (e) => handleChangeDatos(e) } minLength={8} />
                            </td>
                        </tr>
                        <tr>
                            <td colSpan={3}>
                                <label>Productos</label><br />
                                <div id="contenedor-selects">
                                    <p>
                                        <button id="agregar1" type="button" onClick={ () => agregarSelect(productos, venta) }>+</button>
                                        <select id="productos1" name="productos-1" value={venta.productos} onChange={ (e) => handleChangeProductos(e, productos) } required >
                                            <option value=""></option>
                                            {productos.map((producto) => (
                                            <option key={producto.idInventario} value={producto.nombre}>{producto.nombre}</option>
                                            ))}
                                        </select>
                                        <input type="number" name="unidades-1" onChange={ handleChangeUnidades } min={1} required />
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