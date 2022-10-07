{include file='header.tpl'}
{if $err}
    <div>{$err}</div>
{/if}
<form method="POST" action='validate'>
    <input type='email' name='user' />
    <input type='password' name='password' />
    <button type="submit">Ingresar</button>
</form>
{include file='footer.tpl'}