<?php


class UserController
{
    public function __construct()
    {
        require_once("models/User.php");
    }

    public function showLogin()
    {
        require_once("views/user/user_login.php");

    }

    public function showRegister()

    {
        require_once ("views/user/user_register.php");
    }

    public function showUpdate()
    {
        $user = new User();
        $user->find($_SESSION['user']);
        require_once ("views/user/user_update.php");
    }

    public function login()
    {

        $model = new User();

        $email = $_POST['email'];
        $pass = $_POST['password'];

        try {
            $user = $model->get('email', $email);

            if (password_verify($pass, $user->password_hash)) {
                $_SESSION['user'] = $user->data();
                var_dump($_SESSION['user']);
                $_SESSION['message'] = 'Welcome!';

                header("Location: ?p=user/profile", 301);
            } else {
                echo 'pogresna lozinka!';
            }

        } catch (Exception $exception) {
            echo "Error login. User not found!";
        }
    }

    public function profile()
    {
        if (isset($_SESSION['user'])) {
            $user = new User();
            $user->find($_SESSION['user']['id']);

            require_once("views/user/user_profile.php");
        } else {
            header("Location: ?p=user/showLogin", 301);
        }
    }


    public function register()
    {
        if ($_POST['password'] == $_POST['password_repeat']) {

            $user = new User();

            $user->name = $_POST['name'];
            $user->username = $_POST['username'];
            $user->email = $_POST['email'];
            $user->password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $_SESSION['message'] = ' Register success! Please Log In.';

            $user->insert();

            header("Location: ?p=user/showLogin", 301);
        }
    }


    public function update()
    {
        $user = new User();
        $user->find($_SESSION['user']['id']);

        if (isset($_POST['name'])) $user->name = $_POST['name'];
        if (isset($_POST['username'])) $user->username = $_POST['username'];
        if (isset($_POST['email'])) $user->email = $_POST['email'];
        if (isset($_POST['password'])) {
            if ($_POST['password'] == $_POST['password_repeat']) {
                $user->password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
            }
        }
        $_SESSION['message'] = 'Update success!';

        $user->update();
        header("Location: ?p=user/profile", 301);

    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            session_destroy();
            header("Location: ?p=user/showLogin", 301);
        }
    }

    public function delete()
    {
        $user = new User();
        $user->find($_SESSION['user']['id']);

        $user->delete();

        $this->logout();
    }
}