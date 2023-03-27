<?php
function validator($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = validator($_POST["name"]);
    $email = validator($_POST["email"]);
}


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $name = validator($_GET["name"]);
    $email = validator($_GET["email"]);
}

echo "Naam: $name <br>"; 
echo "E-mailadres: $email";
?>