{include file='header.tpl'}
<section class="d-flex flex-column align-items-center justify-content-center justify-content-around border-bottom">
    <h5>{$title}</h5>
    <table>
        <thead>
            <tr>
                {if $presenting=='categorias'||$presenting=='categoria'}
                    <td>Categoría</td>
                    <td>Descripción</td>
                {else}
                    <td><b>Mueble<b></td>
                    <td><b>Descripción<b></td>
                    <td><b>Precio<b></td>
                    <td><b>Categoría<b></td>
                {/if}
            </tr>
        </thead>
        <tbody>
            {foreach $data as $elem}
                <tr>
                    <td>{$elem->mueble}</td>
                    <td>{$elem->descripcion}</td>
                    {if $presenting != 'categorias' && $presenting != 'categoria'}
                        <td>{$elem->precio}</td>
                        <td><a href="categoria/{$elem->id_categoria}">{$elem->categoria}</a></td>
                    {{/if}}
                </tr>
            {/foreach}
        </tbody>
    </table>
    <button onclick="history.go(-1);">Volver</button>
    {if isset($smarty.session.role) && $smarty.session.role == 'user'}
        <h5>Agregar un mueble</h5>
        {include file='add.tpl'}
    {/if}
</section>
{include file='footer.tpl'}