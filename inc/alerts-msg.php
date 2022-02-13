<?php
/**
 * If the "msg" parameter is in the page URL, display the corresponding message.
 */
?>
<?php if ((isset($_GET['msg'])) && (! empty($_GET['msg']))) { ?>
	<div class="alert alert-info" role="alert">
		<?php
		switch ($_GET['msg']) {
			case 'logged_in':
				echo 'You have successfully logged in.'; break;
			case 'review_added':
				echo 'Your review has been added.'; break;
			default:
				echo 'An unknown error has occurred.';
		}
		?>
	</div>
<?php } ?>