<?php
include("common/head.inc.php");
include("common/nav.inc.php");
?>

<section>
	<form method="POST" action="login.php" class="d-flex flex-column align-items-center">
		<input type="text" name="username" placeholder="Felhasználónév">
		<input type="password" name="password" placeholder="Jelszó">
		<input type="submit" value="Belépés" class="btn btn-success">
		<?php echo $valasz; ?>
	</form>
</section>

<?php include("common/footer.inc.php"); ?>