import { useState } from "react";

export default function PopupAñadir({ mostrarPopupAñadir, confirmarAñadir, formDatos, handleChange, empleados }) {
    
    /* PRUEBAASSSS */

    const [productos, setProductos] = useState({
        productosSeleccionados: [''] // Inicialmente, un select vacío
    });

    // Maneja el cambio en el select de productos
    const handleChangeProducto = (index, e) => {
        const nuevosProductos = [...productos.productosSeleccionados];
        nuevosProductos[index] = e.target.value;
        setProductos(prev => ({ ...prev, productosSeleccionados: nuevosProductos }));
    };

    // Agrega otro select para seleccionar un producto
    const agregarProducto = () => {
        setProductos(prev => ({
            ...prev,
            productosSeleccionados: [...prev.productosSeleccionados, '']
        }));
    };

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
                                <input type="text" name='cipa' value={ formDatos.cipa || '' } onChange={ handleChange } minLength={10} maxLength={10} />
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
                        {productos.productosSeleccionados.map((producto, index) => (
                            <tr key={index}>
                                <td>
                                    <button onClick={agregarProducto}>+</button>
                                </td>
                                <td>
                                    <label>Producto</label><br />
                                    <select
                                        name={`producto-${index}`}
                                        value={producto}
                                        onChange={(e) => handleChange(index, e)}
                                        required
                                    >
                                        <option value=""></option>
                                        {productos.map((producto) => (
                                            <option key={producto} value={producto}>{producto}</option>
                                        ))}
                                    </select>
                                </td>
                            </tr>
                        ))}
                        <tr>                            <td>
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