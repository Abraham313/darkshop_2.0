

{include file="header.tpl" title=foo}
{include file="nav.tpl" title=foo}

<div id="content-wrapper">
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item active">Support</li>
        </ol>

        <table class="table">

            <tr>
                <th>Title</th>
                <th>From User</th>
                <th colspan="2">Status</th>
            </tr>
            {foreach from=$allTickets item=ticket}

                <tr>
                    <td>{$ticket.title}</td>
                    <td>{$ticket.username}</td>
                    <td>{$ticket.status}</td>
                    <td><a target="_blank" href="/support/ticket/{$ticket.id}">Open</a>     </td>
                </tr>

            {/foreach}

        </table>
    </div>
</div>
{include file="footer.tpl"}
