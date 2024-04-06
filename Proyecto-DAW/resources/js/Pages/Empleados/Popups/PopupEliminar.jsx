export default function popupEliminar({ mostrarPopupEliminar, confirmarEliminar, correoEliminar }) {
    return (
        <div className="popup eliminar">
            <h2>Deseas eliminar al usuario { correoEliminar }?</h2>
            <button onClick={ confirmarEliminar }>Confirmar</button>
            <button onClick={ mostrarPopupEliminar }>Cancelar</button>
        </div>
    );
};