export default function popupEliminar({ mostrarPopupEliminar, confirmarEliminar }) {
    return (
        <div className="popup eliminar">
            <h2>¿Deseas eliminar el registro de la venta?</h2>
            <button className="confirmar" onClick={ (e) => confirmarEliminar(e, '/proveedores/eliminar') }>Confirmar</button>
            <button className="cancelar" onClick={ mostrarPopupEliminar }>Cancelar</button>
        </div>
    );
};