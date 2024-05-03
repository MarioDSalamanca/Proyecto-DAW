export default function FuncionesPopupAñadir() {

    let aux = 1;
    let lista = {};
    
    function handleChangeProductos(e, productos) {
    const { name, value } = e.target;
    const productoObj = productos.find(producto => producto.nombre === value);
    
    // Verificar si el producto ya está en la lista
    const productoExistente = Object.values(lista).find(obj => obj.nombre === value);
    
    if (productoExistente) {
        document.getElementsByName(name)[0].value = '';
        alert("Este producto ya está en la lista");
        return;
    }
    
    if (Object.keys(lista).length !== 0) {
        if (lista[name]) {
            delete lista[name];
        }
        lista[name] = productoObj;
    } else {
        lista[name] = productoObj;
    }
            
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
        select.name = 'productos' + aux;
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
        unidades.name = 'unidades' + aux;
        unidades.value = '';
        unidades.addEventListener('change', (e) => handleChangeProductos(e, productos) );
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
    
        let select = 'productos'+id
        
        // Obtener el valor del select
        const valorSelect = document.getElementById(select).value;
    
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
        agregarSelect,
        eliminarSelect,
    };
}