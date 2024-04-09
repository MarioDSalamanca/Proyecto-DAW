import Header from "../Componentes/Header";

export default function Inventario({ sesionUsuario }) {
    return (
        <>
            <Header sesion={ sesionUsuario }/>
            <main>
                <h1>Inventario de la farmacia de sandra</h1>
            </main>
        </>
    )
}