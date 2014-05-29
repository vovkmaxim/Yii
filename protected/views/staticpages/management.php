<div class="pages-holder">
    <div class="page">
        <section class="main">
            <div class="m1">
                <div class="m2">
                    <ul class="breadcrumps group">
                        <li><a href="/">Home </a>&nbsp;&gt;&nbsp;</li>
                        <li>Management</li>
                    </ul>
                    <?php echo $modelStatic->text; ?>
                    <?php foreach($modelDynamic as $item) : ?>
                    <div class="block_download group">
                        <div class="managImg">
                            <?php if(is_file('images/management/'.$item->id.DIRECTORY_SEPARATOR.$item->img)): ?>
                            <img src="/images/management/<?php echo $item->id; ?>/<?php echo $item->img; ?>" alt="img">
                            <?php else: ?>
                            <img src="/images/management/0/nophoto.png" alt="img">
                            <? endif; ?>
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