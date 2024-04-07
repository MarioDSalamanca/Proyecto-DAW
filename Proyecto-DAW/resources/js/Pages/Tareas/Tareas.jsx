import Header from "../Componentes/Header";

export default function Tareas({ sesionUsuario }) {
    return (
        <>
            <Header sesion={ sesionUsuario }/>
            <main>
                <h1>Tareas de los curritos de la farmacia de sandra</h1>
            </main>
        </>
    )
}