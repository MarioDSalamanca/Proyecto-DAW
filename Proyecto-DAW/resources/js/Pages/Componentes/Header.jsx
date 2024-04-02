import { router } from "@inertiajs/react";
import logo from '../../Img/logo.png'

export default function Header({ sesionUsuario }) {
    
    // Función para cerrar sesión
    const logout = () => {
        router.post('/logout');
    };
    
    return (
        <>
            <header>
                <div>
                    <img src={logo} alt="" />
                </div>
                <div>
                    <button onClick={ logout }>Logout</button>
                </div>
            </header>
            <div className="divNav">
                <nav>
                    <div>Productos</div>
                    <div>Ventas</div>
                    <div>Compras</div>
                    <div>Proveedores</div>
                    <div>Empleados</div>
                </nav>
            </div>
        </>
    )
}