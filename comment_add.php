<?php
// comment_add.php
include 'mysql.php';

$expire = time()+60*60*24*30;
setcookie('name', $_POST['name'], $expire, '/');
setcookie('email', $_POST['email'], $expire, '/');
setcookie('website', $_POST['website'], $expire, '/');

mysql_safe_query('INSERT INTO comments (post_id,name,email,website,content,date) VALUES (%s,%s,%s,%s,%s,%s)', 
    $_GET['id'], $_POST['name'], $_POST['email'], $_POST['website'], $_POST['content'], time());
mysql_safe_query('UPDATE posts SET num_comments=num_comments+1 WHERE id=%s LIMIT 1', $_GET['id']);
redirect('post_view.php?id='.$_GET['id'].'#post-'.mysql_insert_id());