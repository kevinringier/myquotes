<?php
 
 define('TITLE', 'View ALL Quotes');
 include('templates/header.html');

 print '<h2>All Quotes</h2>';

 if (!is_administrator()) {
 	print '<h2>Access Denied</h2>
 		   <p class="error">You do not have permission to access this page.</p>';
 		   include('templates/footer.html');
 		   exit();
 }

 include ('./mysqli_connect.php');
 $query = 'SELECT id, quote, source, favorite FROM quotes ORDER BY date_entered DESC';

 if ($r = mysqli_query($dbc, $query)) {
	while ($row = mysqli_fetch_array($r)) {
		print "<div><blockquote>
			   {$row['quote']}</blockquote>-
			   {$row['source']}\n";
		if ($row['favorite'] == 1) {
			print ' <strong>Favorite!</strong>';
		}

		print "<p><b>Quote Admin:</b>
			   <a href=\"edit_quote.php?id={$row['id']}\">Edit</a> <->
			   <a href=\"delete_quote.php?id={$row['id']}\">Delete</a></p></div>\n";
	}	 	
 } else {
 	print '<p class="error">Could not retrieve the data because:<br>' . mysqli_error($dbc) . '</p>
 		   <p>The query being run was: ' . $query . '</p>';
 }

 include('templates/footer.html');
?>