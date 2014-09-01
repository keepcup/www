<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CMS</title>
	<link rel="stylesheet" href="css/CMS.css">
	<link rel="stylesheet" href="css/jquery.sbscroller.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/cms.js"></script>
	<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="js/uploader.js"></script>
	<script type="text/javascript" src="js/jquery.icheck.js"></script>
	<script type="text/javascript" src="js/jquery.sbscroller.js"></script>
</head>
<body>
<?include "db.php";?>
	<div class="container">
		<div class="content CMS">
			<h2>Главная</h2>
			<div class="CMS-block CMS-main-slide">
				<div class="left-label">
					<p>Слайдер</p>
				</div>
				<div class="right-content">
					<div class="CMS-buttons">
						<div class="button add_photo">
							<form class="frm"> 
								<input type="file" multiple class="upload_btn" />
							</form>
							<p>Добавить фотографию</p>
						</div>
						<div class="button save">
							<p>Сохранить</p>
						</div>
						<span class='display tname'>mainslider</span>
					</div>

					<div class="CMS-prewiew photo sortable" ondragover="return false">
					<?
					$position = $db->prepare("SELECT * FROM position");
					$position->execute();
					$position_row = $position->fetch();
					$main_slider = $position_row['mainSlider'];
					$main_clients = $position_row['mainClients'];
					$photography = $position_row['photography'];
					$contacts_clients = $position_row['contactsClients'];

					$slider = $db->prepare("SELECT * FROM main_slider ORDER BY FIELD( position,  $main_slider)");
					$slider->execute();
					$slider_row = $slider->fetchAll();
					$slider_count = $slider->rowCount();
					for($i=0;$i<$slider_count;$i++){
					?>
						<div id="mainslider_<?echo $slider_row[$i]['position']?>" class="photo-preview photo-preview-old">
							<img src="<?echo $slider_row[$i]['img']?>" alt="">
							<div class="close_cross"></div>
						</div>
					<?}?>
					</div>
				</div>
			</div>
			<div class="CMS-block CMS-main-clients last_block">
				<div class="left-label">
					<p>Отображение клиентов <span>(12 шт.)</span></p>
				</div>
				<div class="CMS-buttons">
					<div class="button save">
						<p>Сохранить</p>
					</div>
					<span class='display tname'>mainclients</span>
				</div>
				<div class="right-content sortable">
					<?
					$main_clients_db = $db->prepare("SELECT * FROM clients ORDER BY FIELD( main_position,  $main_clients)");
					$main_clients_db->execute();
					$main_clients_row = $main_clients_db->fetchAll();
					$main_clients_count = $main_clients_db->rowCount();
					for($i=0;$i<$main_clients_count;$i++){
					?>
					<div id="mainclients_<?echo $main_clients_row[$i]['main_position']?>" class="clients-prewiew">
						<img src="<?echo $main_clients_row[$i]['img']?>" alt="">
					</div>
					<?}?>
				</div>
			</div>
			<?
			$insta_db = $db->prepare("SELECT * FROM insta");
			$insta_db->execute();
			$insta_row = $insta_db->fetchAll();
			?>
			<h2>Инстабудка</h2>
			<div class="CMS-block instamini">
				<div class="left-label">
					<p>Описание</p>
				</div>
				<div class="right-content">
					<div class="CMS-buttons">
						<div class="button add_photo">
							<form class="frm"> 
								<input type="file" multiple class="upload_btn" />
							</form>
							<p>Изменить фотографию</p>
						</div>
						<div class="button save instabudka_save">
							<p>Сохранить</p>
						</div>
						<span class='display tname'>insta_1</span>
					</div>
					<div class="CMS-prewiew" ondragover="return false" ondragstart="return false">
						<span class="delete_current upload_preview">
							<div class="photo-preview photo-preview-old delete_current">
								<img src="<?echo $insta_row[0]['img'];?>" alt="">
							</div>
						</span>
					</div>
				</div>
			</div>
			<div class="CMS-block instamini">
				<div class="left-label">
					<p>Функции</p>
				</div>
				<div class="right-content">
					<div class="CMS-buttons">
						<div class="button add_photo">
							<form class="frm"> 
								<input type="file" multiple class="upload_btn" />
							</form>
							<p>Изменить фотографию</p>
						</div>
						<div class="button save instabudka_save">
							<p>Сохранить</p>
						</div>
						<span class='display tname'>insta_2</span>
					</div>
					<div class="CMS-prewiew" ondragover="return false" ondragstart="return false">
						<span class="delete_current upload_preview">
							<div class="photo-preview photo-preview-old delete_current">
								<img src="<?echo $insta_row[1]['img'];?>" alt="" class="">
							</div>
						</span>
					</div>
				</div>
			</div>
			<div class="CMS-block instamini">
				<div class="left-label">
				</div>
				<div class="right-content">
					<div class="CMS-buttons">
						<div class="button add_photo">
							<form class="frm"> 
								<input type="file" multiple class="upload_btn" />
							</form>
							<p>Изменить фотографию</p>
						</div>
						<div class="button save instabudka_save">
							<p>Сохранить</p>
						</div>
						<span class='display tname'>insta_3</span>
					</div>
					<div class="CMS-prewiew" ondragover="return false" ondragstart="return false">
						<span class="delete_current upload_preview">
							<div class="photo-preview photo-preview-old delete_current">
								<img src="<?echo $insta_row[2]['img'];?>" alt="" class="">
							</div>
						</span>
					</div>
				</div>
			</div>
			<div class="CMS-block instamini">
				<div class="left-label">
					<p>Оформление</p>
				</div>
				<div class="right-content">
					<div class="CMS-buttons">
						<div class="button add_photo">
							<form class="frm"> 
								<input type="file" multiple class="upload_btn" />
							</form>
							<p>Изменить фотографию</p>
						</div>
						<div class="button save instabudka_save">
							<p>Сохранить</p>
						</div>
						<span class='display tname'>insta_4</span>
					</div>
					<div class="CMS-prewiew" ondragover="return false" ondragstart="return false">
						<span class="delete_current upload_preview">
							<div class="photo-preview photo-preview-old delete_current">
								<img src="<?echo $insta_row[3]['img'];?>" alt="" class="">
							</div>
						</span>
					</div>
				</div>
			</div>
			<div class="CMS-block instamini">
				<div class="left-label">
				</div>
				<div class="right-content">
					<div class="CMS-buttons">
						<div class="button add_photo">
							<form class="frm"> 
								<input type="file" multiple class="upload_btn" />
							</form>
							<p>Изменить фотографию</p>
						</div>
						<div class="button save instabudka_save">
							<p>Сохранить</p>
						</div>
						<span class='display tname'>insta_5</span>
					</div>
					<div class="CMS-prewiew" ondragover="return false" ondragstart="return false">
						<span class="delete_current upload_preview">
							<div class="photo-preview photo-preview-old delete_current">
								<img src="<?echo $insta_row[4]['img'];?>" alt="" class="">
							</div>
						</span>
					</div>
				</div>
			</div>
			<div class="CMS-block instamini last_block">
				<div class="left-label">
					<p>Особенности</p>
				</div>
				<div class="right-content">
					<div class="CMS-buttons">
						<div class="button add_photo">
							<form class="frm"> 
								<input type="file" multiple class="upload_btn" />
							</form>
							<p>Изменить фотографию</p>
						</div>
						<div class="button save instabudka_save">
							<p>Сохранить</p>
						</div>
						<span class='display tname'>insta_6</span>
					</div>
					<div class="CMS-prewiew" ondragover="return false" ondragstart="return false">
						<span class="delete_current upload_preview">
							<div class="photo-preview photo-preview-old delete_current">
								<img src="<?echo $insta_row[5]['img'];?>" alt="" class="">
							</div>
						</span>
					</div>
				</div>
			</div>

			<h2>Инстамини</h2>
			<div class="CMS-block instamini">
				<div class="left-label">
					<p>Описание</p>
				</div>
				<div class="right-content">
					<div class="CMS-buttons">
						<div class="button add_photo">
							<form class="frm"> 
								<input type="file" multiple class="upload_btn" />
							</form>
							<p>Изменить фотографию</p>
						</div>
						<div class="button save instabudka_save">
							<p>Сохранить</p>
						</div>
						<span class='display tname'>insta_7</span>
					</div>
					<div class="CMS-prewiew" ondragover="return false" ondragstart="return false">
						<span class="delete_current upload_preview">
							<div class="photo-preview photo-preview-old delete_current">
								<img src="<?echo $insta_row[6]['img'];?>" alt="" class="">
							</div>
						</span>
					</div>
				</div>
			</div>
			<div class="CMS-block instamini">
				<div class="left-label">
					<p>Функции</p>
				</div>
				<div class="right-content">
					<div class="CMS-buttons">
						<div class="button add_photo">
							<form class="frm"> 
								<input type="file" multiple class="upload_btn" />
							</form>
							<p>Изменить фотографию</p>
						</div>
						<div class="button save instabudka_save">
							<p>Сохранить</p>
						</div>
						<span class='display tname'>insta_8</span>
					</div>
					<div class="CMS-prewiew" ondragover="return false" ondragstart="return false">
						<span class="delete_current upload_preview">
							<div class="photo-preview photo-preview-old delete_current">
								<img src="<?echo $insta_row[7]['img'];?>" alt="" class="">
							</div>
						</span>
					</div>
				</div>
			</div>
			<div class="CMS-block instamini">
				<div class="left-label">
				</div>
				<div class="right-content">
					<div class="CMS-buttons">
						<div class="button add_photo">
							<form class="frm"> 
								<input type="file" multiple class="upload_btn" />
							</form>
							<p>Изменить фотографию</p>
						</div>
						<div class="button save instabudka_save">
							<p>Сохранить</p>
						</div>
						<span class='display tname'>insta_9</span>
					</div>
					<div class="CMS-prewiew" ondragover="return false" ondragstart="return false">
						<span class="delete_current upload_preview">
							<div class="photo-preview photo-preview-old delete_current">
								<img src="<?echo $insta_row[8]['img'];?>" alt="" class="">
							</div>
						</span>
					</div>
				</div>
			</div>
			<div class="CMS-block instamini">
				<div class="left-label">
					<p>Оформление</p>
				</div>
				<div class="right-content">
					<div class="CMS-buttons">
						<div class="button add_photo">
							<form class="frm"> 
								<input type="file" multiple class="upload_btn" />
							</form>
							<p>Изменить фотографию</p>
						</div>
						<div class="button save instabudka_save">
							<p>Сохранить</p>
						</div>
						<span class='display tname'>insta_10</span>
					</div>
					<div class="CMS-prewiew" ondragover="return false" ondragstart="return false">
						<span class="delete_current upload_preview">
							<div class="photo-preview photo-preview-old delete_current">
								<img src="<?echo $insta_row[9]['img'];?>" alt="" class="">
							</div>
						</span>
					</div>
				</div>
			</div>
			<div class="CMS-block instamini">
				<div class="left-label">
				</div>
				<div class="right-content">
					<div class="CMS-buttons">
						<div class="button add_photo">
							<form class="frm"> 
								<input type="file" multiple class="upload_btn" />
							</form>
							<p>Изменить фотографию</p>
						</div>
						<div class="button save instabudka_save">
							<p>Сохранить</p>
						</div>
						<span class='display tname'>insta_11</span>
					</div>
					<div class="CMS-prewiew" ondragover="return false" ondragstart="return false">
						<span class="delete_current upload_preview">
							<div class="photo-preview photo-preview-old delete_current">
								<img src="<?echo $insta_row[10]['img'];?>" alt="" class="">
							</div>
						</span>
					</div>
				</div>
			</div>
			<div class="CMS-block instamini last_block">
				<div class="left-label">
					<p>Особенности   </p>
				</div>
				<div class="right-content">
					<div class="CMS-buttons">
						<div class="button add_photo">
							<form class="frm"> 
								<input type="file" multiple class="upload_btn" />
							</form>
							<p>Изменить фотографию</p>
						</div>
						<div class="button save instabudka_save">
							<p>Сохранить</p>
						</div>
						<span class='display tname'>insta_12</span>
					</div>
					<div class="CMS-prewiew" ondragover="return false" ondragstart="return false">
						<span class="delete_current upload_preview">
							<div class="photo-preview photo-preview-old delete_current">
								<img src="<?echo $insta_row[11]['img'];?>" alt="" class="">
							</div>
						</span>
					</div>
				</div>
			</div>

			<h2>Инсташар</h2>
			<div class="CMS-block instamini">
				<div class="left-label">
					<p>Описание</p>
				</div>
				<div class="right-content">
					<div class="CMS-buttons">
						<div class="button add_photo">
							<form class="frm"> 
								<input type="file" multiple class="upload_btn" />
							</form>
							<p>Изменить фотографию</p>
						</div>
						<div class="button save instabudka_save">
							<p>Сохранить</p>
						</div>
						<span class='display tname'>insta_13</span>
					</div>
					<div class="CMS-prewiew" ondragover="return false" ondragstart="return false">
						<span class="delete_current upload_preview">
							<div class="photo-preview photo-preview-old delete_current">
								<img src="<?echo $insta_row[12]['img'];?>" alt="" class="">
							</div>
						</span>
					</div>
				</div>
			</div>
			<div class="CMS-block instamini">
				<div class="left-label">
					<p>Функции</p>
				</div>
				<div class="right-content">
					<div class="CMS-buttons">
						<div class="button add_photo">
							<form class="frm"> 
								<input type="file" multiple class="upload_btn" />
							</form>
							<p>Изменить фотографию</p>
						</div>
						<div class="button save instabudka_save">
							<p>Сохранить</p>
						</div>
						<span class='display tname'>insta_14</span>
					</div>
					<div class="CMS-prewiew" ondragover="return false" ondragstart="return false">
						<span class="delete_current upload_preview">
							<div class="photo-preview photo-preview-old delete_current">
								<img src="<?echo $insta_row[13]['img'];?>" alt="" class="">
							</div>
						</span>
					</div>
				</div>
			</div>
			<div class="CMS-block instamini">
				<div class="left-label">
				</div>
				<div class="right-content">
					<div class="CMS-buttons">
						<div class="button add_photo">
							<form class="frm"> 
								<input type="file" multiple class="upload_btn" />
							</form>
							<p>Изменить фотографию</p>
						</div>
						<div class="button save instabudka_save">
							<p>Сохранить</p>
						</div>
						<span class='display tname'>insta_15</span>
					</div>
					<div class="CMS-prewiew" ondragover="return false" ondragstart="return false">
						<span class="delete_current upload_preview">
							<div class="photo-preview photo-preview-old delete_current">
								<img src="<?echo $insta_row[14]['img'];?>" alt="" class="">
							</div>
						</span>
					</div>
				</div>
			</div>
			<div class="CMS-block instamini">
				<div class="left-label">
					<p>Оформление</p>
				</div>
				<div class="right-content">
					<div class="CMS-buttons">
						<div class="button add_photo">
							<form class="frm"> 
								<input type="file" multiple class="upload_btn" />
							</form>
							<p>Изменить фотографию</p>
						</div>
						<div class="button save instabudka_save">
							<p>Сохранить</p>
						</div>
						<span class='display tname'>insta_16</span>
					</div>
					<div class="CMS-prewiew" ondragover="return false" ondragstart="return false">
						<span class="delete_current upload_preview">
							<div class="photo-preview photo-preview-old delete_current">
								<img src="<?echo $insta_row[15]['img'];?>" alt="" class="">
							</div>
						</span>
					</div>
				</div>
			</div>
			<div class="CMS-block instamini last_block">
				<div class="left-label">
				</div>
				<div class="right-content">
					<div class="CMS-buttons">
						<div class="button add_photo">
							<form class="frm"> 
								<input type="file" multiple class="upload_btn" />
							</form>
							<p>Изменить фотографию</p>
						</div>
						<div class="button save instabudka_save">
							<p>Сохранить</p>
						</div>
						<span class='display tname'>insta_17</span>
					</div>
					<div class="CMS-prewiew" ondragover="return false" ondragstart="return false">
						<span class="delete_current upload_preview">
							<div class="photo-preview photo-preview-old delete_current">
								<img src="<?echo $insta_row[16]['img'];?>" alt="" class="">
							</div>
						</span>
					</div>
				</div>
			</div>
			
			<h2>Фотосъёмка</h2>
			<div class="CMS-block CMS-main-slide last_block">
				<div class="left-label">
					<p>Фотографии</p>
				</div>
				<div class="right-content">
					<div class="CMS-buttons">
						<div class="button add_photo">
							<form class="frm"> 
								<input type="file" multiple class="upload_btn" />
							</form>
							<p>Добавить фотографию</p>
						</div>
						<div class="button save">
							<p>Сохранить</p>
						</div>
						<span class='display tname'>photography</span>
					</div>
					<div class="CMS-prewiew photo sortable" ondragover="return false" ondragstart="return false">
					<?
					$photography_db = $db->prepare("SELECT * FROM photography ORDER BY FIELD( position,  $photography)");
					$photography_db->execute();
					$photography_row = $photography_db->fetchAll();
					$photography_count = $photography_db->rowCount();
					for($i=0;$i<$photography_count;$i++){
					?>
						<div id="photography_<?echo $photography_row[$i]['position']?>" class="photo-preview photo-preview-old">
							<img src="<?echo $photography_row[$i]['img']?>" alt="">
							<div class="close_cross"></div>
						</div>
					<?}?>
					</div>
				</div>
			</div>

			<h2>Мобильная фотостудия</h2>
			<div class="CMS-block instamini last_block">
				<div class="left-label">
					<p>Фото</p>
				</div>
				<div class="right-content">
					<div class="CMS-buttons">
						<div class="button add_photo">
							<form class="frm"> 
								<input type="file" multiple class="upload_btn" />
							</form>
							<p>Изменить фотографию</p>
						</div>
						<div class="button save instabudka_save">
							<p>Сохранить</p>
						</div>
						<span class='display tname'>insta_18</span>
					</div>
					<div class="CMS-prewiew" ondragover="return false" ondragstart="return false">
						<span class="delete_current upload_preview">
							<div class="photo-preview photo-preview-old delete_current">
								<img src="<?echo $insta_row[17]['img'];?>" alt="" class="">
							</div>
						</span>
					</div>
				</div>
			</div>

			<h2>Галерея</h2>
			<div class="CMS-block create_gallery">
				<div class="left-label">
					<p>Создать</p>
				</div>
				<div class="right-content">
					<div class="button create_new_gallery">
						<p>Создать галерею</p>
					</div>
					<div class="button closed create_new_closed_gallery">
						<p>Создать закрытую галерею</p>
					</div>
				</div>
			</div>
			<div class="CMS-block new_gallery display">
				<div class="left-label">
					<p>Новая галерея</p>
				</div>
				<div class="right-content">
					<div class="gallery-edit-form">
						 <div class="CMS-buttons"><!-- в данном случае в этом блоке CMS-buttons не только кнопки, но также и формы. Блок используется как конетйнер -->
							<form id="new_gallery_form">
							<input type="text" name="h_1" class="h_1" value="ЗАГОЛОВОК 1" onfocus="if(this.value=='ЗАГОЛОВОК 1') this.value='';" onblur="if(!this.value) this.value='ЗАГОЛОВОК 1';">
							<input type="text" name="date" class="date" value="ДАТА" onfocus="if(this.value=='ДАТА') this.value='';" onblur="if(!this.value) this.value='ДАТА';">
							<p class="label-date">в формате 01.02</p>
							<input type="text" name="h_2" class="h_2" value="Заголовок 2" onfocus="if(this.value=='Заголовок 2') this.value='';" onblur="if(!this.value) this.value='Заголовок 2';">
							</form>
						</div>
						<div class="gallery-photos">
							<div class="photo-left CMS-buttons">
								<p class="top-label">Фотографии</p>
								<div class="button">
									<p>Добавить фото</p>
									<form class="frm"> 
										<input type="file" multiple class="upload_btn" />
									</form>
								</div>
								<div class="button save new_gallery_save">
									 <p>Сохранить</p>
								</div>
								<span class='display tname'>gallery</span>
							</div>
							<div class="CMS-prewiew photo sortable" ondragover="return false" ondragstart="return false">
							</div>
						</div>
					</div>
				</div><!-- end of .right-content -->				
			</div><!-- end of .CMS-block .new_gallery -->
			<!-- closed_gallery -->
			<div class="CMS-block new_gallery display">
				<div class="left-label">
					<p>Новая галерея</p>
				</div>
				<div class="right-content">
					<div class="gallery-edit-form notfade">
						 <div class="CMS-buttons">
							<form id="new_closed_gallery_form">
							<input type="text" name="h_1" class="h_1" value="ЗАГОЛОВОК 1" onfocus="if(this.value=='ЗАГОЛОВОК 1') this.value='';" onblur="if(!this.value) this.value='ЗАГОЛОВОК 1';">
							<input type="text" name="date" class="date" value="ДАТА" onfocus="if(this.value=='ДАТА') this.value='';" onblur="if(!this.value) this.value='ДАТА';">
							<p class="label-date">в формате 01.02</p>
							<input type="text" name="h_2" class="h_2" value="Заголовок 2" onfocus="if(this.value=='Заголовок 2') this.value='';" onblur="if(!this.value) this.value='Заголовок 2';">
							<input type="text" name="pass" class="pass" value="ПАРОЛЬ" onfocus="if(this.value=='ПАРОЛЬ') this.value='';" onblur="if(!this.value) this.value='ПАРОЛЬ';">
							<p class="label-pass">максимум 5 символов</p>
							</form>
						</div>
						<div class="gallery-photos closed_gallery">
							<div class="photo-left CMS-buttons">
								<div class="button">
									<p>Добавить фото</p>
									<form class="frm"> 
										<input type="file" class="upload_btn" />
									</form>
								</div>
								<div class="button save new_closed_gallery_save">
									 <p>Сохранить</p>
								</div>
								<span class='display tname'>gallery_closed</span>
							</div>
							<div class="CMS-prewiew photo sortable display" ondragover="return false" ondragstart="return false">
							</div>
						</div>
					</div>
				</div><!-- end of .right-content -->				
			</div><!-- end of .CMS-block .new_gallery -->
			<!-- closed_gallery_end -->
				
			<div class="CMS-block yours_gallery last_block">
				<div class="left-label">
					<p>Ваши галереи</p>
				</div>
				<div class="right-content sbscroller">
				<?
				$gallery_db = $db->prepare("SELECT * FROM gallery ORDER BY id");
				// $gallery_db = $db->prepare("SELECT * FROM gallery ORDER BY date DESC");
				$gallery_db->execute();
				$gallery_row = $gallery_db->fetchAll();
				$gallery_count = $gallery_db->rowCount();

				
				for($i=0;$i<$gallery_count;$i++){
					$position = $gallery_row[$i]['position'];
					$gallery_img_db = $db->prepare("SELECT * FROM gallery_img WHERE gallery_id =? ORDER BY FIELD( position, $position)");
					$gallery_img_db->execute(array($gallery_row[$i]['id']));
					$gallery_img_row = $gallery_img_db->fetchAll();
					$gallery_img_count = $gallery_img_db->rowCount();
				?>	
					<div class="gallery">
						<?if($gallery_row[$i]['password'] == ''){?><img class="prewiew" src="<?echo $gallery_img_row[0]['img']?>" alt=""><?}?>
						<p class="date"><?echo $gallery_row[$i]['date']?></p>
						<div class="gallery-label">
							<p class="h_1"><?echo $gallery_row[$i]['title']?></p>
							<p class="h_2"><?echo $gallery_row[$i]['title_small']?></p>
						</div>
						<div class="gallery-buttons">
							<div class="edit"></div>
							<span class='display tid'><?echo $gallery_row[$i]['id']?></span>
							<div class="close_cross delete_gallery"></div>
							<span class='display tname'><?if($gallery_row[$i]['password'] == ''){echo 'gallery';}else{echo 'gallery_closed';}?></span>
						</div>
						<?if($gallery_row[$i]['password'] != ''){?><p class="pass">пароль: <?echo $gallery_row[$i]['password']?></p><?}?>					
					</div>
					<!---->
					<div class="gallery-edit-form display edit_closed_gallery">
						<div class="CMS-buttons">
							<form class="gallery_update_form">
							<input type="text" name="h_1" class="h_1" value="<?echo $gallery_row[$i]['title']?>" onfocus="if(this.value=='ЗАГОЛОВОК 1') this.value='';" onblur="if(!this.value) this.value='ЗАГОЛОВОК 1';">
							<input type="text" name="date" class="date" value="<?echo $gallery_row[$i]['date']?>" onfocus="if(this.value=='ДАТА') this.value='';" onblur="if(!this.value) this.value='ДАТА';">
							<p class="label-date">в формате 01.02</p>
							<input type="text" name="h_2" class="h_2" value="<?echo $gallery_row[$i]['title_small']?>" onfocus="if(this.value=='Заголовок 2') this.value='';" onblur="if(!this.value) this.value='Заголовок 2';">
							<?if($gallery_row[$i]['password'] != ''){?><input type="text" name="pass" class="pass" value="<?echo $gallery_row[$i]['password']?>" onfocus="if(this.value=='ПАРОЛЬ') this.value='';" onblur="if(!this.value) this.value='ПАРОЛЬ';">
							<p class="label-pass">максимум 5 символов</p><?}?>	
							</form>
						</div>
						<div class="gallery-photos <?if($gallery_row[$i]['password'] != ''){?>edit_closed_gallery-photos<?}?>">
							<div class="photo-left">
								<!-- <p class="top-label">Фотографии</p> -->
								<div class="button">
									<p>Добавить фото</p>
									<form class="frm"> 
										<input type="file" multiple class="upload_btn" />
									</form>
								</div>
								<span class='display tid'><?echo $gallery_row[$i]['id']?></span>
								<div class="button save <?if($gallery_row[$i]['password'] == ''){echo 'update_gallery_save';}else{echo 'update_closed_gallery_save';}?>">
									<p>Сохранить</p>
								</div>
								<span class='display tname'><?if($gallery_row[$i]['password'] == ''){echo 'gallery';}else{echo 'gallery_closed';}?></span>
								<div class="button decline">
									<p>Отменить</p>
								</div>
							</div>
							<div class="CMS-prewiew photo sortable_edit" ondragover="return false" ondragstart="return false">
							
								<?
								for($d=0;$d<$gallery_img_count;$d++){
								?>
								<div id="gallery_<?echo $gallery_img_row[$d]['position']?>" class="photo-preview photo-preview-old">
									<img src="<?echo $gallery_img_row[$d]['img']?>" alt="">
									<div class="close_cross"></div>
								</div>
								<?}?>
							</div>
						</div>
					</div><!-- gallery-edit-form -->
				<?}?>
				</div>
			</div>
			<?
			$contacts_db = $db->prepare("SELECT * FROM contacts");
			$contacts_db->execute();
			$contacts_row = $contacts_db->fetch();
			?>
			<h2>Контакты</h2>
			<div class="CMS-block info-clients">
				<div class="left-label">
					<p>Информация</p>
				</div>
				<div class="right-content">
					<form id='contacts_form'>
					<ul>
						<li>
							<div class="label fb_CMS"></div>
							<input type="text" name="fb" value="<?echo $contacts_row['fb']?>">
						</li>
						<li>
							<p class="label">mail</p>
							<input type="text" name="mail" value="<?echo $contacts_row['mail']?>">
						</li>
						<li>
							<div class="label vk_CMS"></div>
							<input type="text" name="vk" value="<?echo $contacts_row['vk']?>">
						</li>
						<li>
							<p class="label">phone1</p>
							<input type="text" name="phone1" value="<?echo $contacts_row['phone1']?>">
						</li>
						<li>
							<div class="label inst_CMS"></div>
							<input type="text" name="insta" value="<?echo $contacts_row['insta']?>">
						</li>
						<li>
							<p class="label">phone2</p>
							<input type="text" name="phone2" value="<?echo $contacts_row['phone2']?>">
						</li>
						<li>
							<div class="label tw_CMS"></div>
							<input type="text" name="tw" value="<?echo $contacts_row['tw']?>">
						</li>
						<li>
							<div class="button save contacts_save">
								<p>Сохранить</p>
							</div>
						</li>
					</ul>
					</form>
				</div>
			</div>
			<div class="CMS-block new-clients">
				<div class="left-label">
					<p>Новый клиент</p>
				</div>
				<div class="right-content">
					<div class="CMS-buttons">
						<div class="button add_photo">
							<form class="frm"> 
								<input type="file" class="upload_btn" />
							</form>
							<p>Добавить лого</p>
						</div>
						<div class="button save new_client_save">
							<p>Сохранить</p>
						</div>
						<span class='display tname'>clients</span>
					</div>
					<div class="new_client-logo CMS-prewiew" ondragover="return false" ondragstart="return false">
						<span class="delete_current upload_preview">
							<div class="photo-preview photo-preview-old delete_current">
							</div>
						</span>
					</div>
					<div class="new_client-form">
						<form id="new_client_form">
						<p>название компании</p>
						<input type="text" name="company_name">
						<p>ссылка на мероприятие</p>
						<input type="text" name="event_url">
						</form>
					</div>				
				</div>
			</div>
			<div class="CMS-block clients-clients last_block">
				<div class="left-label">
					<p>Клиенты</p>
				</div>
				<div class="CMS-buttons">
					<div class="button save">
						<p>Сохранить</p>
					</div>
					<span class='display tname'>contactsclients</span>
				</div>
				<div class="right-content sortable">
					<?
					$contacts_clients_db = $db->prepare("SELECT * FROM clients ORDER BY FIELD( contacts_position,  $contacts_clients)");
					$contacts_clients_db->execute();
					$contacts_clients_row = $contacts_clients_db->fetchAll();
					$contacts_clients_count = $contacts_clients_db->rowCount();
					for($i=0;$i<$contacts_clients_count;$i++){
					?>
					<div id="clients_<?echo $contacts_clients_row[$i]['contacts_position']?>" class="clients-prewiew">
						<img src="<?echo $contacts_clients_row[$i]['img']?>" alt="">
						<div class="close_cross clients_delete"></div>
					</div>
					<?}?>
				</div>
			</div>
			<h2>Мероприятия</h2>
			<div class="CMS-block new_event">
				<div class="left-label">
					<p>Новое мероприятие</p>
				</div>
				<div class="right-content">
					<div class="event-edit-form notfade">
						<div class="left-side">
							<div class="button add_photo">
								<form class="frm"> 
									<input type="file" class="upload_btn" />
								</form>
								<p>Добавить фото</p>
							</div>
							<div class="button save new_blog_save">
								<p>Сохранить</p>
							</div>
							<span class='display tname'>blog</span>
						</div>
						<div class="new_client-logo CMS-prewiew" ondragover="return false" ondragstart="return false">
							<span class="delete_current upload_preview">
								<div class="photo-preview">
									<div class="close_cross"></div>	
								</div>
							</span>
						</div>
						<form id="new_blog_form">
						<div class="right-side">
							<p class="h_1">заголовок1</p>
							<input type="text" name="event-h_1">
							<p class="h_2">заголовок2</p>
							<input type="text" name="event-h_2">
							<p class="label-text">текст мероприятия</p>
							<textarea name="event-text" ></textarea>
							<p class="label-symbols_left">1000 символов</p>
						</div>
						<div class="bottom-side">
							<input type="text" name="date" class="date" value="ДАТА" onfocus="if(this.value=='ДАТА') this.value='';" onblur="if(!this.value) this.value='ДАТА';">						
							<input type="text" name="gallery_url" class="gallery_url">
							<p class="label-gallery_url">ссылка на галерею</p>
							<p class="label-date">в формате 01.02</p>
						</div>
						</form>					
					</div>
				</div>
			</div>
			<div class="CMS-block your_events last_block">
				<div class="left-label">
					<p>Ваши мероприятия</p>
				</div>
				<div class="right-content sbscroller">
					<?
					$blog_db = $db->prepare("SELECT * FROM blog ORDER BY id DESC");
					$blog_db->execute();
					$blog_row = $blog_db->fetchAll();
					$blog_count = $blog_db->rowCount();

					for($i=0;$i<$blog_count;$i++){
					$photo_count=0;
					if($blog_row[$i]['gallery_id'] !=0){
						$blog_number = $db->prepare("SELECT url_name,position FROM gallery WHERE id=?");
						$blog_number->execute(array($blog_row[$i]['gallery_id']));
						$blog_number_row = $blog_number->fetch();
						if(!empty($blog_number_row)){
							$photo=explode(',', $blog_number_row['position']);
							$photo_count=count($photo);
						}
					}
					?>
					<div class="gallery event">
						<img class="prewiew" src="<?echo $blog_row[$i]['img'];?>" alt="">
						<p class="date"><?echo $blog_row[$i]['date'];?></p>
						<div class="gallery-label">
							<p class="h_1"><?echo $blog_row[$i]['title'];?></p>
							<p class="h_2"><?echo $blog_row[$i]['title_small'];?></p>
						</div>
						<div class="photo-label">
							<p><?echo $photo_count;?></p>
							<div class="event-photos-label"></div>
						</div>
						<div class="gallery-buttons">
							<div class="edit"></div>
							<span class="display tid"><?echo $blog_row[$i]['id'];?></span>
							<div class="close_cross delete_blog"></div>
							<span class="display tname">blog</span>
						</div>
					</div>
					<!---->
					<div class="event-edit-form display">
						<div class="left-side">
							<div class="button add_photo">
								<form class="frm"> 
									<input type="file" multiple class="upload_btn" />
								</form>
								<p>Добавить фото</p>
							</div>
							<span class='display tid'><?echo $blog_row[$i]['id']?></span>
							<div class="button save update_blog_save">
								<p>Сохранить</p>
							</div>
							<span class='display tname'>blog</span>
							<div class="button decline">
								<p>Отменить</p>
							</div>
						</div>
						<div class="new_client-logo CMS-prewiew" ondragover="return false" ondragstart="return false">
							<span class="delete_current upload_preview">
								<div class="photo-preview">
									<img class="prewiew" src="<?echo $blog_row[$i]['img'];?>" alt="">
								</div>
							</span>
						</div>
						<form id="update_blog_form">
						<div class="right-side">
							<p class="h_1">заголовок1</p>
							<input type="text" name="event-h_1" value="<?echo $blog_row[$i]['title'];?>">
							<p class="h_2">заголовок2</p>
							<input type="text" name="event-h_2" value="<?echo $blog_row[$i]['title_small'];?>">
							<p class="label-text">текст мероприятия</p>
							<textarea name="event-text"><?echo $blog_row[$i]['text'];?></textarea>
							<p class="label-symbols_left">1000 символов</p>
						</div>
						<div class="bottom-side">
							<input type="text" name="date" class="date" placeholder="ДАТА" value="<?echo $blog_row[$i]['date'];?>">						
							<input type="text" name="gallery_url" class="gallery_url" value="<?echo $blog_number_row['url_name'];?>">
							<p class="label-gallery_url">ссылка на галерею</p>
							<p class="label-date">в формате 01.02</p>
						</div>
						</form>				
					</div><!-- event-edit-form -->
					<?}?>
				</div>
			</div>
			<h2>Пароль</h2>
			<div class="CMS-block chng_pass last_block">
				<div class="left-label">
					<p>Смена пароля</p>
				</div>
				<div class="right-content">
					<div class="CMS-buttons">
						<div class="button save password_save">
							<p>Сохранить</p>
						</div>
					</div>
					<div class="chng_pass-form">
						<form id='password_form'>
						<p>старый пароль</p>
						<input type="password" name="old_pass" value="">
						<p>новый пароль</p>
						<input type="password" name="new_pass" value="">
						</form>
					</div>
				</div>
			</div>




		</div><!-- end of content -->	
	</div><!-- end of container -->


</body>
</html>