<div class="container">
    <form class="form-horizontal" method="post" action="<?=$baseUrl?>item/signIn">
        <fieldset>
            <legend>Log in</legend>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Login</label>
                <div class="col-lg-10">
                    <input name="user_name" type="text" class="form-control" id="inputEmail" placeholder="Login">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                <div class="col-lg-10">
                    <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">

                </div>
            </div>
            <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </fieldset>
    </form>
</div>
