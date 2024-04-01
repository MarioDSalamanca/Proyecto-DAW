import { router } from "@inertiajs/react";

export default function Index({ sesionUsuario }) {

    console.log('Variable de sesión:', sesionUsuario);

    const logout = () => {
        router.post('/logout');
      };

    return (
      <div>
            <button onClick={ logout }>Destruir Variable de Sesión</button>
            <h2>Hola mundo!</h2>
            <ul>
                {/*usuarios.map(usuario => (
                    <li key={usuario.IdUsuario}>
                        <p>Id: {usuario.IdUsuario}</p>
                        <p>Nombre: {usuario.Nombre}</p>
                        <p>Apellido: {usuario.Apellido}</p>
                        <p>Correo: {usuario.Correo}</p>
                        <p>Contraseña: {usuario.Contrasena}</p>
                        <p>Rol: {usuario.Rol}</p>
                    </li>
                ))*/}
            </ul>
      </div>
    ); 
}