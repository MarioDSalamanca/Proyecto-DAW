import Header from "../Componentes/Header";
import FuncionesPopUps from '../Componentes/FuncionesPopUps';
import PopupAñadir from "./Popups/PopupAñadir";
import PopupEditar from "./Popups/PopupEditar";
import PopupEliminar from "./Popups/PopupEliminar";
import Buscador from '../Componentes/Buscador';
import { useState } from "react";

export default function Tareas({ sesionUsuario, datosServidor, empleados }) {

    const [datosFiltrados, setDatosFiltrados] = useState(datosServidor);

    // Usa las funciones de popup
    const {
        popupAñadir,
        popupEditar,
        popupEliminar,
        mostrarPopupAñadir,
        mostrarPopupEditar,
        mostrarPopupEliminar,
        añadir,
        editar,
        eliminar,
        handleChange,
        confirmarAñadir,
        confirmarEditar,
        confirmarEliminar,
        datoEliminar,
        formDatos
    } = FuncionesPopUps();

    return (
        <>
            <Header sesion={ sesionUsuario }/>
            <main>
                <h1>Tareas</h1>
                { popupAñadir && <PopupAñadir mostrarPopupAñadir={ mostrarPopupAñadir } confirmarAñadir={ confirmarAñadir } formDatos={ formDatos } handleChange={ handleChange } empleados={ empleados } /> }
                { popupEditar && <PopupEditar mostrarPopupEditar={ mostrarPopupEditar } confirmarEditar={ confirmarEditar } formDatos={ formDatos } handleChange={ handleChange } /> }
                { popupEliminar && <PopupEliminar mostrarPopupEliminar={ mostrarPopupEliminar } confirmarEliminar={ confirmarEliminar } /> }
                { datosServidor &&
                <>
                    <div className="cabecera-tabla">
                        <div>
                            <button className="añadir" onClick={ añadir }>Añadir tarea</button>
                        </div>
                        <div className="div-buscador">
                            <Buscador datosServidor={ datosServidor } setDatosFiltrados={ setDatosFiltrados }
                                campos={['nombre', 'empleados.correo', 'fecha', 'descripcion', 'estado' ]} />
                        </div>
                    </div>
                    <table className="tablaDatos">
                        <tbody>
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
                                        <td>{tarea.empleados.correo}</td>
                                        <td>{new Date(tarea.fecha).toLocaleString()}</td>
                                        <td><textarea value={tarea.descripcion} cols="30" rows="3" readOnly /></td>
                                        <td>{tarea.estado}</td>
                                        <td>{new Date(tarea.created_at).toLocaleString()}</td>
                                        <td>{new Date(tarea.updated_at).toLocaleString()}</td>
                                        <td className="botones editar"><button onClick={() => editar(tarea) } >Editar</button></td>
                                        <td className="botones eliminar"><button onClick={() => eliminar(tarea.idTarea) }>Eliminar</button></td>
                                    </tr>
                                ))
                            )}
                        </tbody>
                    </table>
                </>
                }
            </main>
        </>
    )
}