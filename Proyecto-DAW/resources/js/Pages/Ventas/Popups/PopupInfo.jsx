export default function PopupInfo({ mostrarPopupInfo, formDatos }) {
    //console.log(formDatos);
    //console.log(formDatos.detalle_ventas.length)

    // Datos predefinidos


    // Función para mostrar los detalles de venta
    function mostrarDetalles(formDatos) {
        let detallesInfo = [];
        let detalles = formDatos.detalle_ventas;
    
        for (let i = 0; i < detalles.length; i++) {
            let detalle = detalles[i];
    
            // Crear un objeto para almacenar la información del detalle
            let detalleInfo = {};
    
            // Agregar la información deseada al objeto detalleInfo
            detalleInfo.unidades = detalle.unidades;
            detalleInfo.farmaco = detalle.inventario.farmaco;
            detalleInfo.nombreComercial = detalle.inventario.nombre;
            detalleInfo.stock = detalle.inventario.stock;
    
            // Agregar el objeto detalleInfo al array detallesInfo
            detallesInfo.push(detalleInfo);
        }
    
        // Retornar el array de objetos detallesInfo
        return detallesInfo;
    }
    

    return (
        <div className="popup añadir-editar">
            <div className='cerrar'>
                <button onClick={mostrarPopupInfo}>x</button>
            </div>
            <h2>Detalle de la venta</h2>
            <div>
                <div className="detallesVenta usuarios">
                    <p><span>Nombre cliente: </span><br />{formDatos.clientes.nombre}</p>
                    <p><span>Apellido cliente: </span><br />{formDatos.clientes.apellido}</p>
                    <p><span>DNI/CIF cliente: </span><br />{formDatos.clientes.dniCif}</p>
                    <p><span>Correo empleado: </span><br />{formDatos.empleados.correo}</p>
                    <p><span>Importe: </span><br />{formDatos.importe}€</p>
                </div>
                <hr />
                {mostrarDetalles(formDatos).map((detalle, index) => (
                    <div key={index} className="detallesVenta productos">
                        <p><span>Nombre Comercial: </span><br />{detalle.nombreComercial}</p>
                        <p><span>Fármaco:  </span><br />{detalle.farmaco}</p>
                        <p><span>Unidades:  </span>{detalle.unidades}</p>
                        <p><span>Stock:  </span>{detalle.stock}</p>
                    </div>
                ))}
            </div>
        </div>
    );    
}