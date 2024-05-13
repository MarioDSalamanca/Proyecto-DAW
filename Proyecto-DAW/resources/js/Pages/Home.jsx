import React, { useState, useEffect } from 'react';
import { Chart } from 'react-google-charts';
import Header from "./Componentes/Header";

export default function Home({ sesionUsuario, ventas, compras, tareas }) { 

    const prepareChartData = () => {
        const chartData = [['Mes', 'Ventas', 'Compras']];
        
        // Iterar sobre cada objeto de ventas y compras para construir los datos del gráfico
        ventas.forEach(venta => {
            const compraCorrespondiente = compras.find(compra => compra.mes === venta.mes);
            const compraImporte = compraCorrespondiente ? parseFloat(compraCorrespondiente.importe) : 0;
            chartData.push([venta.mes, parseFloat(venta.importe), compraImporte]);
        });
    
        return chartData;
    };
    

    return (
        <>
            <Header sesion={sesionUsuario} />
            <main>
                <div className='graficoYtareas'>
                    <h1></h1>
                    <Chart
                        chartType="AreaChart"
                        loader={<div>Cargando...</div>}
                        data={prepareChartData()}
                        options={{
                            chartArea: { width: '85%', height: '70%' },
                            legend: { position: 'top' },
                            animation: {
                                startup: true,
                                easing: 'linear',
                                duration: 1200,
                            },
                        }}
                    />
                    <div>
                        { tareas.length === 0 ? (
                                <p className="sin-resultados">No tienes tareas próximas</p>
                            ) : ( 
                            tareas.map(tarea => (
                                <table>
                                    <tr key={tarea.idTarea}>
                                        <td style={{ borderRight: '1px solid gray' }}>{tarea.nombre}</td>
                                        <td style={{ borderRight: '1px solid gray' }}>{new Date(tarea.fecha).toLocaleString()}</td>
                                        <td>{tarea.estado}</td>
                                    </tr>
                                    <tr>
                                        <td colSpan={3}><p>{tarea.descripcion}</p></td>
                                    </tr>
                                </table>
                            ))
                        )}
                    </div>
                </div>
                <div className="home">
                    <a className="link-home inventario" href="/inventario"><span>Inventario</span></a>
                    <a className="link-home ventas" href="/ventas"><span>Ventas</span></a>
                    <a className="link-home compras" href="/compras"><span>Compras</span></a>
                    <a className="link-home proveedores" href="/proveedores"><span>Proveedores</span></a>
                    <a className="link-home empleados" href="/empleados"><span>Empleados</span></a>
                    <a className="link-home tareas" href="/tareas"><span>Tareas</span></a>
                </div>
            </main>
        </>
    );
}
