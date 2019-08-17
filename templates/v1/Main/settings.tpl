
{include file="header.tpl" title=foo}
{include file="nav.tpl"}
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Account Settings</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row" >
            <form method="post">

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="{$user.username}" id="username" aria-describedby="username_helper" value="{$user.username}" disabled>
                    <small id="username_helper" class="form-text text-muted">We'll this should be a unique name.</small>
                </div>

                <div class="form-group">
                    <label for="usd">Password</label>
                    <input type="text" name="edit_pass" class="form-control" id="usd" value="" >
                    <small id="username_helper" class="form-text text-muted">Enter a new password and click Edit</small>
                </div>
                <button type="submit" class="btn btn-primary">Edit User</button>
            </form>
    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->

</div>




{include file="footer.tpl"}
