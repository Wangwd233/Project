<?php

// add in error reporting
ini_set("display_errors", "On");
ini_set("html_errors", 0);
error_reporting(-1);

include "api_functions.inc.php";

$serverAddress = "https://snappy-vim-328403.ts.r.appspot.com/";
//$serverAddress = "http://localhost:3000/";

// Sends POST request to create member then call loginMember function to log newly created member in
function createMember($name, $email, $username, $memberType, $city, $state, $country, $pwd)
{
    // Data to be sent to the POST request
    $data = array(
        "name" => $name,
        "email" => $email,
        "username" => $username,
        "memberType" => $memberType,
        "city" => $city,
        "state" => $state,
        "country" => $country,
        "balance" => 0,
        "footprint" => 0,
        "password" => $pwd
    );

    // Sends create member POST request to the server to create member
    postRequest("{$GLOBALS["serverAddress"]}api/v1/member", $data);

    // Once member is created, log the user in
    loginMember($email, $pwd);
}

// Sends POST request to log member in
function loginMember($email, $pwd)
{
    // Data to be sent to the POST request
    $data = array(
        "email" => $email,
        "password" => $pwd
    );
    // Log user in via POST request
    $loginResults = json_decode(postRequest("{$GLOBALS["serverAddress"]}api/v1/member/login", $data), true);

    // If POST request is successful, start a session and log the user in
    if (isset($loginResults)) {
        session_destroy();
        session_start();

        $_SESSION["userid"] = $loginResults["id"];
        $_SESSION["username"] = $loginResults["username"];
        $_SESSION["email"] = $loginResults["email"];
        $_SESSION["jwt_token"] = $loginResults["token"];

        header("location: ../index.php");
        exit();
    } else {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
}

// Sends POST request to get a members username from an address
function retrieveUsernameFromAddress($data)
{
    $username = json_decode(postRequest("{$GLOBALS["serverAddress"]}api/v1/username", $_SESSION["jwt_token"], $data), true);
    return $username;
}

// Sends PATCH request to update members details (name, city, state, country)
function updateMember($name, $city, $state, $country)
{
    // Data to be sent to the PATCH request
    $data = array(
        "name" => $name,
        "email" => $_SESSION["email"],
        "username" => $_SESSION["username"],
        "city" => $city,
        "state" => $state,
        "country" => $country
    );

    // Update member details using PATCH request
    patchRequest("{$GLOBALS["serverAddress"]}api/v1/member", $data, $_SESSION["jwt_token"]);

    // Load the page with updated data
    header("location: ../view_update.php?error=none");
    exit();
}

// Sends GET request to get the current logged in members details (id, name, email, username...)
function getMemberDetails()
{
    return json_decode(getRequest("{$GLOBALS["serverAddress"]}api/v1/member", $_SESSION["jwt_token"]), true);
}

// Sends GET request to get the current logged in members mnemonic pass phrase
function getMnemonicPhrase()
{
    return json_decode(getRequest("{$GLOBALS["serverAddress"]}api/v1/member/walletphrase", $_SESSION["jwt_token"]), true);
}

// Sends GET request to get the current logged in members public address
function getPublicAddress()
{
    return json_decode(getRequest("{$GLOBALS["serverAddress"]}api/v1/member/address", $_SESSION["jwt_token"]), true);
}

// Sends GET request to get the current logged in transaction history
function getTransactions()
{
    return json_decode(getRequest("{$GLOBALS["serverAddress"]}api/v1/member/transactions", $_SESSION["jwt_token"]), true);
}

// Sends DELETE request to delete the current logged in user
function deleteMember()
{
    return deleteRequest("{$GLOBALS["serverAddress"]}api/v1/member", $_SESSION["jwt_token"]);
}

// Checks if login fields are empty
function emptyInputLogin($username, $pwd)
{
    if (empty($username) || empty($pwd)) {
        return true;
    } else {
        return false;
    }
}

// Checks if signup fields are empty
function emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat)
{
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat)) {
        return false;
    } else {
        return false;
    }
}

// Checks for invalid characters
function invalidUid($username)
{
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        return true;
    } else {
        return false;
    }
}

// Checks for valid email address
function invalidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

// Checks if both password fields are matching
function pwdMatch($pwd, $pwdrepeat)
{
    if ($pwd !== $pwdrepeat) {
        return true;
    } else {
        return false;
    }
}

// Checks if a user with username or email exists in the database, returns users table if it exists, else returns false
function uidExists($conn, $username, $email)
{
    $sql = "SELECT * FROM members WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

// Checks for empty fields
function emptyField($content)
{
    if (empty($content)) {
        return true;
    } else {
        return false;
    }
}
