export default function PopupAñadir({ mostrarPopupAñadir, confirmarAñadir, formDatos, handleChange }) {
    
    return (
        <div className="popup añadir-editar">
            <div className='cerrar'>
                <button onClick={ mostrarPopupAñadir }>x</button>
            </div>
            <h2>Añadir una tarea</h2>
            <form onSubmit={ (e) => confirmarAñadir(e, '/proveedores/añadir') }>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <label>Nombre empresa</label><br />
                                <input type="text" name='empresa' value={ formDatos.empresa || '' } onChange={ handleChange } min={2} />
                            </td>
                            <td>
                                <div className='guardar'>
                                    <button type='submit' style={{width: "8vw"}}>Guardar</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    );
};