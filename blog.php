<?include "header.php";$url='blog';?>
	<div class="content">
		<?include "backend/blog.php";?>
<div id="more"></div>
<?if(empty($_GET['id'])){?>
<script src="js/blog.js"></script>
<?}?>
<?include "footer.php";?>