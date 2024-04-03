import Header from "../Componentes/Header";

export default function Empleados({ usuarios, sesionUsuario }) {

    console.log('Variable de sesión:', sesionUsuario);

    return (
        <body>
            <Header sesion={ sesionUsuario }/>
            <main>
                { usuarios &&  
                <table className="tablaEmpleados">
                    <caption>Empleados</caption>
                    <tr>
                        <button className="añadirEmpleado">Añadir usuario</button>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th></th>
                        <th></th>
                    </tr>
                    { usuarios.map(usuario => (
                        <tr key={usuario.IdUsuario}>
                            <td>{usuario.Nombre}</td>
                            <td>{usuario.Apellido}</td>
                            <td>{usuario.Correo}</td>
                            <td>{usuario.Rol}</td>
                            <td className="botonesEmpleados editar"><button>Editar</button></td>
                            <td className="botonesEmpleados eliminar"><button>Eliminar</button></td>
                        </tr>
                    ))}
                </table>
                }
            </main>
        </body>
    ); 
}