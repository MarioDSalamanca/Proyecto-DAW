import Header from "../Componentes/Header";
import FuncionesPopUps from '../Componentes/FuncionesPopUps';
import PopupAñadir from "./Popups/PopupAñadir";
import PopupEliminar from "./Popups/PopupEliminar";
import Buscador from '../Componentes/Buscador';
import { useState } from "react";

export default function Compras({ sesionUsuario, datosServidor, proveedores }) {

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
                <h1>Compras</h1>
                { popupAñadir && <PopupAñadir mostrarPopupAñadir={ mostrarPopupAñadir } confirmarAñadir={ confirmarAñadir } formDatos={ formDatos } handleChange={ handleChange } proveedores={proveedores} /> }
                { popupEliminar && <PopupEliminar mostrarPopupEliminar={ mostrarPopupEliminar } confirmarEliminar={ confirmarEliminar } /> }
                { datosServidor &&
                <>
                    <div className="cabecera-tabla">
                        <div>
                            <button className="añadir" onClick={ añadir }>Añadir compra</button>
                        </div>
                        <div className="div-buscador">
                            <Buscador datosServidor={ datosServidor } setDatosFiltrados={ setDatosFiltrados }
                                campos={['importe', 'unidades', 'fecha' ]} />
                        </div>
                    </div>
                    <table className="tablaDatos">
                        <tbody>
                            <tr>
                                <th>Fármaco</th>
                                <th>Proveedor</th>
                                <th>Importe</th>
                                <th>Unidades</th>
                                <th>Fecha</th>
                                <th></th>
                            </tr>
                            { datosFiltrados.length === 0 ? (
                                <tr>
                                    <td colSpan="9"><p className="sin-resultados">No se encontraron resultados</p></td>
                                </tr>
                            ) : ( datosFiltrados.map(compra => (
                                    <tr key={compra.idCompra}>
                                        <td>{compra.inventario.farmaco}</td>
                                        <td>{compra.proveedores.empresa}</td>
                                        <td>{compra.importe}</td>
                                        <td>{compra.unidades}</td>
                                        <td>{new Date(compra.fecha).toLocaleString()}</td>
                                        <td className="botones eliminar"><button onClick={() => eliminar(compra.idCompra) }>Eliminar</button></td>
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