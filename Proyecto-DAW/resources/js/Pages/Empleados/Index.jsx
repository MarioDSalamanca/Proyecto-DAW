import { usePage } from '@inertiajs/react';

export default function Index() {
  // Obtener los datos de la página actual
  const { usuarios } = usePage().props;

  return (
      <div>
          <h2>Hola mundo!</h2>
          <ul>
              {usuarios.map(usuario => (
                  <li key={usuario.IdUsuario}>
                      <p>Id: {usuario.IdUsuario}</p>
                      <p>Nombre: {usuario.Nombre}</p>
                      <p>Apellido: {usuario.Apellido}</p>
                      <p>Correo: {usuario.Correo}</p>
                      <p>Contraseña: {usuario.Contrasena}</p>
                      <p>Rol: {usuario.Rol}</p>
                  </li>
              ))}
          </ul>
      </div>
    ); 
}