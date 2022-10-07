<head>
    
</head>
<body>
    <h1>De buena madera</h1>
    <p>Somos la reversión del año pasado del trabajo de la mueblería que tiene uno de los alumnos.</p>
    {if $title}<h2>{$title}</h2>{/if}
    {if isset($smarty.session.user)}<div>Bienvenido, {$smarty.session.user}! <button><a href='logout'>Logout<a></button>
        </div>
{/if}