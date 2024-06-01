import Header from "../Componentes/Header";
import FuncionesPopUps from '../Componentes/FuncionesPopUps';
import PopupAñadir from "./Popups/PopupAñadir";
import PopupEliminar from "./Popups/PopupEliminar";
import Buscador from '../Componentes/Buscador';
import { useState } from "react";

export default function Proveedores({ sesionUsuario, datosServidor, mensaje }) {

    const [datosFiltrados, setDatosFiltrados] = useState(datosServidor);

    // Usa las funciones de popup
    const {
        popupAñadir,
        popupEliminar,
        mostrarPopupAñadir,
        mostrarPopupEliminar,
        añadir,
        eliminar,
        handleChange,
        confirmarAñadir,
        confirmarEliminar,
        formDatos
    } = FuncionesPopUps();

    return (
        <>
            <Header sesion={ sesionUsuario }/>
            <main>
                <h1>Proveedores</h1>
                { popupAñadir && <PopupAñadir mostrarPopupAñadir={ mostrarPopupAñadir } confirmarAñadir={ confirmarAñadir } formDatos={ formDatos } handleChange={ handleChange } /> }
                { popupEliminar && <PopupEliminar mostrarPopupEliminar={ mostrarPopupEliminar } confirmarEliminar={ confirmarEliminar } /> }
                {mensaje && (
                    <div>
                        {mensaje.exito && <p className="mensaje exito">{mensaje.exito} &#x2714;</p>}
                        {mensaje.error && <p className="mensaje error">&#x274C; {mensaje.error}</p>}
                    </div>
                )}
                { datosServidor &&
                <>
                    <div className="cabecera-tabla">
                        <div>
                            <button className="añadir" onClick={ añadir }>Añadir proveedor</button>
                        </div>
                        <div className="div-buscador">
                            <Buscador datosServidor={ datosServidor } setDatosFiltrados={ setDatosFiltrados }
                                campos={['empresa']} />
                        </div>
                    </div>
                    <table className="tablaDatos">
                        <tbody>
                            <tr>
                                <th>Empresa</th>
                                <th>Creado</th>
                                <th></th>
                            </tr>
                            { datosFiltrados.length === 0 ? (
                                <tr>
                                    <td colSpan="9"><p className="sin-resultados">No se encontraron resultados</p></td>
                                </tr>
                            ) : ( datosFiltrados.map(proveedor => (
                                    <tr key={proveedor.idProveedor}>
                                        <td>{proveedor.empresa}</td>
                                        <td>{new Date(proveedor.created_at).toLocaleString()}</td>
                                        <td className="botones eliminar"><button onClick={() => eliminar(proveedor.empresa) }>Eliminar</button></td>
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