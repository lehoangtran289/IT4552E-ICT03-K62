<?php
    session_start();

    class UsersController extends VanillaController {

//    function index() {
//        $this->Category->orderBy('brand', 'ASC');
//        $this->Category->showHasOne();
//        $this->Category->showHasMany();
////            $this->Category->where('parent_id', '0');
//        $categories = $this->Category->search();
//        $this->set('categories', $categories);
//    }

        function beforeAction() {
//
        }

        function afterAction() {

        }

        function login() {
//            if(isset($_COOKIE['username']) && isset($_COOKIE['token']))
//            {
//
//            }
            if($_SESSION['user']['role'] == 'user')
                header('Location: '. BASE_PATH);
            else if($_SESSION['user']['role'] == 'admin')
                header('Location: '.BASE_PATH.'/admin/index');
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $rememberMe = $_POST['rememberMe'];
                if ($username == '' || $password == '') {
                    echo 'Please fill in all blank!';
                } else {
                    $this->User->where('username', $username);
                    $user = $this->User->search($username)[0]['User'];

                    if(!password_verify($password, $user['password'] )) unset($user);
                    if ($user) {
                        unset($_SESSION['user']);
                        // save username to session
                        $_SESSION['user']['username'] = $username;
                        $_SESSION['user']['role'] = $user['role'];
                        $_SESSION['user']['id'] = $user['id'];

//                        //generate token for cookie
//                        $randomVal = mt_rand();
//                        $insertString = "INSERT INTO tokens(username, tokens) values ('".$username."','".$randomVal.")";
//                        $this->User->custom($insertString);
//                        setcookie("username", $username);
//                        setcookie("token",$randomVal);

                        // authorization
                        if($user['role'] == 'user')
                        {
                            echo '<script>localStorage.setItem("isLoggedIn", "user")</script>';
                            echo '<script>location.href = "' . BASE_PATH. '/carts/index' .'"</script>';
                        }
                        else if($user['role'] == 'admin')
                        {
                            echo '<script>localStorage.setItem("isLoggedIn", "admin")</script>';
                            echo '<script>location.href = "' . BASE_PATH. '/admin/index' .'"</script>';
                        }

                    } else echo "<script>alert('Username or password incorrect !')</script>";
                    $this->set('user', $user); // maybe dont need this
                }
            }
        }

        function logout() {
            if (isset($_SESSION['user']))
            {
                unset($_SESSION['user']);
                unset($_SESSION['cart']);
            }

//                redirectAction('products','index',array());
            echo '<script>localStorage.setItem("isLoggedIn", "none")</script>';
            echo '<script>location.href = "' . BASE_PATH .'"</script>';
        }


        function register() {
            if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['email']) && isset($_POST['name']))
            {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                if ($username == '' || $password == '' || $name == '' || $email == '' || $phone == '' || $address == '') {
                    echo 'Please fill in all blank';
                } else {
                    // Check if there exists an account
                    $this->User->where('username', $username);
                    if ($this->User->search($username)) {
                        echo '<script>alert("Username already exist")</script>';
                    } else {
                        $this->User->id = NULL;
                        $this->User->username = $username;
                        $this->User->password = password_hash($password, PASSWORD_BCRYPT);
                        $this->User->email = $email;
                        $this->User->phone = $phone;
                        $this->User->name = $name;
                        $this->User->address = $address;
                        $this->User->save();
                        header('Location: '.BASE_PATH.'/users/login');
                    }
                }
            }
        }

        function update()
        {
            if(!isset($_SESSION['user']))
                header('Location: '.BASE_PATH.'/users/login');
            $this->User->where('username', $_SESSION['user']['username']);
            $currentUser = $this->User->search($_SESSION['user']['username'])[0]['User'];
            $this->set('currentUser', $currentUser);
            if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['email']) && isset($_POST['name']))
            {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                if ($username == '' || $password == '' || $name == '' || $email == '' || $phone == '' || $address == '') {
                    echo 'Please fill in all blank';
                } else {
                    // Check if there exists an account
                    $this->User->where('username', $username);
                    $user = $this->User->search($username)[0]['User'];

                    if ($user && $user['username'] != $_SESSION['user']['username']) {
                        echo '<script>alert("You can\'t change to that username, that username already exists");</script>';
                    } else {
                        $this->User->id = $currentUser['id'];
                        $this->User->username = $username;
                        $this->User->password = password_hash($password, PASSWORD_BCRYPT);
                        $this->User->email = $email;
                        $this->User->phone = $phone;
                        $this->User->name = $name;
                        $this->User->address = $address;
                        $this->User->save();
                        $_SESSION['user']['username'] = $username;
                            header('Location: '.BASE_PATH.'/users/update');  // redirect to update
                    }

                }
            }

        }

        function findAll() {
            return $this->User->search();
        }

        function findById($id = '') {
            if ($id != '') {
                $this->User->where('id', $id);
                return $this->User->search();
            }
        }
    }