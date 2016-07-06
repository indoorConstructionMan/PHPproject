<h1>welcome</h1>
<h3><?=$_SESSION['chatapp_user']->username?></h3>
<p>have fun chatting on our chat app!</p>
<a href="logout">LOGOUT</a>

<form method="post" action="content" autocomplete="off" class="slidein-top-components">
    <div class="row">
        <div class="input-field col s12">
            <input class="clouds-text moss-border bold flow-text" autocomplete="off" id="content" type="content" name="content" >
            <label for="content" class="moss-text flow-text">Click.   Type.    Press Enter.</label>
        </div>
    </div>
</form>