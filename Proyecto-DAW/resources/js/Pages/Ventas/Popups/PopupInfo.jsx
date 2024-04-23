export default function PopupInfo({ mostrarPopupInfo, formDatos }) {
    console.log(formDatos);
    const datos = ['.clientes.nombre', '.clientes.apellido', '.clientes.dniCif', '.detalle_venta[0].inventario.nombre', '.detalle_venta[0].unidades'];
    
    return (
        <div className="popup añadir-editar">
            <div className='cerrar'>
                <button onClick={mostrarPopupInfo}>x</button>
            </div>
            <div>
                {datos.map((dato, index) => (
                    <p key={index}>
                        {eval(`formDatos${dato}`)}
                    </p>
                ))}
            </div>
        </div>
    );
}
