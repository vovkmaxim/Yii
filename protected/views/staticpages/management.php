<div class="pages-holder">
    <div class="page">
        <section class="main">
            <div class="m1">
                <div class="m2">
                    <ul class="breadcrumps group">
                        <li><a href="/">Home </a>&nbsp;&gt;&nbsp;</li>
                        <li><a href="#">Information</a>&nbsp;&gt;&nbsp;</li>
                        <li>Marketing Documents</li>
                    </ul>
                    <?php echo $modelStatic->text; ?>
                    <?php foreach($modelDynamic as $item) : ?>
                    <div class="block_download group">
                        <a href="#" class="links_pdf">
                            <img src="/images/pdf-icon_big.png" alt="">
                        </a>
                        <p>
                            <strong><?php echo $item->title; ?></strong>
                            <?php echo $item->description; ?>
                        </p>
                        <a href="#" class="links_pdf">
                            <img src="/images/pdf-icon_big.png" alt="">
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </div>
</div>