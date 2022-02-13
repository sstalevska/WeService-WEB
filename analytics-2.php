<?php
require_once('./inc/common.php');

$pageTitle = 'Number of reviews left by reviewers, by yearly quarters';
$pageSlug = 'home';

require_once('./inc/head.php');
require_once('./inc/header.php');
?>
<div class="container">
	<h1 class="mt-5"><?= $pageTitle ?></h1>

	<?php
	$quarterTitle = 'First';
	$quarterId = 'first_q';
    require('./inc/analytics-table-2.php');

	$quarterTitle = 'Second';
	$quarterId = 'second_q';
    require('./inc/analytics-table-2.php');

	$quarterTitle = 'Third';
	$quarterId = 'third_q';
    require('./inc/analytics-table-2.php');

	$quarterTitle = 'Fourth';
	$quarterId = 'fourth_q';
    require('./inc/analytics-table-2.php');
	?>
</div>
<?php
require_once('./inc/footer.php');
