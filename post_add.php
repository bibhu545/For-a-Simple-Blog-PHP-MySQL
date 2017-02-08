<?php
// post_add.php
if(!empty($_POST)) {
    include 'mysql.php';
    if(mysql_safe_query('INSERT INTO posts (title,body,date) VALUES (%s,%s,%s)', $_POST['title'], $_POST['body'], time()))
        echo 'Entry posted. <a href="post_view.php?id='.mysql_insert_id().'">View</a>';
    else
        echo mysql_error();
}
?>

<form method="post">
    <table>
        <tr>
            <td><label for="title">Title</label></td>
            <td><input name="title" id="title" /></td>
        </tr>
        <tr>
            <td><label for="body">Body</label></td>
            <td><textarea name="body" id="body"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Post" /></td>
        </tr>
    </table>
</form>