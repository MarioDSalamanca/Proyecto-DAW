export default function FuncionesPopupAñadir(handleChange) {

    let n = 1;
    let lista = {};
    
    function handleChangeProductos(e, productos) {
        const { name, value } = e.target;
        console.log(name, " / ", value);
    
        // Buscar el producto seleccionado en el select
        const productoObj = productos.find(producto => producto.nombre === value);

        // Capturar el select
        const farmaco = document.getElementsByName(name)[0];

        // Si la lista no está vacía
        if (Object.keys(lista).length !== 0) {

            // Verificar si el producto ya está en la lista 
            const productoExistente = Object.values(lista).find(obj => obj.producto.nombre === value);

            if (productoExistente) {

                farmaco.value = '';
                const unidades = 'unidades-' + name.split('-')[1];
                document.getElementsByName(unidades)[0].value = '';
                alert("Este producto ya está en la lista");
                return;

            } else {
                añadir(productoObj);
            }
        } else {
            añadir(productoObj);
        }

        function añadir() {

            // Capturar el campo del cipa
            const cipa = document.getElementsByName('cipa')[0];

            // Verificar si necesita prescripción médica
            if (productoObj.prescripcion == 1) {

                cipa.setAttribute('required', '');

                if (cipa.value.length !== 10) {

                    cipa.value = '';
                    cipa.focus();
                    farmaco.value = '';
                    alert("El fármaco " + productoObj.nombre + " necesita prescripción médica");
                    return;

                } else {

                    // Eliminar el producto anterior
                    if (lista[name]) {
                        delete lista[name];
                        const unidades = 'unidades-' + name.split('-')[1];
                        document.getElementsByName(unidades)[0].value = '';
                    }

                    // Agregar el producto seleccionado a la lista
                    lista[name] = {
                        producto: productoObj,
                        unidades: 0
                    };
                }
            } else {

                // Eliminar el producto anterior
                if (lista[name]) {
                    delete lista[name];
                    const unidades = 'unidades-' + name.split('-')[1];
                    document.getElementsByName(unidades)[0].value = '';
                    console.log("Lista despues de borrar: ",lista);
                }

                // Agregar el producto seleccionado a la lista
                lista[name] = {
                    producto: productoObj,
                    unidades: 0
                };
            }
        }

        console.log("Lista: ",lista);
        console.log(n)
    }
    
    
    function handleChangeUnidades(e) {
        const { name, value } = e.target;
        const producto = 'productos-'+name.split('-')[1];
    
        // Actualizar las unidades asociadas al producto en el objeto lista
        lista[producto].unidades = parseInt(value);

        handleChange(e, lista);
    }

    function agregarSelect(productos, formDatos) {
    
        console.log(lista);
        console.log(n)
        n++;
        
        const contenedor = document.createElement('p');
        contenedor.id = n;
    
        // Crear el select
        const select = document.createElement('select');
        select.id = 'productos' + n;
        select.name = 'productos-' + n;
        select.value = formDatos.productos;
        select.addEventListener('change', function(e) {
            handleChangeProductos(e, productos)
        });
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
        unidades.id = 'unidades' + n;
        unidades.name = 'unidades-' + n;
        unidades.value = '';
        unidades.addEventListener('change', function(e) {
            handleChangeUnidades(e)
        });
        unidades.min = 1;
        unidades.required = true;
    
        // Crear el botón de agregar
        const botonAgregar = document.createElement('button');
        botonAgregar.id = 'agregar' + n;
        botonAgregar.textContent = '+';
        botonAgregar.addEventListener('click', function() {
            agregarSelect(productos, formDatos);
        });
    
        // Crear el botón de eliminar
        const botonEliminar = document.createElement('button');
        botonEliminar.id = 'eliminar' + n;
        botonEliminar.textContent = '-';
        botonEliminar.addEventListener('click', function() {
            eliminarSelect(contenedor.id);
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
    
        let select = 'productos-'+id
        
        // Obtener el valor del select
        const valorSelect = document.getElementsByName(select)[0].value;
    
        // Eliminar el atr del DOM
        const contenedor = document.getElementById(id);
        contenedor.parentNode.removeChild(contenedor);
    
        // Eliminar el registro del objeto lista si el valor no está vacío
        if (valorSelect !== '') {
            delete lista[select];
        }
    }  

    return {
        handleChangeProductos,
        handleChangeUnidades,
        agregarSelect,
        eliminarSelect
    };
}