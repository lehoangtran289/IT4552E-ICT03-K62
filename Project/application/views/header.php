<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>My E-Commerce Website</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .header {
            max-width: 1500px;
            margin: auto;
            padding-left: 10px;
            padding-right: 10px;
            background: #ffffff;
        }

        .navbar {
            display: flex;
            align-items: center;
            padding: 20px;
            color: black;
        }

        nav {
            flex: 1;
            text-align: right;
        }

        nav ul {
            display: inline-block;
            list-style-type: none;
        }

        nav ul li {
            display: inline-block;
            margin-right: 20px;
        }

        a {
            text-decoration: none;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="navbar">
            <div class="name">
                <h1><a href="">J Henlo Cheems</a></h1>
            </div>
            <nav>
                <ul>
                    <!-- Put something here -->
                    <li><a href="">Home</a></li>
                    <li><a href="">Products</a></li>
                    <li><a href="<?php echo BASE_PATH . '/users/update' ?>">Account</a></li>
                </ul>
            </nav>
            <a href="<?php echo BASE_PATH . '/carts/index' ?>">
                <img src="<?php echo BASE_PATH . '/public/images/cart.png' ?>" width="30px" height="30px">
            </a>
        </div>
    </div>