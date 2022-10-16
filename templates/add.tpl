{*el formulario de add se usa tanto para agregar un elemento como para editarlo, controlado desde view mediante $action*}
{if (isset($smarty.session.role) && $smarty.session.role == 'user')}
    {if $action == 'editMueble'}
        {include file='header.tpl'}
        <section class="d-flex flex-column align-items-center justify-content-center">
            <h3>{$title}</h3>
            <form method='post' action='{BASE_URL}confirmEditMueble' class="d-flex flex-column">
                <input hidden name='id_mueble' value={$mueble->id_mueble}>
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
                <button action='submit'>Actualizar</button>
            </form>
            <button onclick="history.go(-1);">Volver</button>
        </section>
        {include file='footer.tpl'}
    {else if $action == 'editCategoria'}
        {include file='header.tpl'}
        <section class="d-flex flex-column align-items-center justify-content-center">
            <h3>{$title}</h3>
            <form method='post' action='{BASE_URL}confirmEditCategoria' class="d-flex flex-column">
                <input hidden name='id_categoria' value={$categoria->id_categoria}>
                <label>Categoría</label>
                <input name='categoria' value={$categoria->categoria}>
                <label>Detalles</label>
                <input name="detalles" value={$categoria->detalles}>
                <button action='submit'>Actualizar</button>
            </form>
        </section>
        {include file='footer.tpl'}
    {else if $action == 'mueble'}
        <h4>Agregar un mueble</h4>
        <form method='post' action='{BASE_URL}addMueble' class="d-flex flex-column">
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
    {else if action == 'categoria'}
        <h4>Agregar una categoría</h4>
        <form method='post' action='{BASE_URL}addCategoria' class="d-flex flex-column">
            <label>Categoría</label>
            <input name='categoria'>
            <label>Detalles</label>
            <input name='detalles'>
            <button action='submit'>Enviar</button>
        </form>
    {/if}
{/if}