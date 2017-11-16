<?php

// delete cookie if exists
if (isset($_COOKIE['samual'])) {
	setcookie('Samual', FALSE, time() - 300);
}

define('TITLE', 'Logout');
include('templates/header.html');

print '<p>You are now logged out.</p>';

include('templates/footer.html');
?>