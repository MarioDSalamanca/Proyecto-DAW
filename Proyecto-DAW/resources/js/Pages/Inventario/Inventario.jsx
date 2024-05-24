import Header from "../Componentes/Header";
import FuncionesPopUps from '../Componentes/FuncionesPopUps';
import PopupEditar from "./Popups/PopupEditar";
import PopupEliminar from "./Popups/PopupEliminar";
import Buscador from '../Componentes/Buscador';
import { useState } from "react";

export default function inventarios({ sesionUsuario, datosServidor, mensaje }) {

    const [datosFiltrados, setDatosFiltrados] = useState(datosServidor);

    // Usa las funciones de popup
    const {
        popupEditar,
        popupEliminar,
        mostrarPopupEditar,
        mostrarPopupEliminar,
        editar,
        eliminar,
        handleChange,
        confirmarEditar,
        confirmarEliminar,
        formDatos
    } = FuncionesPopUps();

    return (
        <>
            <Header sesion={ sesionUsuario }/>
            <main>
                <h1>Inventario</h1>
                { popupEditar && <PopupEditar mostrarPopupEditar={ mostrarPopupEditar } confirmarEditar={ confirmarEditar } formDatos={ formDatos } handleChange={ handleChange } /> }
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
                        <div className="div-buscador">
                            <Buscador datosServidor={ datosServidor } setDatosFiltrados={ setDatosFiltrados }
                                campos={['nombre', 'farmaco', 'precio', 'stock' ]} />
                        </div>
                    </div>
                    <table className="tablaDatos">
                        <tbody>
                            <tr>
                                <th>Nombre</th>
                                <th>Fármaco</th>
                                <th>Precio</th>
                                <th>Prescripción</th>
                                <th>stock</th>
                                <th>Creado</th>
                                <th>Actualizado</th>
                                <th></th>
                                <th></th>
                            </tr>
                            { datosFiltrados.length === 0 ? (
                                <tr>
                                    <td colSpan="9"><p className="sin-resultados">No se encontraron resultados</p></td>
                                </tr>
                            ) : ( datosFiltrados.map(inventario => (
                                    <tr key={inventario.idInventario}  style={{ backgroundColor: inventario.stock < 10 ? 'orange' : 'inherit' }} >
                                        <td>{inventario.nombre}</td>
                                        <td>{inventario.farmaco}</td>
                                        <td>{inventario.precio}</td>
                                        <td>{inventario.prescripcion ? 'Sí' : 'No'}</td>
                                        <td>{inventario.stock}</td>
                                        <td>{new Date(inventario.created_at).toLocaleString()}</td>
                                        <td>{new Date(inventario.updated_at).toLocaleString()}</td>
                                        <td className="botones editar"><button onClick={() => editar(inventario) } >Editar</button></td>
                                        <td className="botones eliminar"><button onClick={() => eliminar(inventario.idInventario) }>Eliminar</button></td>
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