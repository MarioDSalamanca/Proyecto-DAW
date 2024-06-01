export default function popupEliminar({ mostrarPopupEliminar, confirmarEliminar, datoEliminar }) {
    return (
        <div className="popup eliminar">
            <h2>¿Deseas eliminar al cliente con el CIPA { datoEliminar }?</h2>
            <button className="confirmar" onClick={ (e) => confirmarEliminar(e, '/clientes/eliminar') }>Confirmar</button>
            <button className="cancelar" onClick={ mostrarPopupEliminar }>Cancelar</button>
        </div>
    );
};