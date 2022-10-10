{include file='header.tpl'}
<section class="d-flex flex-column align-items-center justify-content-center justify-content-around border-bottom">
    {if isset($muebles)}
        {*tengo que mostrar una categoría sola, con sus muebles respectivos*}
        <table>
            <tr class='d-flex flex-column align-items-center justify-content-center justify-content-around'>
                <td>
                    <h4>{$data->categoria}</h4>
                </td>
                <td>
                    <p>{$data->detalles}</p>
                </td>
            </tr>
        </table>
        <table>
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td>Descripción</td>
                    <td>Precio</td>
                    <td>Detalles</td>
                </tr>
            </thead>
            <tbody>
                {foreach $muebles as $mueblito}
                    <tr>
                        <td>{$mueblito->mueble}</td>
                        <td>{$mueblito->descripcion}</td>
                        <td>{$mueblito->precio}</td>
                        <td><a href="{BASE_URL}mueble/{$mueblito->id_mueble}">Ver</a></td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    {else}
        {*tengo que mostrar un mueble solo*}
        <table>
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td>Descripción</td>
                    <td>Precio</td>
                    <td>Categoría</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{$mueble->mueble}</td>
                    <td>{$mueble->descripcion}</td>
                    <td>{$mueble->precio}</td>
                    <td><a href="{BASE_URL}categoria/{$mueble->id_categoria}">{$mueble->categoria}</a></td>
                </tr>
            </tbody>
        </table>
    {/if}
    <button onclick="history.go(-1);">Volver</button>
</section>
{include file='footer.tpl'}