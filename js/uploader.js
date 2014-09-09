var $ = jQuery.noConflict();

$(document).ready(function() {
	// В dataTransfer помещаются изображения которые перетащили в область div
	jQuery.event.props.push('dataTransfer');
	
	// Максимальное количество загружаемых изображений за одни раз
	var maxFiles = 999;
	
	// Оповещение по умолчанию
	var errMessage = 0;
	var previewZone
	// Кнопка выбора файлов
	var defaultUploadBtn;
	var prewiewCount = $('.CMS-prewiew').index();
	var dataArray = [];
	// Массив для всех изображений
	for(var i = 0; i < prewiewCount; i++){
		dataArray[i] = [];
	}
	var Index;
	var maxPosition;
	var beforePosition;
// $('.sortable').on( function() {
// 	$('.sortable').sbscroller('refresh');
// });
	// Область информер о загруженных изображениях - скрыта
	// Метод при падении файла в зону загрузки
	$('.CMS-prewiew').live('drop', function(e) {
		
		previewZone = $(this).find('.upload_preview');
		Index = $('.CMS-prewiew').find('.upload_preview').index(previewZone);
		
		//dataArray[Index]=dataArrayArray;
		if(previewZone.hasClass('delete_current')){previewZone.find('div').remove();}
		var defaultUploadBtn = $(this).prev().find('input');
		var files = e.dataTransfer.files;

		loadInView(files,Index);
	});
	
	// При нажатии на кнопку выбора файлов
	$('.upload_btn').live('change', function() {
		previewZone = $(this).parent().parent().parent().next().find('.upload_preview');
		Index = $('.CMS-prewiew').find('.upload_preview').index(previewZone);
		$('.photo-preview-new').not(previewZone+'.photo-preview-new').remove();
		if(previewZone.hasClass('delete_current')){previewZone.find('div').remove();}
		
   		// Заполняем массив выбранными изображениями
   		var files = $(this)[0].files;
   		// Проверяем на максимальное количество файлов
			// Передаем массив с файлами в функцию загрузки на предпросмотр
			loadInView(files,Index);
			// Очищаем инпут файл путем сброса формы
            $(this).closest('.frm').each(function(){
	        	    this.reset();
			});
	});
	
	// Функция загрузки изображений на предросмотр
	function loadInView(files,Index) {
		// Для каждого файла
		$.each(files, function(index, file) {
			// Создаем новый экземпляра FileReader
			var fileReader = new FileReader();
				// Инициируем функцию FileReader
				fileReader.onload = (function(file) {
					return function(e) {
						// Помещаем URI изображения в массив

						dataArray[Index].push({name : file.name, value : this.result});
						addImage((dataArray[Index].length-1),previewZone,Index);

					}; 
				})(files[index]);
			// Производим чтение картинки по URI
			fileReader.readAsDataURL(file);
		});
		return false;
	}
		
	// Процедура добавления эскизов на страницу
	function addImage(ind,cs,Index) {
		var tableName = cs.closest('.CMS-prewiew').prev('div').find('.tname').text();

		if(cs.hasClass('delete_current')){
			maxPosition = ind;
		}else{
			beforePosition = cs.sortable("toArray");
			maxPosition =Math.max.apply(null,beforePosition.join("").split(tableName+'_'))+1;
		}
		// Если индекс отрицательный значит выводим весь массив изображений
		if (ind < 0 ) { 
		start = 0; end = dataArray[Index].length; 
		} else {
		// иначе только определенное изображение 
		start = ind; end = ind+1; } 
		// Оповещения о загруженных файлах
		// Цикл для каждого элемента массива
		for (i = start; i < end; i++) {
			// размещаем загруженные изображения
			cs.append('<div id="'+tableName+'_'+maxPosition+'" class="photo-preview photo-preview-new"><img src="'+dataArray[Index][i].value+'" alt=""><div class="close_cross close_cross_new"></div></div>'); 
		}
		$(".sortable").children().sortable({ revert:true, cancel: ".ps-scrollbar-y-rail"});
		$('.sortable').sbscroller('refresh');
		return false;
	}
	
	
	$('.close_cross_new').live('click',function(){
		$this= $(this);
		timeOut= 500;
		$this.closest('.photo-preview').fadeOut(timeOut)
		setTimeout( function() { $this.closest('.photo-preview').remove()}, timeOut);

		Index = $('.CMS-prewiew').index($this.closest('.CMS-prewiew'));
		deleteIndex = $this.closest('.CMS-prewiew').find('.close_cross_new').index(this);
		dataArray[Index].splice(deleteIndex,1);
	})
	$('.photo-preview-old').find('.close_cross').live('click',function(){
		closeCross= $(this);
		timeOut= 500;
		closeCross.closest('.photo-preview').fadeOut(timeOut)
		setTimeout( function() {
			var tablename = closeCross.closest('.CMS-prewiew').prev().find('.tname').text();
			var galleryId = closeCross.closest('.CMS-prewiew').prev().find('.tid').text();
			var deletePosition = closeCross.closest('.photo-preview-old').attr('id').split('_');
			var saveView = closeCross.closest('.upload_preview');
			closeCross.closest('.photo-preview').remove();
			var position = saveView.sortable("toArray");
			
			$.post('backend/position.php', {position:position, tablename: tablename, id : galleryId });
			$.post('backend/delete.php', {deletePosition:deletePosition[1], tablename: tablename, id : galleryId});
		}, timeOut);
	})
	$('.delete_gallery').click(function(){
		closeCross= $(this);
		timeOut= 500;
		closeCross.closest('.gallery').fadeOut(timeOut)
		setTimeout( function() {
			var tablename = closeCross.next().text();
			var galleryId = closeCross.prev().text();
			closeCross.closest('.gallery').remove();
			var galleryDeleteFlag = 1;
			$.post('backend/delete.php', {gallerydeleteflag: galleryDeleteFlag , tablename: tablename, id : galleryId});
		}, timeOut);
	})
	$('.delete_blog').click(function(){
		closeCross= $(this);
		timeOut= 500;
		closeCross.closest('.photo-preview').fadeOut(timeOut)
		setTimeout( function() {
			var tablename = closeCross.next().text();
			var galleryId = closeCross.prev().text();
			closeCross.closest('.gallery').remove();
			var galleryDeleteFlag = 1;
			$.post('backend/delete.php', {gallerydeleteflag: galleryDeleteFlag , tablename: tablename, id : galleryId});
		}, timeOut);
	})
	$('.clients_delete').live('click',function(){
		closeCross= $(this);
		timeOut= 500;
		closeCross.closest('.clients-prewiew').fadeOut(timeOut)
		setTimeout( function() {
			var tablename = closeCross.closest('.right-content').prev().find('.tname').text();
			var deletePosition = closeCross.closest('.clients-prewiew').attr('id').split('_');
			var saveView = closeCross.closest('.upload_preview');
			closeCross.closest('.clients-prewiew').remove();
			var position = saveView.sortable("toArray");
			$.post('backend/position.php', {position:position, tablename: tablename});
			$.post('backend/delete.php', {deletePosition:deletePosition[1], tablename: tablename});
		}, timeOut);
	})
	var lastInsertdeId;
	// Загрузка изображений на сервер
	$('.save').live('click',function() {
		var saveButton = $(this);
		var saveView = saveButton.parent('div').next().find('.upload_preview');
		var saveIndex = $('.CMS-prewiew').find('.upload_preview').index(saveView);
		if(saveButton.hasClass('instabudka_save')){
			var table = saveButton.next().text().split("_");
			var tableName = table[0];
			var tableFile = table[1];
			$.each(dataArray[saveIndex], function(index, file) {	
				// загружаем страницу и передаем значения, используя HTTP POST запрос
				$.post('backend/upload.php', {tablefile: tableFile, tablename: tableName, file :dataArray[saveIndex][index] });
			});
		}else if(saveButton.hasClass('new_gallery_save')){
			var new_gallery_form = $('#new_gallery_form')
			var textserialize = new_gallery_form.serialize();
			var position = saveView.sortable("toArray");
			startPosition = saveView.find('.photo-preview-old').length;
			saveView.find('.photo-preview-new').removeClass('photo-preview-new').addClass('photo-preview-old');

			var tableName = saveButton.next().text();
			saveButton.parent('div').next().find('.upload_preview').find('.close_cross_new').removeClass('close_cross_new');
			// $.post('backend/position.php', {position:position, tablename: tableName });
			file = dataArray[saveIndex];
			$.post('backend/upload.php', {textserialize:textserialize , tablename: tableName, position:position}, function(dataid,success){
				lastInsertedId= dataid;
				$.post('backend/upload_images.php', {lastinsertedid:lastInsertedId ,file :file, tablename: tableName, position: position}, function(data,success){
					window.location.reload();
				});
			});
			dataArray[saveIndex] = [];
			// new_gallery_form.find('.h_1').val('ЗАГОЛОВОК 1');
			// new_gallery_form.find('.h_2').val('Заголовок 2');
			// new_gallery_form.find('.date').val('ДАТА');
			// saveButton.closest('.photo-left').next().find('.photo-preview').remove();
			// saveButton.closest('.new_gallery').addClass('display');
			return false;
		}else if(saveButton.hasClass('new_closed_gallery_save')){
			new_closed_gallery_form = $('#new_closed_gallery_form');
			var textserialize = new_closed_gallery_form.serialize();
			var position = saveView.sortable("toArray");
			startPosition = saveView.find('.photo-preview-old').length;
			saveView.find('.photo-preview-new').removeClass('photo-preview-new').addClass('photo-preview-old');
			var tableName = saveButton.next().text();
			saveButton.parent('div').next().find('.upload_preview').find('.close_cross_new').removeClass('close_cross_new');
			// $.post('backend/position.php', {position:position, tablename: tableName });
			file = dataArray[saveIndex];
			$.post('backend/upload.php', {textserialize:textserialize , tablename: tableName}, function(dataid,success){
				lastInsertedId= dataid;
				$.post('backend/upload_images.php', {lastinsertedid:lastInsertedId ,file :file, tablename: tableName});
			});
			
			dataArray[saveIndex] = [];
			new_closed_gallery_form.find('.h_1').val('ЗАГОЛОВОК 1');
			new_closed_gallery_form.find('.h_2').val('Заголовок 2');
			new_closed_gallery_form.find('.date').val('ДАТА');
			new_closed_gallery_form.find('.pass').val('ПАРОЛЬ');
			saveButton.closest('.photo-left').next().find('.photo-preview').remove();
			saveButton.closest('.new_gallery').addClass('display');
			return false;
		}else if(saveButton.hasClass('update_gallery_save')){
			var textserialize = saveButton.closest('.gallery-photos').prev().find('.gallery_update_form').serialize();
			var position = saveView.sortable("toArray");
			startPosition = saveView.find('.photo-preview-old').length;
			saveView.find('.photo-preview-new').removeClass('photo-preview-new').addClass('photo-preview-old');
			var tableName = saveButton.next().text();
			saveButton.parent('div').next().find('.upload_preview').find('.close_cross_new').removeClass('close_cross_new');
			// $.post('backend/position.php', {position:position, tablename: tableName });
			file = dataArray[saveIndex];
			id= saveButton.prev().text()
			$.post('backend/update.php', {id: id , textserialize:textserialize , tablename: tableName, position:position}, function(dataid,success){
				lastInsertedId= dataid;
				alert(lastInsertedId)
				$.post('backend/upload_images.php', {lastinsertedid:id ,file :file, tablename: tableName, position:position, startPosition:startPosition}, function(dataid,success){
					window.location.reload();
				});
			});
			dataArray[saveIndex] = [];
			return false;
		}else if(saveButton.hasClass('update_closed_gallery_save')){
			var textserialize = saveButton.closest('.gallery-photos').prev().find('.gallery_update_form').serialize();
			var position = saveView.sortable("toArray");
			startPosition = saveView.find('.photo-preview-old').length;
			saveView.find('.photo-preview-new').removeClass('photo-preview-new').addClass('photo-preview-old');
			var tableName = saveButton.next().text();
			saveButton.parent('div').next().find('.upload_preview').find('.close_cross_new').removeClass('close_cross_new');
			file = dataArray[saveIndex];
			id= saveButton.prev().text()
			$.post('backend/update.php', {id: id , textserialize:textserialize , tablename: tableName, position:position,file :file}, function(dataid,success){
				lastInsertedId= dataid;
				// $.post('backend/upload_images.php', {lastinsertedid:id ,file :file, tablename: tableName, position:position, startPosition:startPosition});
				window.location.reload();
			});
			dataArray[saveIndex] = [];
			return false;
		}else if(saveButton.hasClass('contacts_save')){
			var textserialize = $('#contacts_form').serialize();
			var tableName ='contacts';
			$.post('backend/update.php', { textserialize:textserialize, tablename: tableName });
			return false;
		}else if(saveButton.hasClass('password_save')){
			var textserialize = $('#password_form').serialize();
			var tableName ='password';
			$.post('backend/update.php', { textserialize:textserialize, tablename: tableName });
			return false;
		}else if(saveButton.hasClass('new_client_save')){
			var new_client_form = $('#new_client_form')
			var textserialize = new_client_form.serialize();
			var clientsPosition = saveButton.closest('.new-clients').next().find('.upload_preview');

			var position = clientsPosition.sortable("toArray");
			startPosition = clientsPosition.find('.clients-prewiew').length;
			
			var tableName = saveButton.next().text();
			file = dataArray[saveIndex];

			// var files = e.dataTransfer.files;
			// loadInView(files,Index);
			maxPosition =Math.max.apply(null,position.join("").split(tableName+'_'))+1;
			if(position.length == 0){
				position[0] = 'clients_1';
			}
			$.post('backend/position.php', {position:position, tablename: tableName });
			$.each(dataArray[saveIndex], function(index, file) {
				$.post('backend/upload.php', {textserialize:textserialize ,tablename: tableName, file :dataArray[saveIndex][index], position:maxPosition}, function(dataid,success){
					dataArray[saveIndex] = [];
					window.location.reload();
				});
			});
			
		}else if(saveButton.hasClass('new_blog_save')){
			var textserialize = $('#new_blog_form').serialize();
			var position = saveView.sortable("toArray");
			var tableName = saveButton.next().text();
			$.each(dataArray[saveIndex], function(index, file) {
				$.post('backend/upload.php', {textserialize:textserialize , tablename: tableName,file :dataArray[saveIndex][index]}, function(data, success) {
					dataArray[saveIndex] = [];
					window.location.reload();
				});
			});
		}else if(saveButton.hasClass('update_blog_save')){
			var textserialize = $('#update_blog_form').serialize();
			var position = saveView.sortable("toArray");
			var tableName = saveButton.next().text();
			var updateId = saveButton.prev().text();
			file = dataArray[saveIndex];
				$.post('backend/update.php', {textserialize:textserialize , tablename: tableName,file :file, id:updateId}, function(data, success) {
					dataArray[saveIndex] = [];
					window.location.reload();
				});
		}else{
			var position = saveView.sortable("toArray");
			startPosition = saveView.find('.photo-preview-old').length;
			saveView.find('.photo-preview-new').removeClass('photo-preview-new').addClass('photo-preview-old');
			var tableName = saveButton.next().text();
			saveButton.parent('div').next().find('.upload_preview').find('.close_cross_new').removeClass('close_cross_new');
				alert(position)
				alert(tableName)
				alert(startPosition)
			// $.post('backend/position.php', {position:position, tablename: tableName });
			// $.each(dataArray[saveIndex], function(index, file) {	
			// 	// загружаем страницу и передаем значения, используя HTTP POST запрос
			// 	$.post('backend/upload.php', {position:position[index+startPosition], tablename: tableName, file :dataArray[saveIndex][index] });
			// });
			dataArray[saveIndex] = [];
			return false;
		}
	});

	$('.CMS-prewiew').live('drop', function() {
		return false;
	});
	
});