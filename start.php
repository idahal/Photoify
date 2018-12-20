
<article>

    <form class="sign-in" action="app/users/login.php" method="post">
        <h1>Sign in</h1>
        <div class="form-group">
            <label for="email">Email</label> <br>
            <input class="form-control" type="email" name="email" placeholder="your@email.com" required>
            <!-- <small class="form-text text-muted">Please provide the your email address.</small> -->
        </div><!-- /form-group -->

        <div class="form-group">
            <label for="password">Password</label><br>
            <input class="form-control" type="password" name="password" required>
            <!-- <small class="form-text text-muted">Please provide the your password (passphrase).</small> -->
        </div><!-- /form-group -->

        <button type="submit" class="login-button">Sign in</button>

        <b><a href="/signup.php">Sign up for free</a></b>
    </form>
</article>
