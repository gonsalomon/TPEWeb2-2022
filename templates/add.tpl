{if $action == 'edit'}
    {include file='header.tpl'}
    <h3>Editar {$mueble->mueble}</h3>
    <form method='post' action='editMueble'>
        <label>Mueble</label>
        <input name='mueble' value={$mueble->mueble}>
        <label>Descripción</label>
        <input name='descripcion' value={$mueble->descripcion}>
        <label>Precio</label>
        <input name='precio' value={$mueble->precio}>
        <label>Categoría</label>
        <select name='id_categoria'>
            {foreach $categorias as $categoria}
                <option value={$categoria->id_categoria}>{$categoria->categoria}</option>
            {/foreach}
        </select>
        <input type='submit'>
    </form>
{else if $action == 'mueble'}
    <form method='post' action='addMueble'>
        <label>Mueble</label>
        <input name='mueble'>
        <label>Descripción</label>
        <input name='descripcion'>
        <label>Precio</label>
        <input name='precio'>
        <label>Categoría</label>
        <select name='id_categoria'>
            {foreach $categorias as $categoria}
                <option value={$categoria->id_categoria}>{$categoria->categoria}</option>
            {/foreach}
        </select>
        <button action='submit'>Enviar</button>
    </form>
{else}
    <form method='post' action='addCategoria'>
        <label>Categoría</label>
        <input name='categoria'>
        <label>Detalles</label>
        <input name='detalles'>
        <button action='submit'>Enviar</button>
    </form>
{/if}