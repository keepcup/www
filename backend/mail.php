<?php
$subject = "Обратная связь instabudka.ru";
$multipart .="<table border='2'>";
$multipart .="<tr><td>Имя</td><td>e-mail</td><td>Комментарий</td></tr>";
$multipart .="<tr>";
$multipart .="<td>".$_POST['name']."</td>";
$multipart .="<td>".$_POST['mail']."</td>";
$multipart .="<td>".$_POST['comments']."</td>";
$multipart .="</tr>";
$multipart .="</table>";
$mail_to='holywrite@asartdesign.ru';
mail($mail_to, $subject,$multipart,"Content-type:text/html;Charset=utf-8\r\n");
?>
<script>
	location="../contacts"; 
</script>
