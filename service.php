<?php
require_once('./inc/common.php');

/**
 * Check whether the required parameter ID is sent. Go back with an error message if not.
 */
if ((! isset($_GET['id'])) || (empty($_GET['id'])) || (! is_numeric($_GET['id']))) {
	header('Location: /services.php?err=no_id');
	exit();
}
$service_id = $_GET['id'];

/**
 * Get the name of this service (needed for the page title).
 */
$sql = 'SELECT service_name FROM service WHERE service_id = :id';
$stm = $conn->prepare($sql);
$stm->execute([':id' => $service_id]);
$service_name = $stm->fetch()[0];
/**
 * Go back with an error message if the service with this id does not exist.
 */
if (empty($service_name)) {
	header('Location: /services.php?err=bad_id');
	exit();
}

$pageTitle = 'Service: ' . $service_name;
$pageSlug = 'services';

require_once('./inc/head.php');
require_once('./inc/header.php');
?>
<div class="container">
	<h1 class="mt-5"><?= $pageTitle ?></h1>

	<p class="lead mb-4">This is a list of all businesses that offer the service "<?= $service_name ?>". Select a business to view its details.</p>

	<table class="table">
		<thead>
			<tr>
				<th width="1"><abbr title="Number">#</abbr></th>
				<th>Business Name</th>
				<th width="1">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			/**
			 * Fetch the details of the service with the given service id and display it in a tabular format.
			 */
			$i = 0;
			$sql = 'SELECT b.business_id, b.business_name FROM business_service bs join business b on bs.business_id = b.business_id WHERE bs.service_id = :id ORDER BY b.business_name';
			$stm = $conn->prepare($sql);
			$stm->execute([':id' => $service_id]);
			foreach ($stm->fetchAll() as $row) {
				$i++;
			?>
				<tr>
					<td class="text-end"><?= $i ?>.</td>
					<td><a href="/business.php?id=<?= $row['business_id'] ?>"><?= $row['business_name'] ?></a></td>
					<td><a class="btn btn-sm btn-dark" href="/business.php?id=<?= $row['business_id'] ?>">View</a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?php
require_once('./inc/footer.php');
