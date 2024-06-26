<?php
session_start();
include '../config.php';

$_dbHost = "localhost";
$_dbUser = "root";
$_dbPassword = "";

$_dbName = "lusamarket";

$_conn= mysqli_connect($_dbHost, $_dbUser, $_dbPassword, $_dbName);

if (!$_conn) {

    echo "Connection Failed";

}

if (isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data) {

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $passwordFilter = '/^(?=.*[!@#$%^&*.-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{8,20}$/';

    if (empty($email)) {
        header("Location: " . PAGES_URL . "authentication/loginPage.php?error=Não preencheu o Email");
        exit();
    } else if (empty($password)) {
        header("Location: " . PAGES_URL . "authentication/loginPage.php?error=Não preencheu a Password");
        exit();
    } else {
        if (!preg_match($passwordFilter, $password)) {
            header("Location: " . PAGES_URL . "authentication/loginPage.php?error=Palavra-passe inválida");
            exit();
        }

        $hashedPassword = md5($password);
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$hashedPassword'";
        $result = mysqli_query($_conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $email && $row['password'] === $hashedPassword) {
                if ($row['role'] == 1){
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['address'] = $row['address'];
                    $_SESSION['postal_code'] = $row['postal_code'];
                    $_SESSION['city'] = $row['city'];
                    $_SESSION['country'] = $row['country'];
                    $_SESSION['phone_code'] = $row['phone_code'];
                    $_SESSION['phone_number'] = $row['phone_number'];
                    $_SESSION['profile_pic'] = $row['profile_pic'];
                    $_SESSION['role'] = $row['role'];

                    header("Location: " . PAGES_URL . "user/loggedPage.php");
                    exit();
                } else if ($row['role'] == 2) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['address'] = $row['address'];
                    $_SESSION['postal_code'] = $row['postal_code'];
                    $_SESSION['city'] = $row['city'];
                    $_SESSION['country'] = $row['country'];
                    $_SESSION['phone_code'] = $row['phone_code'];
                    $_SESSION['phone_number'] = $row['phone_number'];
                    $_SESSION['profile_pic'] = $row['profile_pic'];
                    $_SESSION['role'] = $row['role'];

                    header("Location: " . PAGES_URL . "affiliate/affiliatePage.php");
                    exit();
                } else if ($row['role'] == 3) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['address'] = $row['address'];
                    $_SESSION['postal_code'] = $row['postal_code'];
                    $_SESSION['city'] = $row['city'];
                    $_SESSION['country'] = $row['country'];
                    $_SESSION['phone_code'] = $row['phone_code'];
                    $_SESSION['phone_number'] = $row['phone_number'];
                    $_SESSION['profile_pic'] = $row['profile_pic'];
                    $_SESSION['role'] = $row['role'];

                    header("Location: " . PAGES_URL . "seller/sellerPage.php");
                    exit();
                } else {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['address'] = $row['address'];
                    $_SESSION['postal_code'] = $row['postal_code'];
                    $_SESSION['city'] = $row['city'];
                    $_SESSION['country'] = $row['country'];
                    $_SESSION['phone_code'] = $row['phone_code'];
                    $_SESSION['phone_number'] = $row['phone_number'];
                    $_SESSION['profile_pic'] = $row['profile_pic'];
                    $_SESSION['role'] = $row['role'];

                    header("Location: " . PAGES_URL . "admin/adminPage.php");
                    exit();
                }
            }
        }
    }
}