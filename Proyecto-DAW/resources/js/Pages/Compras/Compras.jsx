import Header from "../Componentes/Header";
import FuncionesPopUps from '../Componentes/FuncionesPopUps';
import PopupAñadir from "./Popups/PopupAñadir";
import PopupEditar from "./Popups/PopupEditar";
import PopupEliminar from "./Popups/PopupEliminar";
import Buscador from '../Componentes/Buscador';
import { useState } from "react";

export default function Compras({ sesionUsuario, datosServidor }) {

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
        formDatos
    } = FuncionesPopUps();

    return (
        <>
            <Header sesion={ sesionUsuario }/>
            <main>
                <h1>Compras</h1>
                { popupAñadir && <PopupAñadir mostrarPopupAñadir={ mostrarPopupAñadir } confirmarAñadir={ confirmarAñadir } formDatos={ formDatos } handleChange={ handleChange } /> }
                { popupEditar && <PopupEditar mostrarPopupEditar={ mostrarPopupEditar } confirmarEditar={ confirmarEditar } formDatos={ formDatos } handleChange={ handleChange } /> }
                { popupEliminar && <PopupEliminar mostrarPopupEliminar={ mostrarPopupEliminar } confirmarEliminar={ confirmarEliminar } /> }
                { datosServidor &&
                <>
                    <div className="cabecera-tabla">
                        <div>
                            <button className="añadirEmpleado" onClick={ añadir }>Añadir compra</button>
                        </div>
                        <div className="div-buscador">
                            <Buscador datosServidor={ datosServidor } setDatosFiltrados={ setDatosFiltrados }
                                campos={['importe', 'unidades', 'fecha' ]} />
                        </div>
                    </div>
                    <table className="tablaDatos">
                        <tbody>
                            <tr>
                                <th>Importe</th>
                                <th>Unidades</th>
                                <th>Fecha</th>
                                <th>Creado</th>
                                <th>Actualizado</th>
                                <th></th>
                                <th></th>
                            </tr>
                            { datosFiltrados.length === 0 ? (
                                <tr>
                                    <td colSpan="9"><p className="sin-resultados">No se encontraron resultados</p></td>
                                </tr>
                            ) : ( datosFiltrados.map(compra => (
                                    <tr key={compra.idCompra}>
                                        <td>{compra.importe}</td>
                                        <td>{compra.unidades}</td>
                                        <td>{new Date(compra.fecha).toLocaleString()}</td>
                                        <td>{new Date(compra.created_at).toLocaleString()}</td>
                                        <td>{new Date(compra.updated_at).toLocaleString()}</td>
                                        <td className="botonesEmpleados editar"><button onClick={() => editar(compra) } >Editar</button></td>
                                        <td className="botonesEmpleados eliminar"><button onClick={() => eliminar(compra.idCompra) }>Eliminar</button></td>
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