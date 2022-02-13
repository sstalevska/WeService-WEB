<?php
require_once('./inc/common.php');

/**
 * Is the user submitted the form, fetch the user with those credentials.
 */
if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
	$sql = '
		select reviewer_id, reviewer_name
		from reviewer
		where reviewer_email = :email and reviewer_password = :password';
	$stm = $conn->prepare($sql);
	$stm->execute([
		':email' => strip_tags($_REQUEST["email"]),
		':password' => strip_tags($_REQUEST["password"]),
	]);
	$user = $stm->fetch();

	/**
	 * If such user exists, create a temporary session (i.e. log the user in) and redirect to the Home page with the appropriate message.
	 */
	if ($user) {
		$_SESSION['is_reviewer'] = true;
		$_SESSION['reviewer_id'] = $user['reviewer_id'];
		$_SESSION['reviewer_name'] = $user['reviewer_name'];
		header('Location: /?msg=logged_in');
		exit;
	} else {
		/**
		 * If the credentials are not correct, still render the login form, but display an error message. For increased security, do not inform the user whether the email or password is incorrect.
		 */
		$err = 'The provided credentials are incorrect.';
	}
}

$pageTitle = 'Sign in';
$pageSlug = 'login';

require_once('./inc/head.php');
require_once('./inc/header.php');
?>
<div class="container">
	<h1 class="mt-5 text-center"><?= $pageTitle ?></h1>

	<div class="row justify-content-center mt-5">
		<div class="col-md-8 col-lg-6 col-xl-5">
			<div class="card shadow-sm p-3">
				<?php if ((isset($err)) && (! empty($err))) { ?>
					<div class="alert alert-danger" role="alert"><?= $err ?></div>
				<?php } ?>

				<form action="?" method="POST">
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<input type="email" id="email" name="email" class="form-control" value="<?= (isset($_REQUEST["email"])) ? strip_tags($_REQUEST["email"]) : '' ?>" aria-describedby="emailHelp" required>
						<div id="emailHelp" class="form-text">Enter your email address.</div>
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Password</label>
						<input type="password" id="password" name="password" class="form-control" minlength="2" required>
					</div>
					<button type="submit" class="btn btn-success">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
require_once('./inc/footer.php');
