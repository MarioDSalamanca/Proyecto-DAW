export default function popupEliminar({ mostrarPopupEliminar, confirmarEliminar, datoEliminar }) {
    return (
        <div className="popup eliminar">
            <h2>¿Deseas eliminar al usuario { datoEliminar }?</h2>
            <button className="confirmar" onClick={ (e) => confirmarEliminar(e, '/empleados/eliminar') }>Confirmar</button>
            <button className="cancelar" onClick={ mostrarPopupEliminar }>Cancelar</button>
        </div>
    );
};