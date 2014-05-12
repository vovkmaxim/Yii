<link rel="stylesheet" href="./kindeditor/default.css" />
		<script charset="utf-8" src="./kindeditor/kindeditor.js"></script>
		<script charset="utf-8" src="./kindeditor/ru_Ru.js"></script>
		
	
		<script>
			
			KindEditor.ready(function(K) {
				K.create('#content1', {
				
					cssPath : ['./kindeditor/plugins/code/prettify.css', 'index.css'],
						autoHeightMode : true,
					afterCreate : function() {
						this.loadPlugin('autoheight');
					},
					allowFileManager : true,
				items : [
		'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste',
		'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
		'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
		'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
		'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
		'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage',
		'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons','pagebreak',
		'anchor', 'link',  'unlink','map', '|', 'about'
	]
				});
		
				var colorpicker;
				K('#colorpicker').bind('click', function(e) {
					e.stopPropagation();
					if (colorpicker) {
						colorpicker.remove();
						colorpicker = null;
						return;
					}
					var colorpickerPos = K('#colorpicker').pos();
					colorpicker = K.colorpicker({
						x : colorpickerPos.x,
						y : colorpickerPos.y + K('#colorpicker').height(),
						z : 19811214,
						selectedColor : 'default',
						noColor : 'Очистить',
						click : function(color) {
							K('#color').val(color);
							colorpicker.remove();
							colorpicker = null;
						}
					});
				});
				K(document).click(function() {
					if (colorpicker) {
						colorpicker.remove();
						colorpicker = null;
					}
				});
				
						var editor = K.editor({
					allowFileManager : true
				});
				K('#insertfile').click(function() {
					editor.loadPlugin('insertfile', function() {
						editor.plugin.fileDialog({
							fileUrl : K('#url').val(),
							clickFn : function(url, title) {
								K('#url').val(url);
								editor.hideDialog();
							}
						});
					});
				});
				K('#image1').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							imageUrl : K('#url1').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#url1').val(url);
								editor.hideDialog();
							}
						});
					});
				});
				K('#image2').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							showLocal : false,
							imageUrl : K('#url2').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#url2').val(url);
								editor.hideDialog();
							}
						});
					});
				});
				K('#image3').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							showRemote : false,
							imageUrl : K('#url3').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#url3').val(url);
								editor.hideDialog();
							}
						});
					});
				});
				
			});
		</script>


		
		<textarea id="content1" name="content" style="width:750px;height:200px;visibility:hidden;"></textarea>
		<input type="text" id="color" value="" /> <input type="button" id="colorpicker" value="Выбор цвета" />

		<p><input type="text" id="url1" value="" /> <input type="button" id="image1" value="Загрузить" />（Каталог + Система)</p>
		<p><input type="text" id="url2" value="" /> <input type="button" id="image2" value="Загрузить" />（Каталог）</p>
		<p><input type="text" id="url3" value="" /> <input type="button" id="image3" value="Загрузить" />（Система）</p>


		<input type="text" id="url" value="" /> <input type="button" id="insertfile" value="Файл" />

