import FuncionesPopupAñadir from './FuncionesPopupAñadir';

export default function PopupAñadir({ mostrarPopupAñadir, confirmarAñadirVenta, empleados, clientes, productos }) {  

    const {
        handleChangeDatos,
        handleChangeProductos,
        handleChangeUnidades,
        agregarSelect,
        eliminarSelect,
        venta
    } = FuncionesPopupAñadir();

    console.log(venta);

    return (
        <div className="popup añadir-editar">
            <div className='cerrar'>
            <button onClick={ () => { mostrarPopupAñadir() }}>x</button>
            </div>
            <h2>Añadir una venta</h2>
            <form onSubmit={ (e) => confirmarAñadirVenta(e, '/ventas/añadir', venta) }>
            <p id="avisos"></p>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <label>CIPA</label><br />
                                <input type="number" name='cipa' onChange={ (e) => handleChangeDatos(e, clientes) } min={1} max={9999999999} />
                            </td>
                            <td>
                                <label>Empleado</label><br />
                                <select name='empleado' onChange={ (e) => handleChangeDatos(e) } required >
                                    <option value=""></option>
                                    {empleados.map((empleado) => (
                                        <option key={empleado} value={empleado}>{empleado}</option>
                                    ))}
                                </select>
                            </td>
                            <td>
                                <label>Fecha</label><br />
                                <input type="datetime-local" name='fecha' onChange={ (e) => handleChangeDatos(e) } minLength={8} required />
                            </td>
                        </tr>
                        <tr>
                            <td className='cliente oculto'>
                                <label>Nombre cliente</label><br />
                                <input type="text" name='nombre' onChange={ (e) => handleChangeDatos(e, clientes) } minLength={2} />
                            </td>
                            <td className='cliente oculto'>
                                <label>Apellido cliente</label><br />
                                <input type="text" name='apellido' onChange={ (e) => handleChangeDatos(e, clientes) } minLength={3} />
                            </td>
                        </tr>
                        <tr>
                            <td colSpan={3}>
                                <label>Productos</label><br />
                                <div id="contenedor-selects">
                                    <p>
                                        <button id="agregar1" type="button" onClick={ () => agregarSelect(productos, venta) }>+</button>
                                        <select id="productos1" name="productos-1" onChange={(e) => { handleChangeProductos(e, productos) }} required >
                                        <option value=""></option>
                                        {productos.map((producto) => (
                                            <option key={producto.idInventario} value={producto.nombre}>
                                                {producto.nombre}
                                            </option>
                                        ))}
                                        </select>
                                        <input type="number" name="unidades-1" onChange={handleChangeUnidades} min={1} required />
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