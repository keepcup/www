<?
include 'db.php';
$title="Lorem ipsum dolor sit amet";
$photo="/images/blog/test.jpg";
$text="Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet";
$insert = $db->prepare("INSERT INTO blog (title,photo,text) VALUES ('$title','$photo','$text')");
$insert->execute();
?>
