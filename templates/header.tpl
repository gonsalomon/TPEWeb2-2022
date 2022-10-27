<head>
    <!-- No había dónde más meter Bootstrap... -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <style>
        ul li {
            list-style: none;
        }

        a {
            text-decoration: none;
        }

        li>a {
            color: white;
        }
    </style>
    <header class="text-bg-dark d-flex flex-wrap align-items-center justify-content-center justify-content-around p-3">
        <ul>
            <li>
                <h1>De buena madera</h1>
            </li>
            <li>
                <p>Somos la reversión del año pasado del trabajo de la mueblería que tiene uno de los alumnos.</p>
            </li>
            {if isset($user)}
                <li>
                    <p>Bienvenido, {$user}!</p>
                    <a href="{BASE_URL}logout"><i>Logout({$user})</i></a>
                    {if isset($smarty.session.err)}
                        <p class="alert alert-danger">{$smarty.session.err}</p>
                    {/if}
                </li>
            {else}
                <form method="POST" action='{BASE_URL}login'>
                    <caption>
                        <h6>Ingresar</h6>
                    </caption>
                    <label>Mail</label>
                    <input type='email' name='user' />
                    <label>Contraseña</label>
                    <input type='password' name='password' />
                    <button type="submit">Ingresar</button>
                </form>
                {if isset($smarty.session.err)}
                    <p class="alert alert-danger">{$smarty.session.err}</p>
                {/if}
            {/if}
        </ul>
    </header>
    <nav>
        <ul
            class='navbar navbar-light bg-primary d-flex flex-row align-items-center justify-content-center justify-content-around border-bottom'>
            <li><a href='{BASE_URL}muebles'><b>Todos los muebles</b></a></li>
            <li><a href='{BASE_URL}categorias'><b>Todas las categorías</b></a></li>
        </ul>
</nav>