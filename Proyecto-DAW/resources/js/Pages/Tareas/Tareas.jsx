import { useState } from "react";
import Header from "../Componentes/Header";
import Buscador from '../Componentes/Buscador';

export default function Tareas({ sesionUsuario, datosServidor }) {

    const [datosFiltrados, setDatosFiltrados] = useState(datosServidor);

    return (
        <>
            <Header sesion={ sesionUsuario }/>
            <main>
                { datosServidor &&
                    <table className="tablaDatos">
                            <caption>Tareas</caption>
                            <tbody>
                                <tr>
                                    <td style={{ border: 0 }} colSpan="2">
                                        <button className="añadirEmpleado">Añadir empleado</button>
                                    </td>
                                    <td style={{ border: 0 }} colSpan="4">
                                        <Buscador datosServidor={ datosServidor } setDatosFiltrados={ setDatosFiltrados }
                                        campos={['nombre', 'empleados.nombre', 'fecha', 'descripcion', 'estado' ]} />
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
                                { datosFiltrados.length === 0 ? (
                                    <tr>
                                        <td colSpan="9"><p className="sin-resultados">No se encontraron resultados</p></td>
                                    </tr>
                                ) : ( datosFiltrados.map(tarea => (
                                        <tr key={tarea.idTarea}>
                                            <td>{tarea.nombre}</td>
                                            <td>{tarea.empleados.nombre}</td>
                                            <td>{new Date(tarea.fecha).toLocaleString()}</td>
                                            <td><textarea value={tarea.descripcion} cols="30" rows="3" readOnly /></td>
                                            <td>{tarea.estado}</td>
                                            <td>{new Date(tarea.created_at).toLocaleString()}</td>
                                            <td>{new Date(tarea.updated_at).toLocaleString()}</td>
                                            <td className="botonesEmpleados editar"><button >Editar</button></td>
                                            <td className="botonesEmpleados eliminar"><button >Eliminar</button></td>
                                        </tr>
                                    ))
                                )}

                            </tbody>
                        </table>
                }
            </main>
        </>
    )
}