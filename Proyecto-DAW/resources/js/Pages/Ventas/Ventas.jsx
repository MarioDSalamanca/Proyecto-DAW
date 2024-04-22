import Header from "../Componentes/Header";
import FuncionesPopUps from '../Componentes/FuncionesPopUps';
import PopupAñadir from "./Popups/PopupAñadir";
import PopupInfo from "./Popups/PopupInfo";
import PopupEliminar from "./Popups/PopupEliminar";
import Buscador from '../Componentes/Buscador';
import { useState } from "react";

export default function Ventas({ sesionUsuario, datosServidor }) {

    const [datosFiltrados, setDatosFiltrados] = useState(datosServidor);

    // Usa las funciones de popup
    const {
        popupAñadir,
        popupEliminar,
        popupInfo,
        mostrarPopupAñadir,
        mostrarPopupEliminar,
        mostrarPopupInfo,
        añadir,
        eliminar,
        info,
        handleChange,
        confirmarAñadir,
        confirmarEliminar,
        formDatos
    } = FuncionesPopUps();

    return (
        <>
            <Header sesion={ sesionUsuario }/>
            <main>
                <h1>Ventas</h1>
                { popupAñadir && <PopupAñadir mostrarPopupAñadir={ mostrarPopupAñadir } confirmarAñadir={ confirmarAñadir } formDatos={ formDatos } handleChange={ handleChange } /> }
                { popupInfo && <PopupInfo mostrarPopupInfo={ mostrarPopupInfo } /> }
                { popupEliminar && <PopupEliminar mostrarPopupEliminar={ mostrarPopupEliminar } confirmarEliminar={ confirmarEliminar } /> }
                { datosServidor &&
                <>
                    <div className="cabecera-tabla">
                        <div>
                            <button className="añadir" onClick={ añadir }>Añadir venta</button>
                        </div>
                        <div className="div-buscador">
                            <Buscador datosServidor={ datosServidor } setDatosFiltrados={ setDatosFiltrados }
                                campos={['importe', 'fecha', 'dniCif', 'correo' ]} />
                        </div>
                    </div>
                    <table className="tablaDatos">
                        <tbody>
                            <tr>
                                <th>Importe</th>
                                <th>Fecha</th>
                                <th>Cliente</th>
                                <th>Empleado</th>
                                <th>Creado</th>
                                <th></th>
                                <th></th>
                            </tr>
                            { datosFiltrados.length === 0 ? (
                                <tr>
                                    <td colSpan="9"><p className="sin-resultados">No se encontraron resultados</p></td>
                                </tr>
                            ) : ( datosFiltrados.map(venta => (
                                    <tr key={venta.idVenta}>
                                        <td>{venta.importe}</td>
                                        <td>{venta.fecha}</td>
                                        <td>{venta.cliente ? venta.cliente.dniCif : "Baja"}</td>
                                        <td>{venta.empleado ? venta.empleado.correo : "Baja"}</td>
                                        <td>{new Date(venta.created_at).toLocaleString()}</td>
                                        <td className="botones info"><button onClick={() => info(venta) }>Info</button></td>
                                        <td className="botones eliminar"><button onClick={() => eliminar(venta.idVenta) }>Eliminar</button></td>
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