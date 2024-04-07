import Header from "../Componentes/Header";

export default function Compras({ sesionUsuario }) {
    return (
        <>
            <Header sesion={ sesionUsuario }/>
            <main>
                <h1>Compras de la farmacia de sandra</h1>
            </main>
        </>
    )
}