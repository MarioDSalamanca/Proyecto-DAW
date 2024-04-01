import { useState } from 'react';
import { router } from '@inertiajs/react'
import { usePage } from '@inertiajs/react';


export default function Login() {
    const { errores } = usePage().props;

    const [credenciales, setCredenciales] = useState({
        correo: '',
        contrasena: '',
    });

    function handleChange(e) { 
        const { name, value } = e.target;
        setCredenciales(prev => ({
            ...prev,
            [name]: value,
        }));
    };

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
                        <input type="email" name="correo" value={credenciales.correo} onChange={handleChange} />
                    </div>
                    <div>
                        <label>Contraseña</label>
                        <input type="password" name="contrasena" value={credenciales.contrasena} onChange={handleChange} />
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