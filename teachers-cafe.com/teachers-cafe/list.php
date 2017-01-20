<html>
<body>
<?php
$query=mysql_connect("localhost","teachers_mrhaman","LNpzlRr2JJrD");
mysql_select_db("teachers_db-teachers-cafe",$query);

$query1=mysql_query("select member_id, user_name, email from wp_wp_eMember_members_tbl");
echo "<table><tr><td>Name</td><td>Email</td><td></td><td></td>";
while($query2=mysql_fetch_array($query1))
{
echo "<tr><td>".$query2['user_name']."</td>";
echo "<td>".$query2['email']."</td>";
echo "<td><a href='edit.php?id=".$query2['member_id']."'>Edit</a></td>";
<tr>";
}
?>
</ol>
</table>
</body>
</html>