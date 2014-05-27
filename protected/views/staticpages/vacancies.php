<div class="pages-holder">
    <div class="page">
        <section class="main">
            <div class="m1">
                <div class="m2">
                    <ul class="breadcrumps group">
                        <li><a href="/">Home </a>&nbsp;&gt;&nbsp;</li>
                        <li>Vacancies</li>
                    </ul>
                    <div class="vacancy-image">
                        <div class="holder">
                            <div class="frame">
                                <img class="main-image" src="images/img-vacancy.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <?php echo $modelStatic->text; ?>
                    <div class="vacancy-holder">
                        <?php foreach($modelDynamic as $item): ?>
                        <article class="vacancy-item">
                            <p class="vacancy-date">January 17, 2014</p>
                            <header>
                                <h2 class="col-heading"><?php echo $item->title; ?></h2>
                                <a href="/popup/summary?id=<?php echo $item->id; ?>" class="btn-square inline cboxElement">Oh, I'm exactly that Guy</a>
                            </header>
                            <?php echo $item->description; ?>
                        </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div id="bg"><img src="images/backgrounds/bg-body1.jpg" alt="" /></div>