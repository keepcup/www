<?
include 'db.php';
$title="Lorem ipsum dolor sit amet";
$title_small="Lorem ipsum dolor sit amet";
$photo="/images/blog/test.jpg";
$photo_preview='';
$private = 1;
$password='123';
$url_name='';
$file_name='';
$insert = $db->prepare("INSERT INTO gallery (title,photo,private,password) VALUES ('$title','$photo','$private','$password')");
$insert->execute();
?>
