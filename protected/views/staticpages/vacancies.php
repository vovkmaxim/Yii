<div class="pages-holder">
    <div class="page">
        <section class="main">
            <div class="m1">
                <div class="m2">
                    <div class="vacancy-image">
                        <div class="holder">
                            <div class="frame">
                                <img class="main-image" src="images/img-vacancy.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <h2>CHI Software offers you:</h2>
                    <div class="two-columns vacancy-columns">
                        <div class="col">
                            <ul>
                                <li>Competitive salary.</li>
                                <li>Regular evaluation and salary rise. </li>
                                <li>Convenient location of the office (2 minutes from Sumskaya street).</li>
                                <li>Cozy modern office with equipped kitchen, places for rest and X-Box. </li>
                                <li>Career and professional growth. </li>
                                <li>20 working-days paid vacation.</li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul>
                                <li>Paid sickness leave.</li>
                                <li>Flexible working schedule with the opportunity to work from home.</li>
                                <li>Free English courses twice a week. </li>
                                <li>Free bicycles parking. </li>
                                <li>Friendly team.</li>
                                <li>Democratic managment. </li>
                            </ul>
                        </div>
                    </div>
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