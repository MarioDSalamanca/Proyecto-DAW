import Header from "./Componentes/Header";

export default function Error({ sesionUsuario }) {

    function volver() {
        window.history.back();
    }

    return (
        <>
            <Header sesion={ sesionUsuario }/>
            <main>
                <div className="sin-permisos">
                    <h1>Se produjo un error al procesar la solicitud. 
                        Por favor, inténtalo de nuevo más tarde o contacta con el soporte técnico.</h1>
                    <a onClick={ volver }><button>Volver</button></a>
                </div>
            </main>
        </>
    )
}