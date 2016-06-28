<form role="form" method="post" action="/">
        <script>
        <?if (isset($result['message']) && $result['message'] != "") :?>
            alert("<?=$result['message']?>","Uh Oh");
        <?endif;?>
        </script>
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