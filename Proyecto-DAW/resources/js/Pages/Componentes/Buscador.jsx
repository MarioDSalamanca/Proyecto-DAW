import { useState } from 'react';

export default function Buscador({ datosServidor, setDatosFiltrados, campos }) {
    
    // Estado del buscador
        const [buscar, setBuscar] = useState('');

    // Actualizar el valor del buscador
    const handleChangeBuscador = (e) => {

        const valor = e.target.value;
        setBuscar(valor);
        
        if (datosServidor && campos) {
            // Filtrar los resultados
            const datosFiltrados = datosServidor.filter(datos =>
                campos.some(campo => {
                    // Para comprobar si se le pasan objetos anidados (en caso de acceder a un campo de otra tabla) y lo descompone para poder filtrarlo
                    const valorCampo = campo.split('.').reduce((obj, key) => (obj && obj[key] !== undefined) ? obj[key] : undefined, datos);
                    return valorCampo && valorCampo.toString().toLowerCase().includes(valor.toLowerCase());
                })
            );

            // Actualizar el estado de los datosServidor filtrados
            setDatosFiltrados(datosFiltrados);
        }
    };

    return (
        <input type='text' name='buscador' className='buscador' placeholder='Buscar...' value={ buscar } onChange={ handleChangeBuscador } />
    );
}
