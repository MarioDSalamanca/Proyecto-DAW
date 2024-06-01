import Header from "./Componentes/Header";

export default function SinPermisos({ sesionUsuario }) {
    
    function volver() {
        window.history.back();
    }

    return (
        <>
            <Header sesion={ sesionUsuario }/>
            <main>
                <div className="sin-permisos">
                    <h1>Usted no tiene permisos para acceder a esta página</h1>
                    <button onClick={ () => volver() }>Volver</button>
                </div>
            </main>
        </>
    )
}