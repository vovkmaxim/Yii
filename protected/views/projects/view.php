<div class="pages-holder">
    <div class="page">
        <section class="main">
            <div class="m1">
                <div class="m2">

                    <div class="projects-case">
                        <section class="case-info">
                            <h1><?php echo $project->title; ?></h1>

                            <div class="case-description">
                                <?php echo Text::formatText($project->description); ?>
                                <strong class="title">Desired Skills</strong>

                                <p><?php echo $skills; ?></p>
                            </div>
                            <div class="case-navigate">
                                <?php if ($prevUrl) : ?>
                                <a href="<?php echo Yii::app()->request->getBaseUrl() . $prevUrl; ?>" class="prev">Previous</a>
                                <?php endif; ?>
                                <?php if ($nextUrl) : ?>
                                <a href="<?php echo Yii::app()->request->getBaseUrl() . $nextUrl; ?>" class="next">Next</a>
                                <?php endif; ?>
                                <a href="/projects#<?php echo $techUrl;?>" class="close">Close</a>
                            </div>
                        </section>
                        <div class="case-images">
                            <?php if ($project->projectsPics) : ?>
                                <?php foreach ($project->projectsPics as $pic) : ?>
                                    <img src="<?php echo $pic->url; ?>" alt="">
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>







