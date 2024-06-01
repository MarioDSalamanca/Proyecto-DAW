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
                <ul>
                    <a href="/inventario"><li>Inventario</li></a>
                    <a href="/ventas"><li>Ventas</li></a>
                    <a href="/compras"><li>Compras</li></a>
                    <a href="/proveedores"><li>Proveedores</li></a>
                    <a href="/clientes"><li>Clientes</li></a>
                    <a href="/empleados"><li>Empleados</li></a>
                    <a href="/tareas"><li>Tareas</li></a>
                </ul>
            </nav>
        </>
    )
}
