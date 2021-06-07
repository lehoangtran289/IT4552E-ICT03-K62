<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>J Henlo Cheems Shop</title>

    <style>
        <?php include "style.css" ?>.navbar {
            display: flex;
            align-items: center;
            padding: 20px;
        }

        .header {
            width: 100%;
            margin: auto;
            padding-left: 50px;
            padding-right: 50px;
            background-color: #1e1e1eec;
        }

        .nav-header-menu {
            flex: 1;
            text-align: right;
        }

        .nav-header-menu ul {
            display: inline-block;
            list-style-type: none;
        }

        .nav-header-menu ul li {
            display: inline-block;
            margin-right: 20px;
        }

        .nav-header-menu ul li a {
            text-transform: capitalize;
            font-size: 15px;
            font-weight: 500;
            letter-spacing: 0.5px;
            color: #fff;
            transition: all 0.5s;
            margin-top: 5px;
        }

        .nav-header-menu ul li a:hover {
            color: #ff523b;
        }

        .name h2 {
            color: #fff;
            text-transform: uppercase;
            font-size: 24px;
            font-weight: 700;
            transition: all .3s ease 0s;
        }

        .name h2 em {
            font-style: normal;
            color: #ff523b;
        }

        #searchQueryInput {
            width: 100%;
            height: 2.8rem;
            background: #f5f5f5;
            color: #242222;
            outline: none;
            border: none;
            /*border-radius: 1.625rem;*/
            padding: 0 3.5rem 0 1.5rem;
            font-size: 1rem;
        }

        #searchQuerySubmit {
            width: 3.5rem;
            height: 2.8rem;
            margin-left: -3.5rem;
            background: none;
            border: none;
            outline: none;
        }

        #searchQuerySubmit:hover {
            cursor: pointer;
        }

        .searchBar {
            width: 40%;
            margin-left: 10%;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .wrapper {
            width: 40%;
            margin-left: 10%;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .wrapper .search-input {
            position: relative;
            width: 100%;
        }

        .search-input input {
            height: 2.8rem;
            width: 100%;
            background: #f5f5f5;
            outline: none;
            border: none;
            border-radius: 5px;
            padding: 0 3.5rem 0 1.5rem;
            font-size: 1rem;
        }

        .search-input.active input {
            border-radius: 5px;
        }

        .search-input .autocom-box {
            position: absolute;
            width: 100%;
            background-color: white;
            z-index: 1;
            padding: 0;
            opacity: 0;
            pointer-events: none;
            max-height: 280px;
            overflow-y: auto;
            border-radius: 5px;
        }

        .search-input.active .autocom-box {
            padding: 10px 8px;
            pointer-events: auto;
            opacity: 0.8;
        }

        .autocom-box li {
            list-style: none;
            padding: 8px 12px;
            display: none;
            width: 100%;
            cursor: default;
            border-radius: 3px;
        }

        .search-input.active .autocom-box li {
            display: block;
        }

        .autocom-box li:hover {
            background: #efefef;
        }

        .search-input .icon {
            position: absolute;
            width: 3.5rem;
            height: 2.8rem;
            margin-left: -3.5rem;
            background: none;
            border: none;
            outline: none;
            cursor: pointer;
        }

        .menu-icon {
            width: 28px;
            margin-left: 20px;
            display: none;
        }

    </style>

    <script type="text/javascript">
        function showButton() {
            loginButton = document.getElementById('login');
            logoutButton = document.getElementById('logout');
            adminButton = document.getElementById('admin');
            if (localStorage.getItem("isLoggedIn") === 'user') {
                loginButton.style.display = 'none';
                adminButton.style.display = 'none';
                logoutButton.style.display = 'inline';
            } else if (localStorage.getItem("isLoggedIn") === 'admin') {
                logoutButton.style.display = 'inline';
                loginButton.style.display = 'none';
                adminButton.style.display = 'inline';
            } else {
                logoutButton.style.display = 'none';
                loginButton.style.display = 'inline';
                adminButton.style.display = 'none';
            }
        }

        let processSearch = () => {
            const input = document.getElementById("searchQueryInput").value;
            if (input) {
                window.location.href = "<?php echo BASE_PATH . "/products/page/1/" ?>" + input;
            }
            return false;
        }

        var menuItems = document.getElementById("menuItems");
        menuItems.style.maxHeight = "0px";

        // Menu toggle when screen width is <= 800px
        function menuToggle() {
            if (menuItems.style.maxHeight == "0px") {
                menuItems.style.maxHeight == "200px";
            } else {
                menuItems.style.maxHeight == "0px";
            }
        }
    </script>
</head>

<body>
    <div class="header">
        <div class="navbar">
            <div class="name">
                <a href="<?php echo BASE_PATH ?>">
                    <h2><em>J</em> Henlo Cheems</h2>
                </a>
            </div>
            <form class="wrapper" onsubmit="return processSearch();">
                <div class="search-input">
                    <a href="" target="_blank" hidden></a>
                    <input id="searchQueryInput" type="text" placeholder="Type to search.." value="">
                    <button class="icon" id="searchQuerySubmit" type="submit" name="searchQuerySubmit">
                        <span class="material-icons md-24">search</span>
                    </button>
                    <div class="autocom-box">
                        <!-- here list are inserted from javascript -->
                    </div>
                </div>
            </form>
            <nav class="nav-header-menu">
                <ul id="menuItems">
                    <!-- Put something here -->
                    <li id="admin"><a href="<?php echo BASE_PATH ?>/admin/index">Admin</a></li>
                    <li><a href="<?php echo BASE_PATH . '/products/page' ?>">Products</a></li>
                    <li><a href="<?php echo BASE_PATH . '/users/update' ?>">Account</a></li>
                    <li id="login"><a href="<?php echo BASE_PATH ?>/users/login">Log in</a></li>
                    <li id="logout"><a href="<?php echo BASE_PATH ?>/users/logout">Log out</a></li>
                </ul>
            </nav>
            <a href="<?php echo BASE_PATH . '/carts/index' ?>">
                <img src="<?php echo BASE_PATH ?>/icons/cart.png" width="30px" height="30px">
            </a>
            <img src="<?php echo BASE_PATH ?>/icons/menu.png" class="menu-icon" onclick="menuToggle()">
        </div>

        <script>
            showButton()
        </script>
        <script type="text/javascript">
            // getting all required elements
            const searchWrapper = document.querySelector(".search-input");
            const inputBox = searchWrapper.querySelector("input");
            const suggBox = searchWrapper.querySelector(".autocom-box");
            const icon = searchWrapper.querySelector(".icon");
            let linkTag = searchWrapper.querySelector("a");
            let webLink;

            inputBox.onkeyup = (e) => {
                let reg = new RegExp(/[^a-zA-Z0-9 ]/gi);
                let searchKey = e.target.value.replace(reg, "");
                if (searchKey.length < e.target.value.length) return;
                if (searchKey) {
                    const url = "<?php echo BASE_PATH . "/products/search/" ?>" + searchKey;
                    fetch(url)
                        .then(response => response.text())
                        .then(data => {
                            console.log(data);
                            let obj = JSON.parse(data);
                            if (data.length > 2) {
                                let arr = [];
                                obj.forEach(o => {
                                    arr.push("<li>" + o['Product']['name'] + '</li>');
                                })
                                searchWrapper.classList.add("active");
                                suggBox.innerHTML = arr.join('');
                                let allList = suggBox.querySelectorAll("li");
                                for (let i = 0; i < allList.length; i++) {
                                    allList[i].setAttribute("onclick", "select(this)");
                                }
                            }
                        });
                } else {
                    searchWrapper.classList.remove("active"); // hide autocomplete box
                }
            }

            function select(element) {
                inputBox.value = element.textContent;
                searchWrapper.classList.remove("active");
            }

            document.addEventListener("click", () => {
                searchWrapper.classList.remove("active");
            });
        </script>
    </div>