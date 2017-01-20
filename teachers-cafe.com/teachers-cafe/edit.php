<?php
/*
Template Name:Edit Page
*/

/* other PHP code here */
?>


<?php get_header(); ?>


<html>
<style>
input[type="text"] {
    width: 150px;
  border:none;
    margin-bottom:10px;
    background-color:#f9f9f9;
}
label{
display: inline-block;width: 100px;
text-align:left;
}
div {
   
}


</style>


<body>
<div class="grid grid-pad">

<aside id="sidebar" class="column-left">

<?php dynamic_sidebar( 'sidebar-home-left' ); ?>

	</aside>

	<div class="col-9-12">
	
	
        <div id="primary" class="content-area">
		
		
            <main id="main" class="site-main" role="main">





<div class="main_top">


<?php
$query=mysql_connect

("localhost","teachers_mrhaman","LNpzlRr2JJrD");
mysql_select_db("teachers_db-teachers-cafe",$query);


if(isset($_GET['member_id']))
{
$member_id=$_GET['member_id'];
if(isset($_POST['submit']))
{
$user_name=$_POST['user_name'];
$country=$_POST['country'];
$query3=mysql_query("update wp_wp_eMember_members_tbl set 

user_name='$name', country='$country' where 

member_id='$member_id'");
if($query3)
{
header('location:list.php');
}
}
$query1=mysql_query("select * from 

wp_wp_eMember_members_tbl
 where member_id='$member_id'");
$query2=mysql_fetch_array($query1);
?>
<div style="  margin: auto;
    width: 60%;
    border: 0px solid #73AD21;
    padding: 30px;";>

<h3 align="center">Author Details</h3>
<form method="post" action="" align="center";>

<label>Name:</label><input type="text" name="user_name" 

value="<?php echo $query2['user_name']; ?>" /><br />
<label>Country:</label><input type="text" name="country" 

value="<?php echo $query2['country']; ?>" /><br /><br />
<br />

</form>
</div>
<?php
}
?>

</div> 


</main><!-- #main -->
</div><!-- #primary -->
</div>



</body>
</html>
<?php get_sidebar(); ?>
<?php get_footer(); ?>