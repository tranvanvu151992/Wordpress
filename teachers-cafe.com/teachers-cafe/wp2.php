<?php get_header(); ?>
<?php
/*
Template Name:wp2
*/
?>
<div class="grid grid-pad">

<aside id="sidebar" class="column-left">

<?php dynamic_sidebar( 'sidebar-home-left' ); ?>

	</aside>

	<div class="col-9-12">
	
	
        <div id="primary" class="content-area">
		
		
            <main id="main" class="site-main" role="main">
    
                <!DOCTYPE html>
<html>
<head>
<style>
.main_top {
margin: auto;
width: 80%;
margin-top: 20px;
font-family: arial;
margin-right:0 auto;
margin-left:0 auto;

}

.col1 {
width: 20%;
float: left;
text-align:right;
}

.col2 {
width: 80%;
float: right;
text-align: right;
padding-right: 10px;margin-bottom:30px;
}



.button{
	float:right;
	width: 160px;
	height: 25px;
	background-color: #84c125;
	brder: 1px solid #84c125;
	border-radius: 10px;
margin-bottom:20px;
}
.button a:link {

    color: #fff;
	padding-top: 10px;
    text-align: right;
	padding-right: 15px;
    text-decoration: none;
    display: inline-block;

}


.button:hover {
    background-color:#2d5767;
}


#formfield1 {
width:100%;
margin-top: 80px;
font-family: arial;

}

</style>
</head>
<body>


<div class="main_top">
<h3 style="text-align: right; font-size: 22px;">Upload Author Files</h3>

<div class="col1">
 <img src="<?php bloginfo('template_directory');?>/img/img01.jpg" alt="Author Picture" height="87" width="72">
</div>

<div class="col2">
<p style="font-size: 20px; ">Author: Cheng Meng</p>
<p style="font-size: 20px; padding-top: -30px; line-height: 0px; ">Membership Type: Basic</p>
<br />
<progress max="100" value="35"></progress><span style="padding-left:10px; font-size: 20px;">Space for upload files</span>
<p style="margin-top: -1px; font-size: 12px; padding-right: 215px;margin-right: 0px;">45.9 GB free of 74.5 GB</p>
<a style="color: #fff; padding-right: 10px; text-decoration: none; font-size: 14px; padding-top:2px;" class="button" href="#">Upgrade Package</a>
</div>

<p>
<input type="text" style="width: 95%; height: 30px; text-align: right; border:white; name="comment"/>
</p>



<form action="" method="post" enctype="multipart/form-data">


<form id="form" name="form" method="post" action="">

  <p style="text-align: right; font-size: 18px;">Educational Content</br>
<select style="width: 100%; height: 30px; text-align: right;" NAME="customeducation" id="education">
    <option value="" selected>Select</option>
	<option value="education">Content1</option>
	<option value="education">Content2</option>
	
  </select>  
</p>

<p style="text-align: right; font-size: 18px;">File Type</br>
<select style="width: 100%; height: 30px; text-align: right;" name="ftype" id="ftype">
    <option value="" selected>Select</option>
     <option value="ftype1">File type1</option>
	  <option value="ftype2">File type2</option>
  </select>  
</p>
<p style="text-align: right;  font-size: 18px;">Price</br>
<select style="width: 100%; height: 30px; text-align: right;" name="price" id="price">
    <option value="" selected>Select</option>
	<option value="$50">$50-100</option>
	<option value="$100">$100-500</option>

  </select>
</p>
<p style="text-align: right;  font-size: 18px;">Subject</br>
<select style="width: 100%; height: 30px; text-align: right;" name="subject" id="subject">
    <option value="" selected>Select</option>
	<option value="Subject1">Subject1</option>
	<option value="Subject2">Subject2</option>

  </select>  
</p>
<p style="text-align: right; font-size: 18px;">Grade</br>
<select style="width: 100%; height: 30px; text-align: right;" name="grade" id="grade">
    <option value="" selected>Select</option>
	<option value="Grade1">Grade1</option>
	<option value="Grade2">Grade2</option>
  </select>
</p>
<p style="text-align: right; margin-right:-70px;font-size: 18px;">
Please fill in the file-upload:
<input type="file" name="file" />
</p>
<div style=" margin-top:10px;">

<p>
  <label>
    <input type="submit" NAME="submit" id="Go to page 2"" value="Submit" class="button"style="text-align: right; color: #fff; text-decoration: none; font-size: 16px; padding-right:15px; border:none;background-color: #84c125;border-radius: 10px;padding-top:2px;padding-bottom:1px;" />
  </label>
  </div>
</form> 
</body>
</html>


            </main><!-- #main -->
        </div><!-- #primary -->
	</div>





<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>


