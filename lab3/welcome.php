<link rel="stylesheet" href="welcome.css" type="text/css">

<?php
function validator($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function nameValidator($data,$filterName,$placeHolderName){
    validator($data);
    if (empty($data)) {
        echo "Name  is required <br>";}
    else{
        $filterName = true;
        $placeHolderName = $data;
    }
    return [$data,$filterName,$placeHolderName];
}
function emailValidator($data, $filterEmail,$placeHolderEmail){
    validator($data);
    if (empty($data)) {
        echo "Email is required <br>";
    } else {
        if(filter_var($data, FILTER_VALIDATE_EMAIL) == false) {
            echo $data . ' is NOT a valid email address. <br>';}
        else{
            $filterEmail = true;
            $placeHolderEmail = $data;
        }
    }
    return [$data,$filterEmail,$placeHolderEmail];
}


$filterName = $filterEmail= false;
$placeHolderName = $placeHolderEmail = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    [$name,$filterName,$placeHolderName] = nameValidator($_POST["name"],$filterName,$placeHolderName);
    [$email,$filterEmail,$placeHolderEmail] = emailValidator($_POST["email"],$filterEmail,$placeHolderEmail);
}


// if ($_SERVER["REQUEST_METHOD"] == "GET") {
//     [$name,$filterName,$placeHolderName] = nameValidator($_GET["name"],$filterName,$placeHolderName);
//     [$email,$filterEmail,$placeHolderEmail] = emailValidator($_GET["email"],$filterEmail,$placeHolderEmail);
// }


if ($filterName && $filterEmail){
    echo "Naam: $name <br>"; 
    echo "E-mailadres: $email";
}
else{
    echo "
    <form id=form1' action='welcome.php' method='post'>
        Name: <input id='inputbox1' type='text' name='name'  value=$placeHolderName><br>
        E-mail: <input id='inputbox2' type='text' name='email' value=$placeHolderEmail><br>
        <input type='submit'>
    </form
    ";
}
?>

