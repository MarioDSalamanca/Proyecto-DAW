import React, { useState, useEffect } from 'react';
import { Chart } from 'react-google-charts';
import Header from "./Componentes/Header";

export default function Home({ sesionUsuario, ventas, compras, tareas }) { 

    const FuncionDatosGrafico = () => {
        const campos = [['Mes', 'Ventas', 'Compras']];
        
        // Iterar sobre cada objeto de ventas y compras para construir los datos del gráfico
        if (ventas && compras) {
            ventas.forEach(venta => {
                const compraCorrespondiente = compras.find(compra => compra.año === venta.año && compra.mes === venta.mes);
                const compraImporte = compraCorrespondiente ? parseFloat(compraCorrespondiente.importe) : 0;
                const mesAño = `${venta.mes}/${venta.año}`;
                campos.push([mesAño, parseFloat(venta.importe), compraImporte]);
            });
        }
        return campos;
    };    

    return (
        <>
            <Header sesion={sesionUsuario} />
            <main>
                <div className='graficoYtareas'>
                    <h2>Ventas vs Compras (últimos 6 meses)</h2>
                    <h2>Tareas</h2>
                    <Chart
                        chartType="AreaChart"
                        loader={<div>Cargando...</div>}
                        data={FuncionDatosGrafico()}
                        options={{
                            chartArea: { width: '85%', height: '70%' },
                            legend: { position: 'top' },
                            animation: {
                                startup: true,
                                easing: 'linear',
                                duration: 1200,
                            },
                            titleTextStyle: { marginBottom: 20 },
                        }}
                    />
                    <div className='tareas-home'>
                        { tareas.length === 0 ? (
                            <p className="sin-resultados">No tienes tareas pendientes</p>
                        ) : (
                            <table>
                                <tbody>
                                    { tareas.map(tarea => (
                                        <tr key={tarea.idTarea}>
                                            <td className='fecha'>{new Date(tarea.fecha).toLocaleString()}</td>
                                            <td className='descripcion'>{tarea.descripcion}</td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        )}
                    </div>

                </div>
                <div className="home">
                    <a className="link-home inventario" href="/inventario"><span>Inventario</span></a>
                    <a className="link-home ventas" href="/ventas"><span>Ventas</span></a>
                    <a className="link-home compras" href="/compras"><span>Compras</span></a>
                    <a className="link-home proveedores" href="/proveedores"><span>Proveedores</span></a>
                    <a className="link-home clientes" href="/clientes"><span>Clientes</span></a>
                    <a className="link-home empleados" href="/empleados"><span>Empleados</span></a>
                    <a className="link-home tareas" href="/tareas"><span>Tareas</span></a>
                </div>
            </main>
        </>
    );
}
