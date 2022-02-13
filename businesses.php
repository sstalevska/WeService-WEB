<?php
require_once('./inc/common.php');

$pageTitle = 'Businesses';
$pageSlug = 'businesses';

require_once('./inc/head.php');
require_once('./inc/header.php');
?>
<div class="container">
	<h1 class="mt-5"><?= $pageTitle ?></h1>

	<?php require_once('./inc/alerts-err.php'); ?>

	<p class="lead mb-4">This is a list of all businesses. Select a business to view its details.</p>

	<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
		<?php
		$i = 0;
		/**
		 * Fetch all businesses and display them in a list as cards.
		 */
		$sql = '
			select
				b.business_id,
				b.business_name,
				(
					select avg(r.review_stars)
					from review r
					where r.business_id = b.business_id
				) as business_avg_stars,
				c.category_id,
				c.category_name,
				(
					select string_agg(a.address_city, \'; \') as address_city
					from address a
					where a.business_id = b.business_id
					limit 1
				) as address_city
			from business b
			join category c on
				b.category_id = c.category_id
			order by b.business_name';
		foreach ($conn->query($sql) as $row) {
			$i++;
		?>
			<div class="col">
				<div class="card shadow-sm">
					<div class="card-body">
						<h5 class="card-title" style="min-height: 2.5em;">
							<a href="/business.php?id=<?= $row['business_id'] ?>"><?= $row['business_name'] ?></a>
						</h5>
						<div><?= $row['category_name'] ?></div>
						<div><?= $row['address_city'] ?></div>
						<?= outputStars($row['business_avg_stars']) ?>
						<a class="btn btn-sm btn-dark mt-3" href="/business.php?id=<?= $row['business_id'] ?>">View</a>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
<?php
require_once('./inc/footer.php');
