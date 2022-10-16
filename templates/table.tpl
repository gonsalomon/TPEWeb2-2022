{include file='header.tpl'}
<section class="d-flex flex-column align-items-center justify-content-center justify-content-around border-bottom">
    <h5>{$title}</h5>
    <table>
        <thead>
            <tr>
                {if $presenting=='categorias'||$presenting=='categoria'}
                    <td><b>Categoría</b></td>
                    <td><b>Descripción</b></td>

                {else}
                    <td><b>Mueble<b></td>
                    <td><b>Descripción<b></td>
                    <td><b>Precio<b></td>
                    <td><b>Categoría<b></td>
                    <td><b>Detalles</b></td>
                {/if}
                {if isset($smarty.session.role) && $smarty.session.role == 'user'}
                    <td>Editar
                    <td>
                    <td>Eliminar
                    <td>
                    {/if}

            </tr>
        </thead>
        <tbody>
            {foreach $data as $elem}
                <tr>
                    {if $presenting == 'categoria'||$presenting == 'categorias'}
                        <td><a href="{BASE_URL}categoria/{$elem->id_categoria}"><b><i>{$elem->categoria}</i></b></a></td>
                        <td>{$elem->detalles}</td>
                    {else}
                        <td>{$elem->mueble}</td>
                        <td>{$elem->descripcion}</td>
                        <td>{$elem->precio}</td>
                        {*qué cosa linda el join, poder tomar los campos de las dos tablas es re cómodo*}
                        <td><a href="{BASE_URL}categoria/{$elem->id_categoria}"><b><i>{$elem->categoria}</i></b></a></td>
                        <td><a href="{BASE_URL}mueble/{$elem->id_mueble}"><b>Ver</b></a></td>
                    {/if}
                    {*primero, reviso si estoy logueado (para mostrar acciones de admin)*}
                    {if isset($smarty.session.role) && $smarty.session.role == 'user'}
                        {*segundo, qué estoy presentando (para tener bien el href)*}
                        {if $presenting == 'mueble'||$presenting == 'muebles'}
                            <td>
                                <a href="{BASE_URL}editMueble/{$elem->id_mueble}"><i>Ir</i></a>
                            <td>
                            <td>
                                <a href="{BASE_URL}deleteMueble/{$elem->id_mueble}"><i>Ir</i></a>
                            <td>
                            {else}
                            <td>
                                <a href="{BASE_URL}editCategoria/{$elem->id_categoria}"><i>Ir</i></a>
                            </td>
                            <td>
                                <a href="{BASE_URL}deleteCategoria/{$elem->id_categoria}"><i>Ir</i></a>
                            </td>
                        {/if}
                    {/if}
                </tr>
            {/foreach}
        </tbody>
    </table>
    {include file='add.tpl'}
    <button onclick="history.go(-1);">Página anterior</button>
</section>
{include file='footer.tpl'}