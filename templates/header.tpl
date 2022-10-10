<head>
    <!-- No había dónde más meter Bootstrap... -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-around py-3  border-bottom">
        <style>
            ul li {
                list-style: none;
            }
        </style>
        <ul>
            <li>
                <h1>De buena madera</h1>
            </li>
            <li>
                <p>Somos la reversión del año pasado del trabajo de la mueblería que tiene uno de los alumnos.</p>
            </li>
            {if isset($user)}
                <li>
                    <a href="logout">Logout({$user})</a>
                </li>
            {else}
                <form method="POST" action='login'>
                    <caption>
                        <h6>Ingresar</h6>
                    </caption>
                    <label>Mail</label>
                    <input type='email' name='user' />
                    <label>Contraseña</label>
                    <input type='password' name='password' />
                    <button type="submit">Ingresar</button>
                </form>
                {if isset($err)}
                    <p class="alert alert-danger">{$err}</p>
                {/if}
            {/if}
        </ul>
</header>