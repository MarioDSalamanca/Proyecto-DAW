export default function popupInfo({ mostrarPopupInfo, formDatos }) {
    
    datos = ['']
    return (
        <div className="popup añadir-editar">
            <div className='cerrar'>
                <button onClick={ mostrarPopupInfo }>x</button>
            </div>
            <div>
                {formDatos.clientes.nombre}
                {formDatos.clientes.apellido}
                {formDatos.clientes.dniCif}
                {formDatos.clientes.apellido}
            </div>
        </div>
    );
};