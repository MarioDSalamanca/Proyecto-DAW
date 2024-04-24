export default function PopupInfo({ mostrarPopupInfo, formDatos }) {
    //console.log(formDatos);
    //console.log(formDatos.detalle_ventas.length)

    // Datos predefinidos
    const datos = ['.clientes.nombre', '.clientes.apellido', '.clientes.dniCif'];


    // Función para mostrar los detalles de venta
    function mostrarDetalles(formDatos) {
        let detallesInfo = [];
        let detalles = formDatos.detalle_ventas;
    
        for (let i = 0; i < detalles.length; i++) {
            let detalles = formDatos.detalle_ventas[i];
            console.log(detalles);
            // Crear un objeto para almacenar la información del detalle
            let detalleInfo = {};
    
            // Agregar la información deseada al objeto detalleInfo
            detalleInfo.unidades = detalles.unidades;
            detalleInfo.nombreComercial = detalles.inventario.nombre;
    
            // Agregar el objeto detalleInfo al array detallesInfo
            detallesInfo.push(detalleInfo);
        }
    
        console.log(detallesInfo);
    }

    mostrarDetalles(formDatos);

    return (
        <div className="popup añadir-editar">
            <div className='cerrar'>
                <button onClick={mostrarPopupInfo}>x</button>
            </div>
            <div>                
                
            </div>
        </div>
    );
}