<?php


if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $memberType = $_POST["memberType"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $country = $_POST["country"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    if (emptyInputSignup($name, $email, $username, $memberType, $city, $state, $country, $pwd, $pwdrepeat)) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidEmail($email)) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if (invalidUid($username)) {
        header("location: ../signup.php?error=invaliduid");
        exit();
    }


    if (pwdMatch($pwd, $pwdrepeat)) {
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }

    /*if (uidExists($conn, $username, $email)) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }*/


    createMember($name, $email, $username, $memberType, $city, $state, $country, $pwd);
} else {
    header("location: ../signup.php?error=none");
    exit();
}
