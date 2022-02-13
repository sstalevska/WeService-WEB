<?php
/**
 * If the "err" parameter is in the page URL, display the corresponding error message.
 */
?>
<?php if ((isset($_GET['err'])) && (! empty($_GET['err']))) { ?>
	<div class="alert alert-danger" role="alert">
		<strong>ERROR:</strong>
		<?php
		switch ($_GET['err']) {
			case 'no_id':
				echo 'Missing parameter.'; break;
			case 'bad_id':
				echo 'Item not found.'; break;
			case 'missing_params':
				echo 'Some parameters are missing.'; break;
			case 'wrong_params':
				echo 'Some parameters are incorrect.'; break;
			case 'permission_error':
				echo 'You do not have enough permissions.'; break;
			default:
				echo 'An unknown error has occurred.';
		}
		?>
	</div>
<?php } ?>