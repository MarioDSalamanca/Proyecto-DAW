export default function PopupAñadir({ mostrarPopupAñadir, confirmarAñadir, formDatos, handleChange, empleados, clientes, productos }) {

    console.log(formDatos)

    let aux = 1;
    let lista = [];

    function handleChangeProductos(e) {

        /* Tengo que pasar un objeto a formDatos con productos y unidades */
    }    

    function agregarSelect(productos) {

        // Obtener el elemento donde quieres agregar HTML
        const contenedor = document.createElement('p');
        contenedor.id = aux;
        
        aux++;

        // Crear el elemento select
        const select = document.createElement('select');
        select.id = 'productos' + aux;
        select.name = 'productos-' + aux;
        select.value = formDatos.productos;
        select.addEventListener('change', handleChangeProductos );
        select.required = true;
        
        // Agregar opciones al select
        const opcionVacia = document.createElement('option');
        opcionVacia.value = '';
        opcionVacia.textContent = '';
        select.appendChild(opcionVacia);

        productos.forEach(producto => {
            const option = document.createElement('option');
            option.value = producto;
            option.textContent = producto;
            select.appendChild(option);
        });

        // Crear el elemento select
        const unidades = document.createElement('input');
        unidades.type = 'number';
        unidades.id = 'unidades' + aux;
        unidades.name = 'unidades-' + aux;
        unidades.value = '';
        unidades.addEventListener('change', handleChange );
        unidades.required = true;

        // Crear el botón de agregar
        const botonAgregar = document.createElement('button');
        botonAgregar.id = 'agregar' + aux;
        botonAgregar.textContent = '+';
        botonAgregar.addEventListener('click', function() {
            agregarSelect(productos);
        });

        // Crear el botón de eliminar
        const botonEliminar = document.createElement('button');
        botonEliminar.id = 'eliminar' + aux;
        botonEliminar.textContent = '-';
        botonEliminar.addEventListener('click', function() {
            eliminarSelect(contenedor.id); // Pasar el ID del contenedor al eliminarSelect
        });

        // Agregar los botones al contenedor
        contenedor.appendChild(botonEliminar);

        // Agregar el select al contenedor
        contenedor.appendChild(select);

        // Agregar unidades al contenedor
        contenedor.appendChild(unidades);

        // Agregar el contenedor al contenedor-selects
        document.getElementById('contenedor-selects').appendChild(contenedor);
    }

    function eliminarSelect(id) {
    
        // Obtener el elemento que quieres eliminar
        const elementoEliminar = document.getElementById(id);
    
        // Eliminar el elemento del DOM
        elementoEliminar.parentNode.removeChild(elementoEliminar);
    }

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
                                        <button id="agregar1" onClick={ () => agregarSelect(productos) }>+</button>
                                        <select id="productos1" name="productos1" value={formDatos.productos} onChange={ handleChange } required >
                                            <option value=""></option>
                                            {productos.map((producto) => (
                                                <option key={producto} value={producto}>{producto}</option>
                                            ))}
                                        </select>
                                        <input type="number" name="unidades-1" onChange={ handleChange } min={1} required />
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