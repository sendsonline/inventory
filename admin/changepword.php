<?php 
session_start();
if(!isset($_SESSION['id'])){
    header('location:../index.php');
}
include '../header.php'; ?>
<?php $id = $_GET['id'] ?>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4 class="text-center">Change Pword</h4>
			</div>
			<div class="panel-body">
				<form action="<?= URL ?>functions/changepword.php" id="changeForm" method="POST">
					<p><input type="hidden" name="id" value="<?= $id ?>"></p>
					<label>Your old password</label>
					<p><input type="password" name="oldpword" class="form-control" placeholder="Your old password.." required></p>
					<h6 class="errormsg old"></h6>
					<label>Your new password</label>
					<p><input type="password" name="newpword" class="form-control" placeholder="Your new password.." required></p>
					<h6 class="errormsg new"></h6>
					<label>Confirm password</label>
					<p><input type="password" name="confpword" class="form-control" placeholder="Confirm password.." required></p>
					<h6 class="errormsg conf"></h6>
					<p align="right"><input type="button" name="change" value="Change Password" class="btn btn-sm btn-primary btn-change"></p>
				</form>
				
			</div>
		</div>
	</div>
	<div class="col-md-4"></div>
</div>


<?php include('../footer.php') ?>