export default function popupEliminar({ mostrarPopupEliminar, confirmarEliminar, correoEliminar }) {
    return (
        <div className="popup eliminar">
            <h2>Deseas eliminar al usuario { correoEliminar }?</h2>
            <button className="confirmar" onClick={ confirmarEliminar }>Confirmar</button>
            <button className="cancelar" onClick={ mostrarPopupEliminar }>Cancelar</button>
        </div>
    );
};