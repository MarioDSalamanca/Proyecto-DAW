import Header from "./Componentes/Header";

export default function Home({ sesionUsuario }) {
    return (
        <>
            <Header sesion={ sesionUsuario }/>
            <main className="main-home">
                <div className="home">
                    <a className="link-home inventario" href="/inventario"><span>Inventario</span></a>
                    <a className="link-home ventas" href="/ventas"><span>Ventas</span></a>
                    <a className="link-home compras" href="/compras"><span>Compras</span></a>
                    <a className="link-home proveedores" href="/proveedores"><span>Proveedores</span></a>
                    <a className="link-home empleados" href="/empleados"><span>Empleados</span></a>
                    <a className="link-home tareas" href="/tareas"><span>Tareas</span></a>
                </div>
            </main>
        </>
    )
}