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
			cs.append('<div class="photo-preview photo-preview-new"><img src="'+dataArray[Index][i].value+'" alt=""><div class="close_cross close_cross_new"></div></div>'); 
		}
		$(".sortable").children().sortable({ revert:true, cancel: ".ps-scrollbar-y-rail"});
		$('.sortable').sbscroller('refresh');
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
	$('.close_cross').live('click',function(){
		$this= $(this);
		timeOut= 500;
		$this.closest('.photo-preview').fadeOut(timeOut)
		setTimeout( function() { $this.closest('.photo-preview').remove()}, timeOut);
	});
	$('.close_cross_new').live('click',function(){
		Index = $('.CMS-prewiew').index($(this).closest('.CMS-prewiew'));
		deleteIndex = $(this).closest('.CMS-prewiew').find('.close_cross_new').index(this);
		// dataArray[Index][deleteIndex]=[];
		dataArray[Index].splice(deleteIndex,1);
		// alert(deleteIndex)
		// alert(dataArray[Index][0]);
		
	})
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
	$('.save').live('click',function() {
		var saveView = $(this).parent('div').next().find('.upload_preview');
		$(this).parent('div').next().find('.upload_preview').find('.close_cross_new').removeClass('close_cross_new');
		saveIndex = $('.CMS-prewiew').find('.upload_preview').index(saveView);
		// Для каждого файла
		$.each(dataArray[saveIndex], function(index, file) {	
			// загружаем страницу и передаем значения, используя HTTP POST запрос 
			$.post('backend/upload.php', dataArray[saveIndex][index], function(data) {
				var fileName = dataArray[saveIndex][index].name;
				// Формируем в виде списка все загруженные изображения
				// data формируется в upload.php
				var dataSplit = data.split(':');
			});
		});

		// alert(dataArray[saveIndex].length)
		dataArray[saveIndex] = [];
		// Показываем список загруженных файлов
		return false;
	});
	// Простые стили для области перетаскивания
	/*$('.CMS-prewiew').on('dragenter', function() {
		$(this).css({'box-shadow' : 'inset 0px 0px 20px rgba(0, 0, 0, 0.1)', 'border' : '4px dashed #bb2b2b'});
		return false;
	});*/
	
	$('.CMS-prewiew').live('drop', function() {
		//$(this).css({'box-shadow' : 'none', 'border' : '4px dashed rgba(0,0,0,0.2)'});
		return false;
	});
	/*$('.CMS-prewiew').on('dragleave', function() {
		$(this).css({'box-shadow' : 'none', 'border' : '4px dashed rgba(0,0,0,0.2)'});
		return false;
	});*/
});