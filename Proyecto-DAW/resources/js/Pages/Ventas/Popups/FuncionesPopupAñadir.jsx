import { useEffect, useState } from "react";

export default function FuncionesPopupAñadir() {

    // Estados
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

    // Añadir los errores
        function err(name, value) {
            setErrores(prev => ({ 
                ...prev, 
                [name]: value 
            }));
        }

    // Eliminar errores
        function eliminarErr(name) {

            if (errores[name]) {
                const nuevo = { ...errores };
                delete nuevo[name];
                setErrores(nuevo);
            }
        }

    // Añadir datos a venta
        function set(name, value) {
            setVenta(prev => ({
                ...prev,
                [name]: value
            }));
        }

    // Eliminar dato de la venta
        function borrar(name) {
            let nuevo = { ...venta };
            delete nuevo[name];
            setVenta(nuevo);
        }

    // Procesar los campos de cipa, empleado, fecha, nombre y apellido pasando la lista de clientes
    function handleChangeDatos(e, clientes) {

        const cipa = document.getElementsByName('cipa')[0];

        const { name, value } = e.target;

        // Comprobar si se ha rellenado el cipa y se le llama a la funcion pasando clientes
        if (clientes && cipa.value.length == 10) {

            // Si el cipa está en la lista de clientes
            if (clientes.includes(value)) {

                document.getElementsByClassName('cliente')[0].classList.add('oculto');
                document.getElementsByClassName('cliente')[1].classList.add('oculto');

                set(name, value);

                eliminarErr("errorCipa")

            } else {
                // Mostrar el error y los campos
                document.getElementsByClassName('cliente')[0].classList.remove('oculto');
                document.getElementsByClassName('cliente')[1].classList.remove('oculto');
                err("errorCipa", "El cliente con el cipa ("+cipa.value+") no está registrado");
                set(name, value);

                const nombre = document.getElementsByName('nombre')[0];
                const apellido = document.getElementsByName('apellido')[0];

                // Si se rellenan nombre y apellido añadirlo
                if (nombre.value.length >= 2 || apellido.value.length >= 3) {
                    set(name, value);
                }
            }

        } else {
            set(name, value);
        }
    }

    // Función para procesar los selects
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
                    borrar(name);
                }

                return;

            } else {
                añadir();
                eliminarErr("errorRepetido");
            }
        } else {
            añadir();
        }

        // Verificación de prescripción
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
                        borrar(name);
                    }   
                    
                    return;

                } else {

                    // Eliminar el producto anterior
                    if (venta[name]) {
                        borrar(name);
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
                    borrar(name);
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

        // Ocultar o mostrar el campo de las unidades si hay un producto seleccioando
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

    // Agregar los campos de select para añadir más productos
    function agregarSelect(productos) {

        let ultimoSelect = null;

        for (let i = 10; i >= 0; i--) {
            const selects = document.getElementsByName('productos-'+i);
            
            if (selects.length > 0) {
                ultimoSelect = selects[0];
                break;
            }
        };

        // Sacar el último select que hay en el html por el nº
        ultimoSelect = ultimoSelect.name;
        const ultimoCaracter = ultimoSelect.slice(-1);
        const ultimoNumero = parseInt(ultimoCaracter, 10);
        const nuevoSelect = ultimoNumero + 1;

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
    
        // Agregar los options con los productos al select
        productos.forEach(producto => {
            const option = document.createElement('option');
            option.key = producto.idInventario;
            option.value = producto.nombre;
            option.textContent = producto.nombre;
            select.appendChild(option);
        });
    
        // Crear las unidades para el select
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
    
    // Para eliminar el select seleccionado con sus unidades
    function eliminarSelect(id) {
    
        const select = 'productos-'+id
        
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
