import Header from "./Componentes/Header";

export default function Home({ sesionUsuario }) {
    return (
        <>
            <Header sesion={ sesionUsuario }/>
            <main>
                <a href="/productos">Productos</a>
                <a href="/ventas">Ventas</a>
                <a href="/compras">Compras</a>
                <a href="/proveedores">Proveedores</a>
                <a href="/empleados">Empleados</a>
                <a href="/tareas">Tareas</a>
            </main>
        </>
    )
}