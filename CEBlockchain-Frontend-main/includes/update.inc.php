<?php

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $country = $_POST["country"];

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    $userData = getMemberDetails();

    if (empty($name) && empty($city) && empty($state) && empty($country)) {
        header("location: ../view_update.php?error=emptyinput");
        exit();
    }

    if (invalidUid($username)) {
        header("location: ../signup.php?error=invaliduid");
        exit();
    }

    if (empty($name)) {
        $name = $userData["name"];
    }
    if (empty($city)) {
        $city = $userData["city"];
    }
    if (empty($state)) {
        $state = $userData["state"];
    }
    if (empty($country)) {
        $country = $userData["country"];
    }

    updateMember($name, $city, $state, $country);
} elseif (isset($_POST["delete"])) {
    require "functions.inc.php";

    deleteMember();
    header("location: ../includes/logout.inc.php");
    exit();
} else {
    header("location: ../view_update.php");
    exit();
}
