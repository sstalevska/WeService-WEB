<?php
require_once('./inc/common.php');

/**
 * Only logged in reviewers can submit a review. If the user is not a reviewer, redirect to the list of businesses with an appropriate error message. Otherwise, continue with the checks.
 */
if (! isset($_SESSION['is_reviewer'])) {
	header('Location: /businesses.php?err=permission_error');
	exit;
}

/**
 * Did the reviewer post a form?
 */
if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
	/**
	 * Perform data validation: are all required fields posted and do they have values?
	 */
	if (
		(isset($_POST['business'])) && (! empty($_POST['business'])) &&
		(isset($_POST['address'])) && (! empty($_POST['address'])) &&
		(isset($_POST['rating'])) && (! empty($_POST['rating'])) &&
		(isset($_POST['title'])) && (! empty($_POST['title'])) &&
		(isset($_POST['text'])) && (! empty($_POST['text']))
	) {
		/**
		 * For security reasons, treat all user input as malicious. Strip any tags before inserting that data into the database.
		 */
		$business = strip_tags($_POST['business']);
		$address = strip_tags($_POST['address']);
		$rating = strip_tags($_POST['rating']);
		$title = strip_tags($_POST['title']);
		$text = strip_tags($_POST['text']);

		/**
		 * Insert the values that the reviewer posted into the database.
		 */
		$sql = '
			insert into review (
				review_title,
				review_text,
				review_stars,
				business_id,
				address_id,
				reviewer_id)
			values (
				:title,
				:text,
				:rating,
				:business,
				:address,
				:reviewer
			)';
		$stm = $conn->prepare($sql);
		$stm->execute([
			':title' => $title,
			':text' => $text,
			':rating' => $rating,
			':business' => $business,
			':address' => $address,
			':reviewer' => $_SESSION['reviewer_id'],
		]);

		/**
		 * All is well, so redirect back to the business with the message that the review was added.
		 */
		header('Location: /business.php?id=' . $_POST['business'] . '&msg=review_added');
		exit;
	} else {
		/**
		 * Redirect back to the business with the error message that some parameters were missing.
		 */
		header('Location: /business.php?id=' . $_POST['business'] . '&err=missing_params#add-review');
		exit;
	}
}

/**
 * If the code execution reaches this point, then some parameters were incorrect or missing. Redirect to the list of businesses with an appropriate error message.
 */
header('Location: /businesses.php?err=missing_params');
exit;
