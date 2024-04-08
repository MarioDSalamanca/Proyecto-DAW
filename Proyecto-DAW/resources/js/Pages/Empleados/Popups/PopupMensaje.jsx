import { useState } from "react";

export default function PopupMensaje({ ocultarPopupMensaje, mensaje, mensajeVisible }) {

    return (
        <div className={`popup mensaje ${mensajeVisible ? 'visible' : 'oculto'}`}>
            <h1>{ mensaje }</h1>
            <button onClick={ ocultarPopupMensaje }>Confirmar</button>
        </div>
    );
};
