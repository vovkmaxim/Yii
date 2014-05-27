<div class="pages-holder">
    <div class="page">
        <section class="main">
            <div class="m1">
                <div class="m2">
                    <ul class="breadcrumps group">
                        <li><a href="/">Home </a>&nbsp;&gt;&nbsp;</li>
                        <li>Marketing Documents</li>
                    </ul>
                    <div class="market"><?php echo $modelStatic->text; ?></div>
                    <?php foreach($modelDynamic as $item) : ?>
                        <div class="block_download group">

                                <a id="marpdf" href="<?php echo Yii::app()->request->baseUrl .'/mdocs/download?file='. $item->file; ?>" class="links_pdf">
                                    <img src="/images/pdf-icon_big.png" alt="">
                                </a>


                                <p><strong><?php echo $item->title; ?></strong></p>
                                <?php echo $item->description; ?>

                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </div>
</div>