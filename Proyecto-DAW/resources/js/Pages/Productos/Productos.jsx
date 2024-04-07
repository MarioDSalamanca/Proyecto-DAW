import Header from "../Componentes/Header";

export default function Productos({ sesionUsuario }) {
    return (
        <>
            <Header sesion={ sesionUsuario }/>
            <main>
                <h1>Productos de la farmacia de sandra</h1>
            </main>
        </>
    )
}