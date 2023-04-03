<?php 
$errors = [];
$showForm = true;
function validator($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errors = [];
        foreach($_POST as $key => $value){
            if (empty($value)){
                $errors[$key] = "Can't be empty";
            } 
        }
        if (!$errors){
            $showForm = false;
        }
    }
?>



<?php 
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        $showForm = true;
    }
?>
    <main id="maincontainer">
        <h1 id="madlibdstext">Madlibs</h1>
            <nav class="navcontainer">
                <a class=links href="persoonlijkebrief.php">Persoonlijke brief</a>
                <a id="link2"  class=links href="dithebikvanhetinternet.php">Dit heb ik van het internet</a>
            </nav>
            <div id="formcontainer">
            <?php if ($showForm){
                ?>
                <form id="form1" action="persoonlijkebrief.php" method="post">
                    <div class="questions">
                        <label>Wat is je hobby?</label> 
                        <br>
                        <input type="text" name="question1" value="<?php echo isset($_POST['question1']) ? $_POST['question1'] : '' ?>">
                            <?php 
                            if(array_key_exists("question1", $errors) ){
                            ?> 
                            <label class="errors"> <?php $x = $errors['question1']; echo"$x"; ?></label>
                            <?php 
                            }else{
                            ?>
                            <label class="errors">*</label>
                            <?php }; ?>
                            <br>
                    </div>
                    <div class="questions">
                        <label>Wat doe je om te relaxen?</label>
                        <br>
                        <input type="text" name="question2" value="<?php echo isset($_POST['question2']) ? $_POST['question2'] : '' ?>">
                        <?php 
                            if(array_key_exists("question2", $errors) ){
                            ?> 
                            <label class="errors"> <?php $x = $errors['question2']; echo"$x"; ?></label>
                            <?php 
                            }else{
                            ?>
                            <label class="errors">*</label>
                            <?php }; ?>
                            <br>
                    </div>
                    <div class="questions">
                        <label>Wat eet je het liefste?</label> 
                        <br>
                        <input type="text" name="question3" value="<?php echo isset($_POST['question3']) ? $_POST['question3'] : '' ?>">
                        <?php 
                            if(array_key_exists("question3", $errors) ){
                            ?> 
                            <label class="errors"> <?php $x = $errors['question3']; echo"$x"; ?></label>
                            <?php 
                            }else{
                            ?>
                            <label class="errors">*</label>
                            <?php }; ?>
                            <br>
                    </div>
                    <div  class="questions">
                        <label>Wat is je favoriete sport?</label>
                        <br>
                        <input type="text" name="question4" value="<?php echo isset($_POST['question4']) ? $_POST['question4'] : '' ?>"> 
                        <?php 
                            if(array_key_exists("question4", $errors) ){
                            ?> 
                            <label class="errors"> <?php $x = $errors['question4']; echo"$x"; ?></label>
                            <?php 
                            }else{
                            ?>
                            <label class="errors">*</label>
                            <?php }; ?>
                            <br>
                    </div>
                    <div class="questions">
                        <label>Wat is een dierbaar familie lid?</label>
                        <br>
                        <input type="text" name="question5" value="<?php echo isset($_POST['question5']) ? $_POST['question5'] : '' ?>"> 
                            <?php 
                                if(array_key_exists("question5", $errors) ){
                                ?> 
                                <label class="errors"> <?php $x = $errors['question5']; echo"$x"; ?></label>
                                <?php 
                                }else{
                                ?>
                                <label class="errors">*</label>
                                <?php }; ?>
                                <br>
                    </div>
                    <div class="questions">
                    <label>Waar wil je heen op vakantie? </label>
                    <br>
                    <input type="text" name="question6" value="<?php echo isset($_POST['question6']) ? $_POST['question6'] : '' ?>"> 
                        <?php 
                            if(array_key_exists("question6", $errors) ){
                            ?> 
                            <label class="errors"> <?php $x = $errors['question6']; echo"$x"; ?></label>
                            <?php 
                            }else{
                            ?>
                            <label class="errors">*</label>
                            <?php }; ?>
                            <br>
                    </div>
                    <input type="submit">
                </form>
            <?php
                }else{
            ?>
            <h1>Persoonlijke brief </h1>

            <?php
            echo"<p>
            Om goed te worden in ". $_POST["question1"] . " heb je veel tijd nodig! Gelukkig kan je in je vrije tijd " . $_POST["question2"] . " om te relaxen.
            Vergeet niet dat je ook goed moet eten! Ik raad " . $_POST["question3"] . " aan. Geen zorgen als je goed kan " . $_POST["question4"] . " dan hoef je niet aan de lijn. " .
            "Je kan het vast goed met je " . $_POST["question5"] ." " . $_POST["question4"]. " doen. En anders kan je altijd met ze tweeën naar ". $_POST["question6"]. ".".
            "</p>";
                }
            ?>
            </div>
    </main>
<body>
</html>