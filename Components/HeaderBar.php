<?php
declare(strict_types=1);

function HeaderBar()
{
    echo <<<HTML
    <div id="header">
        <div id="header-left">
            <div id="brand">Parkside Getaways</div>
            <div id="triangle">
                <div id="white-triangle"></div>
                <div id="purple-triangle"></div>
                <div id="purple-rectangle"></div>
            </div>
        </div>
        <div id="header-right">
            <span class="header-right-item">
                <img id="flag" src="/public/assets/flag.webp" alt="Description of the image">
            </span>
            <span id="LKR" class="header-right-item">LKR</span>
            <span class="header-right-item group">
                <button id="login-button" class="button" type="button">Login</button>
                <button id="signup-button" class="button" type="button">Sign up</button>
            </span>
            <span id="profile-placeholder" class="header-right-item">
                <img id="profile-pic-placeholder" src="/public/assets/profile-pic-placeholder.jpg" alt="Profile-pic-placeholder">
            </span>
        </div>
    </div>
    <script src="/public/js/header.js"></script>
    HTML;
}
