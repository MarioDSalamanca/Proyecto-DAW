export default function PopupInfo({ mostrarPopupInfo, formDatos }) {
    console.log(formDatos);
    // Datos predefinidos
    const datos = ['.clientes.nombre', '.clientes.apellido', '.clientes.dniCif'];

    // Función para mostrar los detalles de venta
    function mostrarDetalles(formDatos) {
        let detallesInfo = [];
        let detalles = formDatos.detalle_ventas;
    
        for (let i = 0; i < detalles.length; i++) {
            let detalles = detalles[i];
            // Crear un objeto para almacenar la información del detalle
            let detalleInfo = {};
    
            // Agregar la información deseada al objeto detalleInfo
            detalleInfo.idDetalleVenta = detalles.idDetalleVenta;
            detalleInfo.unidades = detalles.unidades;
    
            // Agregar el objeto detalleInfo al array detallesInfo
            detallesInfo.push(detalleInfo);
        }
    
        console.log(detallesInfo);
    }    

    mostrarDetalles();

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