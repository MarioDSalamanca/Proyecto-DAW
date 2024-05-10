import Header from "./Componentes/Header";

export default function Exito({ sesionUsuario }) {

    function volver() {
        window.history.back();
    }

    return (
        <>
            <Header sesion={ sesionUsuario }/>
            <main>
                <div className="sin-permisos">
                    <h1>El trámite se ha completado con éxito!</h1>
                    <a onClick={ volver }><button>Volver</button></a>
                </div>
            </main>
        </>
    )
}