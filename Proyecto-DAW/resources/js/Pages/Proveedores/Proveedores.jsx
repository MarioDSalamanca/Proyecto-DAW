import Header from "../Componentes/Header";

export default function Proveedores({ sesionUsuario }) {
    return (
        <>
            <Header sesion={ sesionUsuario }/>
            <main>
                <h1>Proveedores de la farmacia de sandra</h1>
            </main>
        </>
    )
}