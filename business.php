<?php
require_once('./inc/common.php');

/**
 * Check whether the required parameter ID is sent. Go back with an error message if not.
 */
if ((! isset($_GET['id'])) || (empty($_GET['id'])) || (! is_numeric($_GET['id']))) {
	header('Location: /businesses.php?err=no_id');
	exit();
}
$business_id = $_GET['id'];

/**
 * Get the name of this business (needed for the page title).
 */
$sql = 'SELECT business_name FROM business WHERE business_id = :id';
$stm = $conn->prepare($sql);
$stm->execute([':id' => $business_id]);
$business_name = $stm->fetch()[0];
/**
 * Go back with an error message if the business with this id does not exist.
 */
if (empty($business_name)) {
	header('Location: /businesses.php?err=bad_id');
	exit();
}

$pageTitle = 'Business: ' . $business_name;
$pageSlug = 'businesses';

require_once('./inc/head.php');
require_once('./inc/header.php');
?>
<div class="container">
	<h1 class="mt-5"><?= $business_name ?></h1>

	<?php require_once('./inc/alerts-msg.php'); ?>

	<?php
	/**
	 * Fetch the details of the business with the given business id.
	 */
	$sql = '
		select
			b.business_name,
			(
				select avg(r.review_stars)
				from review r
				where r.business_id = b.business_id
			) as business_avg_stars,
			c.category_name,
			b.business_hours,
			b.business_descr,
			b.business_phone
		from
			business b
		join category c on
			b.category_id = c.category_id
		where
			b.business_id = :id';
	$stm = $conn->prepare($sql);
	$stm->execute([':id' => $business_id]);
	$business = $stm->fetch();

	/**
	 * Fetch all services that this business offers and concatenate them in a single string.
	 */
	$sql = '
		select
			string_agg(s.service_name, \'; \') as services
		from
			business_service bs
		join service s on
			bs.service_id = s.service_id
		where business_id = :id';
	$stm = $conn->prepare($sql);
	$stm->execute([':id' => $business_id]);
	$services = $stm->fetch()[0];
	?>
	<div class="row">
		<div class="col-md-6">
			<?= outputStars($business['business_avg_stars'], 48) ?>

			<div class="lead my-3"><strong>Category:</strong> <?= $business['category_name'] ?></div>

			<div class="fw-light my-3"><strong>Service(s):</strong> <?= $services ?></div>

			<div class="fw-light my-3"><strong>Description:</strong> <?= $business['business_descr'] ?></div>
		</div>
		<div class="col-md-6">
			<div class="fw-light my-3"><strong>Phone:</strong> <?= $business['business_phone'] ?></div>

			<div class="fw-light my-3"><strong>Work hours:</strong> <?= $business['business_hours'] ?></div>

			<div class="fw-light my-3">
				<strong>Address(es):</strong>
				<ul>
					<?php
					/**
					 * Get all addresses of this business and display them in a list.
					 */
					$sql = '
						select
							address_id,
							address_street,
							address_postal_code,
							address_city
						from address
						where business_id = :id';
					$stm = $conn->prepare($sql);
					$stm->execute([':id' => $business_id]);
					$addresses = $stm->fetchAll();
					foreach ($addresses as $row) {
					?>
						<li>
							<?= $row['address_street'] ?><br>
							<?= $row['address_postal_code'] . ' ' . $row['address_city'] ?>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>

	<hr class="my-5">

	<h3>Reviews</h3>

	<?php
	/**
	 * Get all reviews for this business and display them in a list.
	 */
	$sql = '
		select
			r.reviewer_name,
			r.reviewer_verified,
			rv.review_title,
			rv.review_text,
			rv.review_stars,
			rv.address_id,
			rv.review_timestamp
		from review rv
		join reviewer r on
			rv.reviewer_id = r.reviewer_id
		where
			rv.business_id = :id
		order by
			rv.review_timestamp';
	$stm = $conn->prepare($sql);
	$stm->execute([':id' => $business_id]);
	$reviews = $stm->fetchAll();
	foreach ($reviews as $row) {
	?>
		<div class="card shadow-sm mb-3">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-8">
						<h5 class="card-title">
							<?= $row['reviewer_name'] ?>
							<?php if ($row['reviewer_verified']) {
								echo '<small class="ms-5 text-success"><small>✅ Verified</small></small>';
							} else {
								echo '<small class="ms-5 text-muted"><small><span class="opacity-25">☑️</span> Not verified</small></small>';
							} ?>
						</h5>
					</div>
					<div class="col-lg-4 text-lg-end"><?= outputStars($row['review_stars'], 24) ?></div>
				</div>

				<div class="card-text">
					<div class="lead fw-bold"><?= $row['review_title'] ?></div>
					<div class="mb-3"><?= $row['review_text'] ?></div>
					<?php
					$aid = $row['address_id'];
					$location = array_values(array_filter($addresses, function($item) use ($aid) {
						return $item[0] == $aid;
					}))[0];
					?>
					<div class="text-muted"><small><strong>Location:</strong> <?= $location[1] . ', ' . $location[2] . ' ' . $location[3] ?></small></div>
					<div class="text-muted"><small><strong>Reviewed at:</strong> <?= date('d.m.Y H:i', strtotime($row['review_timestamp'])) ?></small></div>
				</div>
			</div>
		</div>
	<?php } ?>

	<?php
	/**
	 * If the person viewing this page is logged in as a reviewer, display a form from where
	 * the reviewer can add a review.
	 */
	?>
	<?php if (isset($_SESSION['is_reviewer'])) { ?>
		<hr id="add-review" class="my-5">

		<h3 class="text-center pt-3">Add review</h3>

		<div class="row justify-content-center mt-3">
			<div class="col-md-8 col-lg-6 col-xl-5">
				<div class="card shadow-sm p-3">
					<?php require_once('./inc/alerts-err.php'); ?>

					<form action="review-add.php" method="POST">
						<input type="hidden" name="business" value="<?= $business_id ?>">
						<div class="mb-3">
							<label class="form-label">Location</label>
							<div>
								<?php foreach ($addresses as $i => $row) { ?>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="address" id="address<?= $i ?>" value="<?= $row['address_id'] ?>" <?= ($i == 0) ? 'checked' : '' ?>>
										<label class="form-check-label" for="address<?= $i ?>"><?= $row['address_street'] . ', ' . $row['address_postal_code'] . ' ' . $row['address_city'] ?></label>
									</div>
								<?php } ?>
							</div>
						</div>
						<div class="mb-3">
							<label class="form-label">Star rating</label>
							<div>
								<?php for ($i = 1; $i < 6; $i++) { ?>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="rating" id="rating<?= $i ?>" value="<?= $i ?>" <?= ($i == 3) ? 'checked' : '' ?>>
										<label class="form-check-label" for="rating<?= $i ?>"><?= $i ?></label>
									</div>
								<?php } ?>
							</div>
						</div>
						<div class="mb-3">
							<label for="title" class="form-label">Review title</label>
							<input type="text" id="title" name="title" class="form-control" minlength="2" maxlength="150" value="<?= (isset($_REQUEST["title"])) ? strip_tags($_REQUEST["title"]) : '' ?>" required>
						</div>
						<div class="mb-3">
							<label for="text" class="form-label">Your review</label>
							<textarea id="text" name="text" class="form-control" rows="7" minlength="2" maxlength="1000" required><?= (isset($_REQUEST["title"])) ? strip_tags($_REQUEST["title"]) : '' ?></textarea>
						</div>
						<button type="submit" class="btn btn-success">Submit</button>
					</form>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<?php
require_once('./inc/footer.php');
