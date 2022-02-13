<?php
require_once('./inc/common.php');

$pageTitle = 'Welcome';
$pageSlug = 'home';

require_once('./inc/head.php');
require_once('./inc/header.php');
?>
<div class="container">
	<h1 class="mt-5">WeService</h1>

	<?php require_once('./inc/alerts-msg.php'); ?>

	<p class="lead mb-4">Welcome to WeService, your online source of business reviews. Please select to search by category, service type or business, by clicking the corresponding button below.</p>

	<p class="text-center">
		<a href="/categories.php" class="btn btn-primary">Categories</a>
		<a href="/services.php" class="btn btn-primary">Services</a>
		<a href="/businesses.php" class="btn btn-primary">Businesses</a>
	</p>
	
	<br>

	<hr>
	
	<h2 class="text-center">Analytics</h2>
	
	<div class="row">
		<div class="col-11">
			<h4>Average stars for all the businesses in a category, by yearly quarters</h4>
		</div>
		<div class="col-1 text-end">
			<a href="/analytics-1.php" class="btn btn-success">View</a>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-11">
			<h4>Number of reviews left by reviewers, by yearly quarters</h4>
		</div>
		<div class="col-1 text-end">
			<a href="/analytics-2.php" class="btn btn-success">View</a>
		</div>
	</div>
</div>
<?php
require_once('./inc/footer.php');
