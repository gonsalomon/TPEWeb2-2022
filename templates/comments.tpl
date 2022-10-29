{if(isset($smarty.session.user))}
    <ul>
        {foreach }
            <li>

                {if $smarty.session.user == }
                {else if(isset($smarty.session.role) && $smarty.session.role === 'admin')}
                {/if}
            </li>
        </ul>
    {/if}