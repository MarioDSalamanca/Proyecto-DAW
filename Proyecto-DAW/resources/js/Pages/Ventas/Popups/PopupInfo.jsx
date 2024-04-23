export default function PopupInfo({ mostrarPopupInfo, formDatos }) {
    console.log(formDatos);
    const datos = ['.clientes.nombre', '.clientes.apellido', '.clientes.dniCif', '.detalle_ventas.inventario.nombre', '.detalle_venta.unidades'];

    return (
        <div className="popup añadir-editar">
            <div className='cerrar'>
                <button onClick={mostrarPopupInfo}>x</button>
            </div>
            <div>
            {datos.map((dato, index) => (
                <p key={index}>
                    {formDatos && formDatos[dato]}
                </p>
            ))}
            </div>
        </div>
    );
}