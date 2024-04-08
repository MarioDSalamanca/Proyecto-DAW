import Header from "./Componentes/Header";

export default function Home({ sesionUsuario }) {
    return (
        <>
            <Header sesion={ sesionUsuario }/>
            <main>
                <div className="home">
                    <a className="link-home" href="/productos">Productos</a>
                    <a className="link-home" href="/ventas">Ventas</a>
                    <a className="link-home" href="/compras">Compras</a>
                    <a className="link-home" href="/proveedores">Proveedores</a>
                    <a className="link-home" href="/empleados">Empleados</a>
                    <a className="link-home" href="/tareas">Tareas</a>
                </div>
            </main>
        </>
    )
}