<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css" />
</head>

<body>
    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-around py-3  border-bottom">
        <h1>De buena madera</h1>
        <p>Somos la reversión del año pasado del trabajo de la mueblería que tiene uno de los alumnos.</p>
        {if isset($smarty.session.user)}
            <div>Bienvenido, {$smarty.session.user}!
                <a href='logout'>Logout<a>
            </div>
        {/if}
    </header>