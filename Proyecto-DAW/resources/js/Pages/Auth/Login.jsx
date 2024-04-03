import { useState } from 'react';
import { router } from '@inertiajs/react'
import { usePage } from '@inertiajs/react'
import img from '../../Img/login.png'


export default function Login() {
    // Hook para recoger los errores del servidor
    const { errores } = usePage().props;

    // Declarar las credenciales como estados
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
            <div className='login'>
                <img src={img} alt="" />
                <form onSubmit={handleSubmit}>
                    <div>
                        <label>Correo</label><br />
                        <input type="email" name="correo" value={credenciales.correo} onChange={handleChange} required/>
                    </div>
                    <div>
                        <label>Contraseña</label><br />
                        <input type="password" name="contrasena" value={credenciales.contrasena} onChange={handleChange} required/>
                    </div>
                    <button type="submit">Iniciar Sesión</button>
                </form>
                <div>
                    {errores && (
                        <div style={{ color: 'red' }}>
                            <p>{errores.correo}</p>
                            <p>{errores.contrasena}</p>
                        </div>
                    )}
                </div>
            </div>
        </>
    );
}