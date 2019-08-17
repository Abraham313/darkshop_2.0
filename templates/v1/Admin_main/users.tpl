
{include file="header.tpl" title=foo}
{include file="nav.tpl" title=foo}

<div id="content-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item active">Users</li>
        </ol>


        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Users</div>
                    <table class="table">
                        <tr>

                        </tr>

                        {foreach from=$allUser item=user}
                            <tr>
                                <th>{$user.username}</th>
                                <th>{$user.amount_in_usd}</th>
                                <th>{$user.created_at}</th>
                                <th>{if $user.rank == 100}
                                        Admin
                                     {else}
                                        Member
                                    {/if}
                                </th>
                                <th> <a href="/admin/users/edit/{$user.id}">Edit Account</a>  </th>
                            </tr>
                        {/foreach}
                    </table>
            </div>


        </div>
    </div>
    {include file="footer.tpl"}

