<style>
    .footer {
        background: #1e1e1eec;
        color: #8a8a8a;
        font-size: 14px;
        padding: 60px 0 20px;
    }

    .footer p {
        color: #8a8a8a;
        font-size: 14px;
        margin-left: 0px;
        font-weight: normal;
    }

    .footer h3 {
        color: #fff;
        margin-bottom: 20px;
    }

    .footer-col-1,
    .footer-col-2,
    .footer-col-3 {
        flex-basis: 33%;
        min-width: 300px;
        margin-bottom: 20px;
    }

    .footer-col-2,
    .footer-col-3 {
        text-align: center;
    }

    .footer-col-1 p,
    .footer-col-2 p {
        text-transform: none;
    }

    .footer-col-2 img {
        width: 100px;
        margin-bottom: 20px;
    }

    .app-logo {
        margin-top: 20px;
    }

    .app-logo img {
        width: 140px;
    }

    .footer hr {
        border: none;
        background: #b5b5b5;
        height: 1px;
        margin: 20px 0;
    }

    ul {
        list-style-type: none;
    }

</style>

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <h3>Download Our App</h3>
                <p>Download App for Android and Ios</p>
                <div class="app-logo">
                    <img src="<?php echo BASE_PATH . '/public/images/app-store.png'?>">
                    <img src="<?php echo BASE_PATH . '/public/images/play-store.png'?>">
                </div>
            </div>
            <div class="footer-col-2">
                <img src="<?php echo BASE_PATH . '/public/images/logo_cheems.png'?>">
                <p>J Henlo Cheems Always Welcomes You To The Shop</p>
            </div>
            <div class="footer-col-3">
                <h3>Follow us</h3>
                <ul>
                    <li>Facebook</li>
                    <li>Instagram</li>
                    <li>Github</li>
                </ul>
            </div>
        </div>
        <hr>
        <p style="text-align: center;">Copyright 2021 - J Henlo Cheems</p>
    </div>
</div>