<?php 
if (!empty($_POST['login'])) {
    $login =$loginBack->login();
}
?>

<main>
<form action="" method="post" name="login">
<input type="text" name="pseudo" id="">
<input type="password" name="password" id="">
<button type="submit" name="submit" >Valider</button>

</form>
<?php 

?>
</main>