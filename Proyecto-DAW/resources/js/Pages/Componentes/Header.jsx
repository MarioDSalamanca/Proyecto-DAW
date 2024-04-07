import { router } from "@inertiajs/react";
import logo from '../../Img/logo.png';

export default function Header({ sesion }) {
    
    // Función para cerrar sesión
    const logout = () => {
        router.post('/logout');
    };
    
    return (
        <>
            <header>
                <div className="divLogo">
                    <a href="/"><img src={ logo } alt="" /></a>
                </div>
                <div className="divSesion">
                    { sesion }
                </div>
                <div className="divLogout">
                    <button onClick={ logout }>Desconectar</button>
                </div>
            </header>
            <nav>
                <div><a href="/productos">Productos</a></div>
                <div><a href="/ventas">Ventas</a></div>
                <div><a href="/compras">Compras</a></div>
                <div><a href="/proveedores">Proveedores</a></div>
                <div><a href="/empleados">Empleados</a></div>
                <div><a href="/tareas">Tareas</a></div>
            </nav>
        </>
    )
}
