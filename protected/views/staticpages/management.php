<div class="pages-holder">
    <div class="page">
        <section class="main">
            <div class="m1">
                <div class="m2">
                    <ul class="breadcrumps group">
                        <li><a href="/">Home </a>&nbsp;&gt;&nbsp;</li>
                        <li>Managament</li>
                    </ul>
                    <?php echo $modelStatic->text; ?>
                    <?php foreach($modelDynamic as $item) : ?>
                    <div class="block_download group">
                        <div class="managImg">
                            <img src="/images/management/<?php echo $item->id; ?>/<?php echo $item->img; ?>" alt="img">
                        </div>
                        <div class="managText">
                                <p><strong><?php echo $item->title; ?></strong></p>
                                <a href="mailto:<?php echo $item->email ?>">Send an Email</a>
                                <?php echo $item->description; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </div>
</div>