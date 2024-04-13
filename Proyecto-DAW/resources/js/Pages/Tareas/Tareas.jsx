import Header from "../Componentes/Header";

export default function Tareas({ sesionUsuario, tareas}) {
    return (
        <>
            <Header sesion={ sesionUsuario }/>
            <main>
                { tareas &&
                    <table className="tablaDatos">
                            <caption>Tareas</caption>
                            <tbody>
                                <tr>
                                    <td style={{ border: 0 }} colSpan={2}>
                                        <button className="añadirEmpleado">Añadir empleado</button>
                                    </td>
                                    <td style={{ border: 0 }} colSpan={5}>
                                        <button className="añadirEmpleado">Añadir empleado</button>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Empleado</th>
                                    <th>Fecha</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                    <th>Creado</th>
                                    <th>Actualizado</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                { tareas.map(tarea => (
                                    <tr key={tarea.idTarea}>
                                        <td>{tarea.nombre}</td>
                                        <td>{tarea.empleados.nombre}</td>
                                        <td>{new Date(tarea.fecha).toLocaleString()}</td>
                                        <td><textarea value={tarea.descripcion} cols="30" rows="3"></textarea></td>
                                        <td>{tarea.estado}</td>
                                        <td>{new Date(tarea.created_at).toLocaleString()}</td>
                                        <td>{new Date(tarea.updated_at).toLocaleString()}</td>
                                        <td className="botonesEmpleados editar"><button >Editar</button></td>
                                        <td className="botonesEmpleados eliminar"><button >Eliminar</button></td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                }
            </main>
        </>
    )
}