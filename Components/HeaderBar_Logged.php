<?php
declare(strict_types=1);


function HeaderBar_Logged()
{
    echo <<<HTML
    <div id="header">
        <div id="header-left"><span id="brand">Parkside Getaways</span>
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
            <span id="profile" class="group">
                <span id="username" class="header-right-item">
    HTML;

    if (isset($_SESSION['username'])) {
        echo $_SESSION["username"];
    }

    echo <<<HTML
                    </span>
                    <span class="header-right-item ">
        HTML;
    if (isset($_SESSION['gender']) && $_SESSION['gender'] === 'female') {
        echo <<<HTML
        <img id="profile-pic" src="/public/assets/woman-pic.png" alt="Description of the image"/>
        HTML;
    } else {
        echo '<img id="profile-pic" src="/public/assets/man-pic.jpeg" alt="Description of the image"/>';
    }
    echo <<<HTML

                </span>
            </span>
            <span class="header-right-item">
                <button id="logout-button" class="button">Logout</button>
            </span>

        </div>
    </div>
    <script src="/public/js/loggedHeader.js"></script>
    HTML;
}
