<?php
/**
 * Destroy the user session, effectively logging him out, and redirect to the Home page.
 */
session_start();
session_destroy();
header('Location: /index.php');
