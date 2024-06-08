<?php
session_start();

$_dbHost = "localhost";
$_dbUser = "root";
$_dbPassword = "";

$_dbName = "lusamarket";

$_conn= mysqli_connect($_dbHost, $_dbUser, $_dbPassword, $_dbName);

if (!$_conn) {

    echo "Connection Failed";

}

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['postal_code']) && isset($_POST['city']) && isset($_POST['country']) && isset($_POST['password']) && isset($_POST['phone_code']) && isset($_POST['phone_number'])) {
    
    function validate($data) {

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $postal_code = $_POST['postal_code'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $password = $_POST['password'];
    $phone_code = $_POST['phone_code'];
    $phone_number = $_POST['phone_number'];
    
    $name = filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $address = filter_var($address, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $city = filter_var($city, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $country = filter_var($country, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $phone_number = filter_var($phone_number, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $passwordFilter = '/^(?=.*[!@#$%^&*.-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{8,20}$/';
    $onlyNumbersNTel = '/^(?=(255|96|92|91|93))[0-9]{9}$/';
    $onlyTextMin3 = '/^(?=.*[A-Z])(?=.*[a-z]).{3,20}$/';

    if (empty($name)) {
        header("Location: ../pages/registerPage.php?error=Nome é obrigatório");
        exit();
    } else if (empty($email)) {
        header("Location: ../pages/registerPage.php?error=Email é obrigatório");
        exit();
    } else if (empty($address)) {
        header("Location: ../pages/registerPage.php?error=Morada é obrigatória");
        exit();
    } else if (empty($postal_code)) {
        header("Location: ../pages/registerPage.php?error=Código Postal é obrigatório");
        exit();
    } else if (empty($city)) {
        header("Location: ../pages/registerPage.php?error=Cidade é obrigatória");
        exit();
    } else if (empty($country)) {
        header("Location: ../pages/egisterPage.php?error=País é obrigatório");
        exit();
    } else if (empty($password)) {
        header("Location: ../pages/registerPage.php?error=Palavra-passe é obrigatória");
        exit();
    } else if (empty($phone_code)) {
        header("Location: ../pages/registerPage.php?error=Código do País é obrigatório");
        exit();
    } else if (empty($phone_number)) {
        header("Location: ../pages/registerPage.php?error=Número de Telemóvel é obrigatório");
        exit();
    } else {
        if (!preg_match($passwordFilter, $password)) {
            header("Location: ../pages/registerPage.php?error=Palavra-passe deve conter pelo menos 8 caracteres, um caracter especial, um número, uma letra maiúscula e uma letra minúscula");
            exit();
        } else if (!preg_match($onlyNumbersNTel, $phone_number)) {
            header("Location: ../pages/registerPage.php?error=Número de Telemóvel inválido");
            exit();
        } else if (!preg_match($onlyTextMin3, $name)) {
            header("Location: ../pages/registerPage.php?error=Nome inválido");
            exit();
        } else {
            $queryCheckEmail = "SELECT * FROM users WHERE email='$email'";
            $resultCheckEmail = mysqli_query($_conn, $queryCheckEmail);
            $queryCheckPhoneNumber = "SELECT * FROM users WHERE phone_number='$phone_number'";
            $resultCheckPhoneNumber = mysqli_query($_conn, $queryCheckPhoneNumber);
            if (mysqli_num_rows($resultCheckEmail) > 0) {
                header("Location: ../pages/registerPage.php?error=Email já registado");
                exit();
            } else if (mysqli_num_rows($resultCheckPhoneNumber) > 0) {
                header("Location: ../pages/registerPage.php?error=Número de Telemóvel já registado");
                exit();
            } else {
                $hashedPassword = md5($password);
                $query = "INSERT INTO users (name, email, password, address, postal_code, city, country, phone_number, phone_code, role) VALUES ('$name', '$email', '$hashedPassword', '$address', '$postal_code', '$city', '$country', '$phone_number', '$phone_code', 1)";
                $result = mysqli_query($_conn, $query);
                if ($result) {
                    header("Location: ../pages/loginPage.php?success=Conta criada com sucesso");
                    exit();
                } else {
                    header("Location: ../pages/registerPage.php?error=Erro ao registar utilizador");
                    exit();
                }
            }
        }
    }
    
} else {

    echo "Erro ao registar utilizador";
}