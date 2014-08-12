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
	
	// Массив для всех изображений
	var dataArray = [];
	
	// Область информер о загруженных изображениях - скрыта
	
	// Метод при падении файла в зону загрузки
	$('.CMS-prewiew').on('drop', function(e) {
		previewZone = $(this);
		dataArray.length = 0;
		$('.photo-prewiew-new').not(previewZone+'.photo-prewiew-new').remove();
		var defaultUploadBtn = $(this).prev('.CMS-buttons').find('input');
		
		
		// Передаем в files все полученные изображения
		var files = e.dataTransfer.files;
		// Проверяем на максимальное количество файлов
			// Передаем массив с файлами в функцию загрузки на предпросмотр
			loadInView(files);
	});
	
	// При нажатии на кнопку выбора файлов
	$('.upload_btn').on('change', function() {
		previewZone = $(this).closest('.CMS-buttons').next();
   		// Заполняем массив выбранными изображениями
   		var files = $(this)[0].files;
   		// Проверяем на максимальное количество файлов
			// Передаем массив с файлами в функцию загрузки на предпросмотр
			loadInView(files);
			// Очищаем инпут файл путем сброса формы
            $(this).closest('.frm').each(function(){
	        	    this.reset();
			});
	});
	
	// Функция загрузки изображений на предросмотр
	function loadInView(files) {
		// Для каждого файла
		$.each(files, function(index, file) {
			// Создаем новый экземпляра FileReader
			var fileReader = new FileReader();
				// Инициируем функцию FileReader
				fileReader.onload = (function(file) {
					return function(e) {
						// Помещаем URI изображения в массив
						dataArray.push({name : file.name, value : this.result});
						addImage((dataArray.length-1),previewZone);
					}; 
				})(files[index]);
			// Производим чтение картинки по URI
			fileReader.readAsDataURL(file);
		});
		return false;
	}
		
	// Процедура добавления эскизов на страницу
	function addImage(ind,cs) {
		// Если индекс отрицательный значит выводим весь массив изображений
		if (ind < 0 ) { 
		start = 0; end = dataArray.length; 
		} else {
		// иначе только определенное изображение 
		start = ind; end = ind+1; } 
		// Оповещения о загруженных файлах
		// Цикл для каждого элемента массива
		for (i = start; i < end; i++) {
			// размещаем загруженные изображения
				cs.append('<div class="photo-prewiew photo-prewiew-new"><img src="'+dataArray[i].value+'" alt=""></div>'); 
		}
		return false;
	}
	
	// Функция удаления всех изображений
	/*function restartFiles() {
		// Удаляем все изображения на странице и скрываем кнопки
		$('#dropped-files > .image').remove();
	
		// Очищаем массив
		dataArray.length = 0;
		
		return false;
	}*/
	
	// Удаление только выбранного изображения 
	/*$("#dropped-files").on("click","a[id^='drop']", function() {
		// получаем название id
 		var elid = $(this).attr('id');
		// создаем массив для разделенных строк
		var temp = new Array();
		// делим строку id на 2 части
		temp = elid.split('-');
		// получаем значение после тире тоесть индекс изображения в массиве
		dataArray.splice(temp[1],1);
		// Удаляем старые эскизы
		$('#dropped-files > .image').remove();
		// Обновляем эскизи в соответсвии с обновленным массивом
		addImage(-1);		
	});
	
	// Удалить все изображения кнопка 
	$('#dropped-files #upload-button .delete').click(restartFiles);
	*/
	// Загрузка изображений на сервер
	$('.save').click(function() {
		// Для каждого файла
		$.each(dataArray, function(index, file) {	
			// загружаем страницу и передаем значения, используя HTTP POST запрос 
			$.post('backend/upload.php', dataArray[index], function(data) {
				var fileName = dataArray[index].name;
				// Формируем в виде списка все загруженные изображения
				// data формируется в upload.php
				var dataSplit = data.split(':');
			});
		});
		dataArray.length = 0;
		// Показываем список загруженных файлов
		return false;
	});
	// Простые стили для области перетаскивания
	/*$('.CMS-prewiew').on('dragenter', function() {
		$(this).css({'box-shadow' : 'inset 0px 0px 20px rgba(0, 0, 0, 0.1)', 'border' : '4px dashed #bb2b2b'});
		return false;
	});*/
	
	$('.CMS-prewiew').on('drop', function() {
		//$(this).css({'box-shadow' : 'none', 'border' : '4px dashed rgba(0,0,0,0.2)'});
		return false;
	});
	/*$('.CMS-prewiew').on('dragleave', function() {
		$(this).css({'box-shadow' : 'none', 'border' : '4px dashed rgba(0,0,0,0.2)'});
		return false;
	});*/
});