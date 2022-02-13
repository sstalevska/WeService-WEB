<?php
require_once('./inc/common.php');

$pageTitle = 'Services';
$pageSlug = 'services';

require_once('./inc/head.php');
require_once('./inc/header.php');
?>
<div class="container">
	<h1 class="mt-5"><?= $pageTitle ?></h1>

	<?php require_once('./inc/alerts-err.php'); ?>

	<p class="lead mb-4">This is a list of all services. Select a service to view businesses offering it.</p>

	<table class="table">
		<thead>
			<tr>
				<th width="1"><abbr title="Number">#</abbr></th>
				<th>Service Name</th>
				<th width="1">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			/**
			 * Fetch all services and display them in a tabular format.
			 */
			$i = 0;
			$sql = 'SELECT service_id, service_name FROM service ORDER BY service_name';
			foreach ($conn->query($sql) as $row) {
				$i++;
			?>
				<tr>
					<td class="text-end"><?= $i ?>.</td>
					<td><a href="/service.php?id=<?= $row['service_id'] ?>"><?= $row['service_name'] ?></a></td>
					<td><a class="btn btn-sm btn-dark" href="/service.php?id=<?= $row['service_id'] ?>">View</a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?php
require_once('./inc/footer.php');
