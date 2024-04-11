// Buscador.jsx
import React, { useState } from 'react';

export default function Buscador({ empleados, setEmpleadosFiltrados }) {
    const [buscar, setBuscar] = useState('');

    function handleChangeBuscador(e) {
        setBuscar(e.target.value.trim());
    }

    const empleadosFiltrados = buscar ? empleados.filter(empleado =>
        empleado.nombre.toLowerCase().includes(buscar.toLowerCase()) ||
        empleado.apellido.toLowerCase().includes(buscar.toLowerCase()) ||
        empleado.correo.toLowerCase().includes(buscar.toLowerCase()) ||
        empleado.rol.toLowerCase().includes(buscar.toLowerCase())
    ) : empleados;

    // Actualizar el estado de los empleados filtrados
    setEmpleadosFiltrados(empleadosFiltrados);

    return (
        <input type='text' name='buscado' className='buscador' placeholder='Buscar...' onKeyUp={ handleChangeBuscador } />
    );
}
