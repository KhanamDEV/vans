<?php
/**
 * Created by PhpStorm
 * User: Kha Nam
 * Date: 20/08/2020
 * Time: 1:03 PM
 */
?>
<body>
<header id="wrap-header">
    <section id="header-top">
        <div class="container">
            <ul>
                <li>
                    <a href="">Cửa hàng chính thức tại Việt Nam</a>
                </li>
                <li>
                    <a href="<?php echo Helpers::getUrlPage()?>favorites"><i class="fa fa-star-o" aria-hidden="true"></i></i>Giỏ hàng</a>
                </li>
            </ul>
        </div>
    </section>
    <section id="header-bottom" class="bg-white">
        <div class="container">
            <div class="logo">
                <a href="<?php echo Helpers::getUrlPage() ?>">
                    <img src="<?php echo Helpers::getPathPublic('user')?>images/logo-header.png" alt="">
                </a>
            </div>
            <nav id="wrap-nav">
                <ul>
                    <li>
                        <a href="<?php echo Helpers::getUrlPage() ?>product">all vans</a>
                    </li>
                    <li>
                        <a href="<?php echo Helpers::getUrlPage() ?>product/type/mans">mens</a>
                    </li>
                    <li>
                        <a href="<?php echo Helpers::getUrlPage() ?>product/type/woman">womens</a>
                    </li>
                    <li>
                        <a href="<?php echo Helpers::getUrlPage() ?>product/type/kids">kids</a>
                    </li>
                    <li>
                        <a href="<?php echo Helpers::getUrlPage() ?>news">LATEST VANS NEWS</a>
                    </li>
                    <li>
                        <a href="<?php echo Helpers::getUrlPage() ?>about">about us</a>
                    </li>
                    <li>
                        <a href="<?php echo Helpers::getUrlPage() ?>size">size chart</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
</header>
<div class="ajax-loading">
<div class="loading">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: transparent; display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
        <circle cx="50" cy="50" r="32" stroke-width="8" stroke="#ffffff" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round">
            <animateTransform attributeName="transform" type="rotate" dur="1s" repeatCount="indefinite" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
        </circle>
        <circle cx="50" cy="50" r="23" stroke-width="8" stroke="#ffffff" stroke-dasharray="36.12831551628262 36.12831551628262" stroke-dashoffset="36.12831551628262" fill="none" stroke-linecap="round">
            <animateTransform attributeName="transform" type="rotate" dur="1s" repeatCount="indefinite" keyTimes="0;1" values="0 50 50;-360 50 50"></animateTransform>
        </circle>
        <!-- [ldio] generated by https://loading.io/ --></svg>
    </div>

</div>