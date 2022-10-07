    <footer class="d-flex flex-wrap align-items-center justify-content-center justify-content-around">
        <p>Copyright fuera del acceso económico del alumno.</p>
        <form method="POST" action='login'>
            {if $title}<caption>
                    <h6>{$title}</h6>
            </caption>{/if}
            <label>Mail</label>
            <input type='email' name='user' />
            <label>Contraseña</label>
            <input type='password' name='password' />
            <button type="submit">Ingresar</button>
        </form>
    </footer>
</body>