<form role="form" method="post" action="/">
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?=(isset($email))? $email : "" ;?>">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <button type="submit" class="btn btn-default">Login</button>
</form>
<form role="form" method="post" action="/">
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="password_confirm">Re-enter Password:</label>
            <input type="password" class="form-control" id="password_comfirm" name="password_confirm">
        </div>
        <input type="submit" class="btn btn-default">Register</input>
</form>


