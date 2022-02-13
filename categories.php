<?php
require_once('./inc/common.php');

$pageTitle = 'Categories';
$pageSlug = 'categories';

require_once('./inc/head.php');
require_once('./inc/header.php');
?>
<div class="container">
	<h1 class="mt-5"><?= $pageTitle ?></h1>

	<?php require_once('./inc/alerts-err.php'); ?>

	<p class="lead mb-4">This is a list of all categories. Select a category to view businesses listed under it.</p>

	<table class="table">
		<thead>
			<tr>
				<th width="1"><abbr title="Number">#</abbr></th>
				<th>Category Name</th>
				<th width="1">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			/**
			 * Fetch all categories and display them in a table.
			 */
			$i = 0;
			$sql = 'SELECT category_id, category_name FROM category ORDER BY category_name';
			foreach ($conn->query($sql) as $row) {
				$i++;
			?>
				<tr>
					<td class="text-end"><?= $i ?>.</td>
					<td><a href="/category.php?id=<?= $row['category_id'] ?>"><?= $row['category_name'] ?></a></td>
					<td><a class="btn btn-sm btn-dark" href="/category.php?id=<?= $row['category_id'] ?>">View</a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?php
require_once('./inc/footer.php');
