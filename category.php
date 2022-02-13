<?php
require_once('./inc/common.php');

/**
 * Check whether the required parameter ID is sent. Go back with an error message if not.
 */
if ((! isset($_GET['id'])) || (empty($_GET['id'])) || (! is_numeric($_GET['id']))) {
	header('Location: /categories.php?err=no_id');
	exit();
}
$category_id = $_GET['id'];

/**
 * Get the name of this category (needed for the page title).
 */
$sql = 'SELECT category_name FROM category WHERE category_id = :id';
$stm = $conn->prepare($sql);
$stm->execute([':id' => $category_id]);
$category_name = $stm->fetch()[0];
/**
 * Go back with an error message if the category with this id does not exist.
 */
if (empty($category_name)) {
	header('Location: /categories.php?err=bad_id');
	exit();
}

$pageTitle = 'Category: ' . $category_name;
$pageSlug = 'categories';

require_once('./inc/head.php');
require_once('./inc/header.php');
?>
<div class="container">
	<h1 class="mt-5"><?= $pageTitle ?></h1>

	<p class="lead mb-4">This is a list of all businesses that belong to the category "<?= $category_name ?>". Select a business to view its details.</p>

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
			 * Fetch the details of the category with the given id.
			 */
			$i = 0;
			$sql = 'SELECT business_id, business_name FROM business WHERE category_id = :id ORDER BY business_name';
			$stm = $conn->prepare($sql);
			$stm->execute([':id' => $category_id]);
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
