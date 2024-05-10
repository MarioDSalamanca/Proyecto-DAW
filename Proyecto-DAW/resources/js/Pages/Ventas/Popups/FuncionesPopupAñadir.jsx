import { useEffect, useState } from "react";

export default function FuncionesPopupAñadir() {

    const [venta, setVenta] = useState({});
    const [errores, setErrores] = useState({});

    // Cada vez que cambie errores se actualiza en el párrafo
    useEffect(() => {
    
        console.log(errores, venta)

        // Limpia el contenido existente en "avisos"
        let avisos = document.getElementById("avisos");
        avisos.innerHTML = "";
    
        // Agrega cada error como un párrafo
        Object.keys(errores).forEach((errorName) => {
            let parrafo = document.createElement("p");
            parrafo.textContent = errores[errorName];
            avisos.appendChild(parrafo);
        });

    }, [errores]);

    function err(name, value) {
        setErrores(prev => ({ 
            ...prev, 
            [name]: value 
        }));
    }

    function eliminarErr(name) {

        if (errores[name]) {
            const nuevo = { ...errores };
            delete nuevo[name];
            setErrores(nuevo);
        }
    }

    function handleChangeDatos(e, clientes) {

        const cipa = document.getElementsByName('cipa')[0];

        const { name, value } = e.target;

        if (clientes && cipa.value.length == 10) {

            if (clientes.includes(value)) {

                document.getElementsByClassName('cliente')[0].classList.add('oculto');
                document.getElementsByClassName('cliente')[1].classList.add('oculto');

                setVenta(prev => ({
                    ...prev,
                    [name]: value
                }));

                eliminarErr("errorCipa")
            } else {
                document.getElementsByClassName('cliente')[0].classList.remove('oculto');
                document.getElementsByClassName('cliente')[1].classList.remove('oculto');
                err("errorCipa", "El cliente con el cipa ("+cipa.value+") no está registrado");
            }

        } else {
            setVenta(prev => ({
                ...prev,
                [name]: value
            }));
        }
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
                    console.log(nombreProducto, value);
                }
            }

            if (productoExistente) {

                // Vaciar el select y las unidades
                farmaco.value = '';
                const unidades = 'unidades-' + name.split('-')[1];
                document.getElementsByName(unidades)[0].value = '';
                err("errorRepetido", "El producto "+value+" ya está en la venta");

                if (venta[name]) {
                    const nuevo = { ...venta };
                    delete nuevo[name];
                    setVenta(nuevo);
                }

                return;

            } else {
                añadir();
                eliminarErr("errorRepetido");
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
                    err("errorPrescripcion", "El fármaco " + productoObj.nombre + " necesita prescripción médica");
                    cipa.focus();

                    if (venta[name]) {
                        const nuevo = { ...venta };
                        delete nuevo[name];
                        setVenta(nuevo);
                    }   
                    
                    return;

                } else {

                    // Eliminar el producto anterior
                    if (venta[name]) {
                        const nuevo = { ...venta };
                        delete nuevo[name];
                        setVenta(nuevo);
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

                    eliminarErr("errorPrescripcion");
                }
            } else {

                // Eliminar el producto anterior
                if (venta[name]) {
                    const nuevo = { ...venta };
                    delete nuevo[name];
                    setVenta(nuevo);
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
    
        let nuevo = { ...venta };

        // Eliminar el registro del objeto venta si el valor no está vacío
        if (valorSelect !== '') {
            delete nuevo[select];
            setVenta(nuevo);
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
