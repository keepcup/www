<?
include 'db.php';
$title="Lorem ipsum dolor sit amet";
$photo="/images/blog/test.jpg";
$private = 1;
$password='123';
$insert = $db->prepare("INSERT INTO gallery (title,photo,private,password) VALUES ('$title','$photo','$private','$password')");
$insert->execute();
?>
