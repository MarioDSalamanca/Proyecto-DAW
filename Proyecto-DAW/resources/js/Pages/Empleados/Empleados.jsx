import Header from "../Componentes/Header";
import FuncionesPopUps from '../Componentes/FuncionesPopUps';
import PopupAñadir from "./Popups/PopupAñadir";
import PopupEditar from "./Popups/PopupEditar";
import PopupEliminar from "./Popups/PopupEliminar";
import Buscador from '../Componentes/Buscador';
import { useState } from "react";

export default function Empleados({ datosServidor, sesionUsuario }) {

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
                <h1>Empleados</h1>
                { popupAñadir && <PopupAñadir mostrarPopupAñadir={ mostrarPopupAñadir } confirmarAñadir={ confirmarAñadir } formDatos={ formDatos } handleChange={ handleChange } /> }
                { popupEditar && <PopupEditar mostrarPopupEditar={ mostrarPopupEditar } confirmarEditar={ confirmarEditar } formDatos={ formDatos } handleChange={ handleChange } /> }
                { popupEliminar && <PopupEliminar mostrarPopupEliminar={ mostrarPopupEliminar } confirmarEliminar={ confirmarEliminar } datoEliminar={ datoEliminar } /> }
                { datosServidor &&
                <>
                    <div className="cabecera-tabla">
                        <div>
                        <button className="añadir" onClick={ añadir }>Añadir empleado</button>
                        </div>
                        <div className="div-buscador">
                            <Buscador datosServidor={ datosServidor } setDatosFiltrados={ setDatosFiltrados } 
                                campos={[ 'nombre', 'apellido', 'correo', 'rol' ]} />
                        </div>
                    </div>
                    <table className="tablaDatos">
                        <tbody>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th>Creado</th>
                                <th>Actualizado</th>
                                <th></th>
                                <th></th>
                            </tr>
                            { datosFiltrados.length === 0 ? (
                                    <tr>
                                        <td colSpan="9"><p className="sin-resultados">No se encontraron resultados</p></td>
                                    </tr>
                                ) : ( datosFiltrados.map(empleado => (
                                <tr key={empleado.idEmpleado}>
                                    <td>{empleado.nombre}</td>
                                    <td>{empleado.apellido}</td>
                                    <td>{empleado.correo}</td>
                                    <td>{empleado.rol}</td>
                                    <td>{new Date(empleado.created_at).toLocaleString()}</td>
                                    <td>{new Date(empleado.updated_at).toLocaleString()}</td>
                                    <td className="botones editar"><button onClick={() => editar(empleado) } >Editar</button></td>
                                    <td className="botones eliminar"><button onClick={() => eliminar(empleado.correo) }>Eliminar</button></td>
                                </tr>
                                ))
                            )}
                        </tbody>
                    </table>
                </>
                }
            </main>
        </>
    ); 
}