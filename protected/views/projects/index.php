<div class="portfolio-container">
    <?php if ($tech) : ?>
    <?php foreach ($tech as $techBlock) : ?>
        <div class="portfolio-holder">
            <a name="<?php echo Controller::str2url($techBlock->title)?>"></a>
            <div class="header-section">
                <h1><?php echo $techBlock->title; ?> Projects</h1>
            </div>
            <section class="portfolio">
                <?php if ($techBlock->projects) : ?>
                    <?php foreach ($techBlock->projects as $project) : ?>
                        <div class="item">
                            <?php if (!isset($project->projectsPics[0]->url)) : ?>
                                <div class="blank">&nbsp;</div>
                            <?php else : ?>
                            <img alt="" src="<?php echo Yii::app()->getBaseUrl() . $project->projectsPics[0]->url; ?>">
                            <?php endif; ?>
                            <a class="holder" href="http://chisw.us/images/designs/96/big.jpg">
                                <h1><?php echo $project->title; ?></h1>
                                <p><?php echo $project->description; ?></p>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </section>
        </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>