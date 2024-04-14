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
    function editar(empleado) {
        mostrarPopupEditar();
        setFormDatos(empleado);
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
        setFormDatos(prev => ({
            ...prev,
            [name]: value.trim(),
        }));
    }

    // Solicitudes POST al servidor
    function confirmarAñadir(e) {
        e.preventDefault();
        mostrarPopupAñadir();
        router.post('/empleados/añadir', formDatos)
        setFormDatos({});
        window.location.reload()
    };
    function confirmarEditar(e) {
        e.preventDefault();
        mostrarPopupEditar();
        router.post('/empleados/editar', formDatos);
        setFormDatos({});
        window.location.reload()
    };
    function confirmarEliminar() {
        mostrarPopupEliminar(); 
        router.post('/empleados/eliminar', { dato: datoEliminar });
        window.location.reload()
    }

    // Retornar las funciones que deseas utilizar en otros componentes
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