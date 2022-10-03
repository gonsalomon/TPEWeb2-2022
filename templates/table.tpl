{include file='header.tpl'}
<table>
    <caption>{$title}</caption>
    <thead>
        <tr>
            {if $presenting=='categorias'||$presenting=='categoria'}
                <td>Categoría</td>
                <td>Descripción</td>
            {else}
                <td>Nombre</td>
                <td>Descripción</td>
                <td>Precio</td>
                <td>Categoría</td>
            {/if}
        </tr>
    </thead>
    <tbody>
        {foreach $data as $elem}
            <tr>
                <td>{$elem->nombre}</td>
                <td>{$elem->descripcion}</td>
                {if $presenting != 'categorias' && $presenting != 'categoria'}
                    <td>{$elem->precio}</td>
                    <td>{$elem->nombre}</td>
                {{/if}}
            </tr>
        {/foreach}
    </tbody>
</table>
{include file='footer.tpl'}