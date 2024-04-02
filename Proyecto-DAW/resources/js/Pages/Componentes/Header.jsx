export default function Header({ mostrar }) {
    
    const logout = () => {
        router.post('/logout');
    };

    // Verificar si se debe mostrar el encabezado
    if (!mostrar) {
        return null; // No mostrar nada si mostrar es false
    }
    
    return (
        <header>
            <nav>
                <div><a href="">Productos</a></div>
                <div><a href="">Empleados</a></div>
                <div>
                    <button onClick={ logout }>Logout</button>
                </div>
            </nav>
        </header>
    )
}