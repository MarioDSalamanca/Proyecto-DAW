import Header from "../Componentes/Header";

export default function Ventas({ sesionUsuario }) {
    return (
        <>
            <Header sesion={ sesionUsuario }/>
            <main>
                <h1>Ventas de la farmacia</h1>
            </main>
        </>
    )
}