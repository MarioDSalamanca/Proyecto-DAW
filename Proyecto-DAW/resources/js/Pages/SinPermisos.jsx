import Header from "./Componentes/Header";

export default function SinPermisos({ sesionUsuario }) {
    return (
        <>
            <Header sesion={ sesionUsuario }/>
            <main>
                <div className="sin-permisos">
                    <h1>Usted no tiene permisos para acceder a esta página</h1>
                    <a href="/"><button>Volver</button></a>
                </div>
            </main>
        </>
    )
}