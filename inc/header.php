<?php
/**
 * The navigation menu, included in multiple pages.
 */
?>
<nav class="navbar sticky-top navbar-expand-md navbar-light bg-light shadow-sm border-bottom">
	<div class="container">
		<a class="navbar-brand" href="/">
			<img src="/img/logo.png" alt="WeService" height="41.5">
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav me-auto">
				<li class="nav-item">
					<a class="nav-link <?= ($pageSlug == 'home') ? 'active" aria-current="page' : ''?>" href="/">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= ($pageSlug == 'categories') ? 'active" aria-current="page' : ''?>" href="/categories.php">Categories</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= ($pageSlug == 'services') ? 'active" aria-current="page' : ''?>" href="/services.php">Services</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= ($pageSlug == 'businesses') ? 'active" aria-current="page' : ''?>" href="/businesses.php">Businesses</a>
				</li>
			</ul>
			<ul class="navbar-nav">
				<?php if (isset($_SESSION['is_reviewer'])) { ?>
					<li class="nav-item">
						<a class="nav-link disabled">Hi, <strong class="mr-3"><?= $_SESSION['reviewer_name'] ?></strong></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/logout.php">Log out</a>
					</li>
				<?php } else { ?>
					<li class="nav-item">
						<a class="nav-link <?= ($pageSlug == 'login') ? 'active" aria-current="page' : ''?>" href="/login.php">Sign in</a>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>
<main class="pb-5">