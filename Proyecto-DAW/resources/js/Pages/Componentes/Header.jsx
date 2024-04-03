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
                    <img src={ logo } alt="" />
                </div>
                <div className="divSesion">
                    { sesion }
                </div>
                <div className="divLogout">
                    <button onClick={ logout }>Desconectar</button>
                </div>
            </header>
            <nav>
                <div>Productos</div>
                <div>Ventas</div>
                <div>Compras</div>
                <div>Proveedores</div>
                <div>Empleados</div>
            </nav>
        </>
    )
}
