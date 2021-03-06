<?php require __DIR__.'/views/header.php'; ?>
<!-- sign up form -->
<article>
    <div class="signup">
        <form class="create-account" action="/app/users/signup.php" method="post">
            <h1>Create a account</h1>
            <p>
                <label>First name</label><br>
                <input class="form-signup" type="text" name="first_name">
            </p>
            <p>
                <label>Last name</label><br>
                <input class="form-signup" type="text" name="last_name">
            </p>
            <p>
                <label>Email</label><br>
                <input class="form-signup" type="email" name="email" required>
            </p>
            <p>
                <label>Password</label><br>
                <input type="password" name="password">
            </p>
            <p>
                <label>Confirm password</label><br>
                <input type="password" name="confirm_password">
            </p>
            <p>
                <button class="sign-up">Sign up</button>
            </p>
            <b><a href="/">I already got a account</a></b>
        </form>
    </div>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
