<?php
session_start();

/**
 * Create a persistent connection to the database server.
 */
try {
	//////////////////////////
	// BEGIN: Local connection
	// $conn = new PDO('pgsql:host=localhost;port=5433;dbname=weservice', 'postgres', 'postgres', array( // user: postgres
	// $conn = new PDO('pgsql:host=localhost;port=5433;dbname=weservice', 'postgres', 'sara', array( // user: sara
	// 	PDO::ATTR_PERSISTENT => true
	// ));
	// END: Local connection


	///////////////////////////
	// BEGIN: Remote connection
	// 1. Create an SSH tunnel in Git Bash:
	// ssh -N -L 55432:127.0.0.1:5432 t_weservice@194.149.135.130
	// password: 71b1f4ea
	// 2. Connect:
	$conn = new PDO('pgsql:host=localhost;port=55432;dbname=db_202122z_va_prj_weservice', 'db_202122z_va_prj_weservice_owner', '821bf9400a4e', array(
		PDO::ATTR_PERSISTENT => true
	));
	// 3. Set the SQL queries to first search in the schema "weservice", then "public".
	$stm = $conn->prepare('SET search_path TO weservice,public;');
	$stm->execute();
	// END: Remote connection
} catch (Exception $e) {
	die("Unable to connect: " . $e->getMessage());
}


/**
 * For a given float number, output the stars (5 SVG elements).
 *
 * @param  float|null $rating
 * @return string
 */
function outputStars($rating, $size = 24) {
	$rating = $rating ?? 0;
	$retVal = '<div title="Rating: ' . number_format($rating, 2, '.', '') . '">';
	for ($j = 1; $j <= 5; $j++) {
		if (round($rating) >= $j) {
			$color = '#ffd700';
		} else {
			$color = '#666';
		}
		$retVal .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="' . $size . 'px" height="' . $size . 'px" fill="' . $color . '"><path d="M0 0h24v24H0z" fill="none"/><path d="M0 0h24v24H0z" fill="none"/><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>';
	}

	return $retVal . '</div>';
}
