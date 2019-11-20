<div class="row">
    <div class="col m12">
        <form action="api/login_pc.php" method="post" id="login">
            <div class="input-field col s6">
                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email" required>
            </div> 
            <div class="input-field col s6">
                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="senha" required>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">
                <i class="material-icons right">Login</i>
            </button>
        </form>
    </div>
</div>