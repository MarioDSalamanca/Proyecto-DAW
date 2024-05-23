import Header from "../Componentes/Header";
import FuncionesPopUps from '../Componentes/FuncionesPopUps';
import PopupAñadir from "./Popups/PopupAñadir";
import PopupEditar from "./Popups/PopupEditar";
import PopupEliminar from "./Popups/PopupEliminar";
import Buscador from '../Componentes/Buscador';
import { useState } from "react";

export default function Clientes({ datosServidor, sesionUsuario, mensaje }) {

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
                <h1>Clientes</h1>
                { popupAñadir && <PopupAñadir mostrarPopupAñadir={ mostrarPopupAñadir } confirmarAñadir={ confirmarAñadir } formDatos={ formDatos } handleChange={ handleChange } /> }
                { popupEditar && <PopupEditar mostrarPopupEditar={ mostrarPopupEditar } confirmarEditar={ confirmarEditar } formDatos={ formDatos } handleChange={ handleChange } /> }
                { popupEliminar && <PopupEliminar mostrarPopupEliminar={ mostrarPopupEliminar } confirmarEliminar={ confirmarEliminar } datoEliminar={ datoEliminar } /> }
                {mensaje && (
                    <div>
                        {mensaje.exito && <p className="mensaje exito">{mensaje.exito} &#x2714;</p>}
                        {mensaje.error && <p className="mensaje error">&#x274C; {mensaje.error}</p>}
                    </div>
                )}
                <>
                    <div className="cabecera-tabla">
                        <div>
                        <button className="añadir" onClick={ añadir }>Añadir cliente</button>
                        </div>
                        <div className="div-buscador">
                            <Buscador datosServidor={ datosServidor } setDatosFiltrados={ setDatosFiltrados } 
                                campos={[ 'nombre', 'apellido', 'cipa' ]} />
                        </div>
                    </div>
                    <table className="tablaDatos">
                        <tbody>
                            <tr>
                                <th>Cipa</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Creado</th>
                                <th>Actualizado</th>
                                <th></th>
                                <th></th>
                            </tr>
                            { datosFiltrados.length === 0 ? (
                                    <tr>
                                        <td colSpan="9"><p className="sin-resultados">No se encontraron resultados</p></td>
                                    </tr>
                                ) : ( datosFiltrados.map(cliente => (
                                <tr key={cliente.idCliente}>
                                    <td>{cliente.cipa}</td>
                                    <td>{cliente.nombre}</td>
                                    <td>{cliente.apellido}</td>
                                    <td>{new Date(cliente.created_at).toLocaleString()}</td>
                                    <td>{new Date(cliente.updated_at).toLocaleString()}</td>
                                    <td className="botones editar"><button onClick={() => editar(cliente) } >Editar</button></td>
                                    <td className="botones eliminar"><button onClick={() => eliminar(cliente.cipa) }>Eliminar</button></td>
                                </tr>
                                ))
                            )}
                        </tbody>
                    </table>
                </>
            </main>
        </>
    ); 
}