import { useState } from 'react';
import { router } from '@inertiajs/react'
import { usePage } from '@inertiajs/react';


export default function Login() {
    const { errores } = usePage().props;

    const [credenciales, setCredenciales] = useState({
        correo: '',
        contrasena: '',
    });

    // Función para que cada vez que cambie el valor del input guardo los datos nuevos
    function handleChange(e) { 
        const { name, value } = e.target;
        setCredenciales(prev => ({
            ...prev,
            [name]: value,
        }));
    };

    // Mandar la solicitud con los datos
    function handleSubmit(e) {
        e.preventDefault();
        router.post('/login', credenciales)
    }

    return (
        <>
            <div>
                <h2>Login</h2>
                <form onSubmit={handleSubmit}>
                    <div>
                        <label>Correo</label>
                        <input type="email" name="correo" value={credenciales.correo} onChange={handleChange} required/>
                    </div>
                    <div>
                        <label>Contraseña</label>
                        <input type="password" name="contrasena" value={credenciales.contrasena} onChange={handleChange} required/>
                    </div>
                    <button type="submit">Iniciar Sesión</button>
                </form>
            </div>
            <div>
                {errores && (
                    <div>
                        <p>{errores.correo}</p>
                        <p>{errores.contrasena}</p>
                    </div>
                )}
        </div>
        </>
    );
}