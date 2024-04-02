import Header from "../Componentes/Header";

export default function Empleados({ usuarios, sesionUsuario }) {

    console.log('Variable de sesión:', sesionUsuario);

    return (
      <div>
            <Header />
            <div>
                <ul>
                    { usuarios.map(usuario => (
                        <li key={usuario.IdUsuario}>
                            <p>Nombre: {usuario.Nombre}</p>
                            <p>Apellido: {usuario.Apellido}</p>
                            <p>Correo: {usuario.Correo}</p>
                            <p>Rol: {usuario.Rol}</p>
                        </li>
                    ))}
                </ul>
            </div>
      </div>
    ); 
}