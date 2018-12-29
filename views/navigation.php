<nav class="navbar">
      <span class="navbar-toggle" id="js-navbar-toggle">
          <svg width="36" height="24" viewBox="0 0 36 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect width="36" height="3.0" rx="1.8" fill="#ffffff"/>
          <rect y="9.6001" width="36" height="3.0" rx="1.8" fill="#ffffff"/>
          <rect y="20.3999" width="36" height="3.0" rx="1.8" fill="#ffffff"/>
        </svg>
      </span>
      <a href="#" class="logo">Photoify</a>
        <ul class="main-nav" id="js-menu">
            <li>
                <?php if (isset($_SESSION['user'])): ?>
                    <a class="nav-link" href="/">The gallery</a>
                <?php else: ?>
                    <a class="nav-link" href="/index.php">Home</a>
                <?php endif; ?>
            </li>
            <li>
                <?php if (isset($_SESSION['user'])): ?>
                    <a class="nav-link" href="/mypage.php">My page</a>
                <?php else: ?>
                    <a class="nav-link" href="/about.php">About</a>
                <?php endif; ?>
            </li>
            <!-- <li>
                <?php if (isset($_SESSION['user'])): ?>
                    <a class="nav-link" href="/settings.php">My settings</a>
                <?php endif; ?>
            </li> -->
            <li>
                <?php if (isset($_SESSION['user'])): ?>
                    <a class="nav-link" href="/myaccount.php">My account</a>
                <?php endif; ?>
            </li>
            <!-- <li>
                <?php if (isset($_SESSION['user'])): ?>
                    <a class="nav-link" href="/password.php">Change password</a>
                <?php endif; ?>
            </li> -->
            <li>
                <?php if (isset($_SESSION['user'])): ?>
                    <a class="nav-link" href="app/users/logout.php">Logout</a>
                <?php else: ?>
                    <a class="nav-link" href="/">Login</a>
                <?php endif; ?>
            </li>
        </ul>
</nav>
