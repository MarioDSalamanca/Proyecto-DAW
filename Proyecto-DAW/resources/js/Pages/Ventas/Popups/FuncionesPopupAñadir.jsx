import { useState } from "react";

export default function FuncionesPopupAñadir() {

    const [venta, setVenta] = useState({});

    function handleChangeDatos(e) {
        const { name, value } = e.target;
        setVenta(prev => ({
            ...prev,
            [name]: value
        }));
    }

    function handleChangeProductos(e, productos) {
        
        const { name, value } = e.target;
    
        // Buscar el producto seleccionado en el select
        const productoObj = productos.find(producto => producto.nombre === value);

        const farmaco = document.getElementsByName(name)[0];

        // Si la venta no está vacía
        if (Object.keys(venta).length !== 0) {

            // Verificar si el producto ya está en la venta 
            let productoExistente = false;

            for (const i in venta) {
                if (i.startsWith('productos-')) {
                    const nombreProducto = venta[i].producto.nombre;
                    
                    if (nombreProducto === value) {
                        productoExistente = true;
                        break;
                    }
                }
            }

            if (productoExistente) {

                // Vaciar el select y las unidades
                farmaco.value = '';
                const unidades = 'unidades-' + name.split('-')[1];
                document.getElementsByName(unidades)[0].value = '';
                alert("Este producto ya está en la venta");

                if (venta[name]) {
                    delete venta[name];
                    setVenta(venta);
                }

                return;

            } else {
                añadir();
            }
        } else {
            añadir();
        }

        function añadir() {

            // Capturar el campo del cipa
            const cipa = document.getElementsByName('cipa')[0];

            // Verificar si necesita prescripción médica
            if (productoObj.prescripcion == 1) {

                if (cipa.value.length !== 10) {

                    farmaco.value = '';
                    alert("El fármaco " + productoObj.nombre + " necesita prescripción médica");
                    cipa.focus();

                    if (venta[name]) {
                        delete venta[name];
                        setVenta(venta);
                    }   
                    
                    return;

                } else {

                    // Eliminar el producto anterior
                    if (venta[name]) {
                        delete venta[name];
                        setVenta(venta);
                        const unidades = 'unidades-' + name.split('-')[1];
                        document.getElementsByName(unidades)[0].value = '';
                    }

                    // Agregar el producto seleccionado a la venta
                    setVenta(prev => ({
                        ...prev,
                        [name]: {
                            producto: productoObj,
                            unidades: 0
                        }
                    }));
                }
            } else {

                // Eliminar el producto anterior
                if (venta[name]) {
                    delete venta[name];
                    setVenta(venta);
                    const unidades = 'unidades-' + name.split('-')[1];
                    document.getElementsByName(unidades)[0].value = '';
                }

                // Agregar el producto seleccionado a la venta
                setVenta(prev => ({
                    ...prev,
                    [name]: {
                        producto: productoObj,
                        unidades: 0
                    }
                }));
            }
        }

        const unidades = document.getElementsByName('unidades-'+name.split('-')[1])[0];

        if (farmaco.value != '') {
            unidades.style.display = 'block';
        } else {
            unidades.style.display = 'none';
        }
    }
    
    function handleChangeUnidades(e) {

        const { name, value } = e.target;
        const n = name.split('-')[1];

        setVenta(prev => ({
            ...prev,
            ['productos-' + n]: {
                ...prev['productos-' + n],
                unidades: parseInt(value)
            }
        }));
    }

    function agregarSelect(productos) {

        let ultimoSelect = null;

        for (let i = 10; i >= 0; i--) {
            const selects = document.getElementsByName('productos-'+i);
            
            if (selects.length > 0) {
                ultimoSelect = selects[0];
                break;
            }
        };

        ultimoSelect = ultimoSelect.name;
        let ultimoCaracter = ultimoSelect.slice(-1);
        let ultimoNumero = parseInt(ultimoCaracter, 10);
        let nuevoSelect = ultimoNumero + 1;

        const contenedor = document.createElement('p');
        contenedor.id = nuevoSelect;
    
        // Crear el select
        const select = document.createElement('select');
        select.id = 'productos' + nuevoSelect;
        select.name = 'productos-' + nuevoSelect;
        select.value = venta.productos;
        select.onchange = (e) => {
            handleChangeProductos(e, productos);
        };
        select.required = true;
        
        // Agregar opciones al select
        const opcionVacia = document.createElement('option');
        opcionVacia.value = '';
        opcionVacia.textContent = '';
        select.appendChild(opcionVacia);
    
        productos.forEach(producto => {
            const option = document.createElement('option');
            option.key = producto.idInventario;
            option.value = producto.nombre;
            option.textContent = producto.nombre;
            select.appendChild(option);
        });
    
        // Crear el atr select
        const unidades = document.createElement('input');
        unidades.type = 'number';
        unidades.id = 'unidades' + nuevoSelect;
        unidades.name = 'unidades-' + nuevoSelect;
        unidades.value = '';
        unidades.onchange = function(e) {
            handleChangeUnidades(e);
        };
        unidades.min = 1;
        unidades.required = true;
    
        // Crear el botón de eliminar
        const botonEliminar = document.createElement('button');
        botonEliminar.id = 'eliminar' + nuevoSelect;
        botonEliminar.textContent = '-';
        botonEliminar.onclick = function() {
            eliminarSelect(contenedor.id);
        };
    
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
    
        let select = 'productos-'+id
        
        // Obtener el valor del select
        const valorSelect = document.getElementsByName(select)[0].value;
    
        // Eliminar el atr del DOM
        const contenedor = document.getElementById(id);
        contenedor.parentNode.removeChild(contenedor);
    
        // Eliminar el registro del objeto venta si el valor no está vacío
        if (valorSelect !== '') {
            delete venta[select];
            setVenta(venta);
        }
    }

    return {
        handleChangeDatos,
        handleChangeProductos,
        handleChangeUnidades,
        agregarSelect,
        eliminarSelect,
        venta
    };
}
