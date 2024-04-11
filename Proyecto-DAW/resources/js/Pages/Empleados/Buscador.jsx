import { useState } from 'react';

export default function Buscador({ empleados, setEmpleadosFiltrados }) {
    
    // Estado del buscador
        const [buscar, setBuscar] = useState('');

    // Actualizar el valor del buscador
    const handleChangeBuscador = (e) => {

        const valor = e.target.value.trim();
        setBuscar(valor);

        // Filtrar los resultados, sino, devolver empleados completo
        const empleadosFiltrados = valor ? empleados.filter(empleado =>
            empleado.nombre.toLowerCase().includes(valor.toLowerCase()) ||
            empleado.apellido.toLowerCase().includes(valor.toLowerCase()) ||
            empleado.correo.toLowerCase().includes(valor.toLowerCase()) ||
            empleado.rol.toLowerCase().includes(valor.toLowerCase())
        ) : empleados;

        // Actualizar el estado de los empleados filtrados
        setEmpleadosFiltrados(empleadosFiltrados);
    };

    return (
        <input type='text' name='buscado' className='buscador' placeholder='Buscar...' value={ buscar } onChange={ handleChangeBuscador } />
    );
}
