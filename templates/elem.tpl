{include file='header.tpl'}
<table>
    <thead>
        <tr>
            <!-- uso el if para ver si es un mueble (lado N) o una categoria (lado 1) -->
            {if $presenting != 'muebles' && $presenting != 'mueble'}
                <td>Nombre</td>
                <td>Descripción</td>
            {else}
                <td>Nombre</td>
                <td>Descripción</td>
                <td>Precio</td>
                {*<td>Categoría</td>*}
            {/if}
        </tr>
    </thead>
    <tbody>
        {foreach $data as $elem}
            <tr>
                <td>{$elem->nombre}</td>
                <td>{$elem->descripcion}</td>
                {if $presenting == 'muebles' || $presenting == 'mueble'}
                    <td>{$elem->precio}</td>
                    {*<td>{$elem->categoria}</td>* comentado hasta que agregue categorías en cada mueble*}
                {/if}
            </tr>
        {/foreach}
    </tbody>
</table>
{include file='footer.tpl'}