<!-- if the user is logged in show profile pic -->
<div class="intro-page">

        <?php if (isset($_SESSION['user'])): ?>
            <img class="profile-pic-intro" src="image/profile/<?php echo $_SESSION['user']['profile_pic'];?>" alt="avatar">
            <h3><?php   echo $_SESSION['user']['first_name']. ' '. $_SESSION['user']['last_name'];?></h3>
        <?php endif; ?>
</div>
