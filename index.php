<?php
// index.php
include 'mysql.php';

echo '<h1>My First Blog</h1>';
echo "<em>What a busy day...!!!</em><hr/>";

$result = mysql_safe_query('SELECT * FROM posts ORDER BY date DESC');

if(!mysql_num_rows($result)) {
    echo 'No posts yet.';
} else {
    while($row = mysql_fetch_assoc($result)) {
        echo '<h2>'.$row['title'].'</h2>';
        $body = substr($row['body'], 0, 300);
        echo nl2br($body).'...<br/>';
        echo '<a href="post_view.php?id='.$row['id'].'">Read More</a> | ';
        echo '<a href="post_view.php?id='.$row['id'].'#comments">'.$row['num_comments'].' comments</a>';    
        echo '<hr/>';
    }
}

echo <<<HTML
<a href="post_add.php">+ New Post</a>
HTML;
?>
