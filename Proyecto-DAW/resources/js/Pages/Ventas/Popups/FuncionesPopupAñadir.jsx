export default function FuncionesPopupAñadir() {

    let aux = 1;
    let lista = {};
    
    function handleChangeProductos(e, productos) {
        const { name, value } = e.target;
        const productoObj = productos.find(producto => producto.nombre === value);
        
        // Verificar si el producto ya está en la lista
        const productoExistente = Object.values(lista).find(obj => obj.producto.nombre === value);
        
        if (productoExistente) {
            document.getElementsByName(name)[0].value = '';
            let unidades = 'unidades-' + name.split('-')[1];
            document.getElementsByName(unidades)[0].value = '';
            alert("Este producto ya está en la lista");
            return;
        }
        
        if (Object.keys(lista).length !== 0) {
            if (lista[name]) {
                delete lista[name];
                let unidades = 'unidades-' + name.split('-')[1];
                document.getElementsByName(unidades)[0].value = '';
            }
            lista[name] = {
                producto: productoObj,
                unidades: 0
            };
        } else {
            lista[name] = {
                producto: productoObj,
                unidades: 0
            };
        }
        console.log(lista[name].producto.prescripcion)
        console.log(document.getElementsByName('cipa')[0].length)
        if (lista[name].producto.prescripcion == 1) {
            if (document.getElementsByName('cipa')[0].value.length != 10) {
                document.getElementsByName(name)[0].value = '';
                document.getElementsByName(name)[0].style.border = '2px solid orange';
                alert("El fármaco "+ lista[name].producto.nombre +" necesita prescripción médica");
            } else {
                document.getElementsByName(name)[0].style.border = '1px solid black';
                document.getElementsByName(name)[0].style.backgroundColor = 'white';
            }
        }
                
        console.log("Lista:", lista);
    }
    
    function handleChangeUnidades(e) {
        const { name, value } = e.target;
        const producto = 'productos-'+name.split('-')[1];
    
        // Actualizar las unidades asociadas al producto en el objeto lista
        lista[producto].unidades = value;
    
        console.log("Lista:", lista);
    }

    function agregarSelect(productos, formDatos) {
    
        aux++;
        
        // Obtener el elemento donde quieres agregar HTML
        const contenedor = document.createElement('p');
        contenedor.id = aux;
    
        // Crear el elemento select
        const select = document.createElement('select');
        select.id = 'productos' + aux;
        select.name = 'productos-' + aux;
        select.value = formDatos.productos;
        select.addEventListener('change', (e) => handleChangeProductos(e, productos) );
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
    
        // Crear el elemento select
        const unidades = document.createElement('input');
        unidades.type = 'number';
        unidades.id = 'unidades' + aux;
        unidades.name = 'unidades-' + aux;
        unidades.value = '';
        unidades.addEventListener('change', (e) => handleChangeUnidades(e) );
        unidades.required = true;
    
        // Crear el botón de agregar
        const botonAgregar = document.createElement('button');
        botonAgregar.id = 'agregar' + aux;
        botonAgregar.textContent = '+';
        botonAgregar.addEventListener('click', function() {
            agregarSelect(productos, formDatos);
        });
    
        // Crear el botón de eliminar
        const botonEliminar = document.createElement('button');
        botonEliminar.id = 'eliminar' + aux;
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
    
        // Eliminar el elemento del DOM
        const contenedor = document.getElementById(id);
        contenedor.parentNode.removeChild(contenedor);
    
        // Eliminar el registro del objeto lista si el valor no está vacío
        if (valorSelect !== '') {
            delete lista[select];
            console.log("Lista actualizada:", lista);
        }
    }  

    return {
        handleChangeProductos,
        handleChangeUnidades,
        agregarSelect,
        eliminarSelect,
    };
}