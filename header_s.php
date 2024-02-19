<?php
if (!isset($_SESSION['client_id']) || empty($_SESSION['client_id'])) {
    $_SESSION['client_id'] = session_id();
    file_put_contents('admin/count_num.txt', (int)file_get_contents('admin/count_num.txt') + 1);
}
?>
<header>

<div class="top-menu">

    <ul class="left-area welcome-area">
        <li class="hello-blog">Hello nice people, welcome to my blog</li>
        <li><a href="mailto:contact@juliblog.com">contact@juliblog.com</a></li>
    </ul><!-- left-area -->


    <div class="right-area">

        <div class="src-area">
            <form action="post">
                <input class="src-input" type="text" placeholder="Search">
                <button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
            </form>
        </div><!-- src-area -->

        <ul class="social-icons">
            <li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
            <li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
            <li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
            <li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
        </ul><!-- right-area -->

    </div><!-- right-area -->

</div><!-- top-menu -->

<div class="middle-menu center-text"><a href="#" class="logo"><img src="images/logo.png" alt="Logo Image"></a></div>

<div class="bottom-area">

    <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

    <ul class="main-menu visible-on-click" id="main-menu">
        <li><a href="index.php">HOME</a></li>
        <li><a href="about.php">ABOUT</a></li>

        <li class="drop-down"><a href="categories.php">CATEGORIES<i class="ion-ios-arrow-down"></i></a>

          

            </li>
        <li><a href="contact.php">CONTACT</a></li>
        <li><a href="./admin/login.php" title="">LOGIN ADMIN</a></li>

    </ul><!-- main-menu -->

</div><!-- conatiner -->
</header>