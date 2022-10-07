{include file='header.tpl'}
{if $muebles}
    {*tengo que mostrar una categoría sola, con sus muebles respectivos*}
    <table>
        <tr class=''>
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
                <td>Categoría</td>
            </tr>
        </thead>
        <tbody>
            {foreach $muebles as $mueblito}
                <tr>
                    <td>{$mueblito->nombre}</td>
                    <td>{$mueblito->descripcion}</td>
                    <td>{$mueblito->precio}</td>
                    <td>{$mueblito->categoria}</td>
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
                <td>{$mueble->nombre}</td>
                <td>{$mueble->descripcion}</td>
                <td>{$mueble->precio}</td>
                <td>{$mueble->categoria}</td>
            </tr>
        </tbody>
    </table>
{/if}
{include file='footer.tpl'}