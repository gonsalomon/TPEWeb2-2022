{include file='header.tpl'}
<h5>{$title}</h5>
<table>
    <thead>
        <tr>
            {if $presenting=='categorias'||$presenting=='categoria'}
                <td>Categoría</td>
                <td>Descripción</td>
            {else}
                <td>Mueble</td>
                <td>Descripción</td>
                <td>Precio</td>
                <td>Categoría</td>
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
{include file='footer.tpl'}