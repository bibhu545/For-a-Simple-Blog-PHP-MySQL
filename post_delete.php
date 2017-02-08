<?php
// post_delete.php
include 'mysql.php';
mysql_safe_query('DELETE FROM posts WHERE id=%s LIMIT 1', $_GET['id']);
mysql_safe_query('DELETE FROM comments WHERE post_id=%s', $_GET['id']);
redirect('index.php');
?>