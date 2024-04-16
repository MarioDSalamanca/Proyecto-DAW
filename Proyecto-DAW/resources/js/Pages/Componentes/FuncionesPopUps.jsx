import { useState } from 'react';
import { router } from "@inertiajs/react";

export default function FuncionesPopUps() {
    
    // Estados
        const [popupAñadir, setPopupAñadir] = useState(false);
        const [popupEditar, setPopupEditar] = useState(false);
        const [popupEliminar, setPopupEliminar] = useState(false);
        const [datoEliminar, setDatoEliminar] = useState('');
        const [formDatos, setFormDatos] = useState({});

    // Llamadas para iniciar las acciones
        function añadir() {
            mostrarPopupAñadir();
            setFormDatos({});
        }
        function editar(registro) {
            mostrarPopupEditar();
            setFormDatos(registro);
        };
        function eliminar(dato) {
            mostrarPopupEliminar();
            setDatoEliminar(dato);
        };

    // Funciones para mostrar los PopUps
        const mostrarPopupAñadir = () => setPopupAñadir(!popupAñadir);
        const mostrarPopupEditar = () => setPopupEditar(!popupEditar);
        const mostrarPopupEliminar = () => setPopupEliminar(!popupEliminar);

    // Setear los valores de los formularios de Añadir y Editar
        function handleChange(e) {
            const { name, value } = e.target;
        
            // Si el nombre del campo es 'descripcion', actualiza
            if (name === 'descripcion') {
                setFormDatos(prev => ({
                    ...prev,
                    [name]: value
                }));
            } else {
                // Para otros campos
                setFormDatos(prev => ({
                    ...prev,
                    [name]: value.trim()
                }));
            }
        }
    
    // Solicitudes POST al servidor
        function confirmarAñadir(e, url) {
            e.preventDefault();
            mostrarPopupAñadir();
            router.post(url, formDatos)
            setFormDatos({});
            window.location.reload()
        };
        function confirmarEditar(e, url) {
            e.preventDefault();
            mostrarPopupEditar();
            router.post(url, formDatos);
            setFormDatos({});
            window.location.reload()
        };
        function confirmarEliminar(e, url) {
            e.preventDefault();
            mostrarPopupEliminar();
            router.post(url, { dato: datoEliminar });
            window.location.reload()
        }

    // Retornar las funciones a los componentes
        return {
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
            datoEliminar,
            formDatos
        };
}