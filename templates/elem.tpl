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
            <caption>Muebles para {$data->categoria}</caption>
            <thead>
                <tr>
                    <td><b>Nombre</b></td>
                    <td><b>Descripción</b></td>
                    <td><b>Precio</b></td>
                    <td><b>Detalles<b></td>
                    {if isset($smarty.session.role) && $smarty.session.role == 'admin'}
                        <td>Editar</td>
                        <td>Eliminar</td>
                    {/if}
                </tr>
            </thead>
            <tbody>
                {foreach $muebles as $mueblito}
                    <tr>
                        <td>{$mueblito->mueble}</td>
                        <td>{$mueblito->descripcion}</td>
                        <td>{$mueblito->precio}</td>
                        <td><a href="{BASE_URL}mueble/{$mueblito->id_mueble}">Ver</a></td>
                        {*las acciones de admin son sobre muebles*}
                        {if isset($smarty.session.role) && $smarty.session.role == 'admin'}
                            <td><a href="{BASE_URL}editMueble/{$mueblito->id_mueble}">Ir</a></td>
                            <td><a href="{BASE_URL}deleteMueble/{$mueblito->id_mueble}">Ir</a></td>
                        {/if}
                    </tr>
                {/foreach}
            </tbody>
        </table>
    {else}
        {*tengo que mostrar un mueble solo*}
        <table>
            <thead>
                <tr>
                    <td><b>Nombre</b></td>
                    <td><b>Descripción</b></td>
                    <td><b>Precio</b></td>
                    <td><b>Categoría</b></td>
                    {if isset($smarty.session.role) && $smarty.session.role == 'admin'}
                        <td>Editar</td>
                        <td>Eliminar</td>
                    {/if}
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{$mueble->mueble}</td>
                    <td>{$mueble->descripcion}</td>
                    <td>{$mueble->precio}</td>
                    <td><a href="{BASE_URL}categoria/{$mueble->id_categoria}"><b><i>{$mueble->categoria}</i></b></a></td>
                    {if isset($smarty.session.role) && $smarty.session.role == 'admin'}
                        <td><a href="{BASE_URL}editMueble/{$mueble->id_mueble}">Ir</a></td>
                        <td><a href="{BASE_URL}deleteMueble/{$mueble->id_mueble}">Ir</a></td>
                    {/if}
                </tr>
            </tbody>
        </table>
    {/if}
    <button onclick="history.go(-1);">Página anterior</button>
</section>
{include file='footer.tpl'}