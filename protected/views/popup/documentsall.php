<div id="inline-content">
    <?php echo CHtml::beginForm('','', array('class' => 'form_documents')); ?>
    <div class="popup_header_holder">
        <h1>CHI Marketing Documents</h1>
    </div>
    <p>Please select what marketing documents you would like to download.</p>
    <div class="two-columns group">
        <div class="col">
            <?php
            $i = 1;
            foreach($files as $item) {
                echo '
                                <div class="row group">
                                    <input type="checkbox" id="doc1" name="file'. $i .'" value="'. $item->file .'">
                                    <label for="doc1">'. $item->title .'</label>
                                </div>
                            ';
                $i++;
            }
            ?>
        </div>
    </div>
    <div class="submit-holder">
        <?php
        echo CHtml::ajaxSubmitButton('Download Selected Documents', Yii::app()->request->baseUrl.'/index.php/ajax/documents', array(
                'type' => 'POST',
                'dataType' => 'json',
                'success'=>'function (data) {
						if(data.true) {
							$.colorbox.close();
							location.href = "documents/"+data.true;
						}
					}'
            ),
            array(
                'type' => 'submit'
            ));
        ?>
    </div>
    <div class="two-columns group">
        <div class="col">
            <input type="email" placeholder="email" name="email">
            <span class="error" id="error"></span>
        </div>
        <div class="col group">
            <?php
            echo CHtml::ajaxSubmitButton('Send', Yii::app()->request->baseUrl.'/index.php/ajax/documentsemail', array(
                    'type' => 'POST',
                    'dataType' => 'json',
                    'success'=>'function (data) {
                                if(data.true) {
                                    function boxClose(){
                                        $.colorbox.close();
                                    }
                                    setTimeout(boxClose,5000);
                                    $("#message").html(data.true);
                                }
                                if(data.error) {
                                    $("#error").html(data.error);
                                }
                            }'
                ),
                array(
                    'type' => 'submit'
                ));
            ?>
        </div>
    </div>
    <p id="message"></p>
    <?php echo CHtml::endForm(); ?>
</div>
