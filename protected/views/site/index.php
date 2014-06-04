<div class="pages-holder">
    <div class="page">
        <section class="main">
            <div class="m1">
                <div class="m2">
                    <h1>Company</h1>
                    <h2>Offshore Development Center</h2>
                    <div class="two-columns">
                        <div class="col">
                            <p>CHI Software has been on the market since 2003, starting its career from .Net, PHP and web design. Now we are an offshore development center that specializes in .Net, Mobile, Python and Ruby on Rails solutions development with headquarter office in Moscow, Russia and development center in Kharkiv, Ukraine.</p>
                            <p>CHI Software features dynamic team of experienced consultants and programmers, creative designers, and marketing professionals, who know how to get the most valuable results.</p>
                            <p>We are in a full command of our technologies but we are open to new techniques and constantly seek self-improvement. High professionalism allows us to create applications that live up to the highest expectations.</p>
                        </div>
                        <div class="col">
                            <p>CHI Software focuses on delivering B2C and B2B web and mobile solutions of various complexities, leveraging the latest in .NET, PHP, Python, Cloud, Ruby on Rails, Java, Objective C, iOS, Android, WP technology stacks.</p>
                            <p>We deliver well-implement solutions in a fast and qualified manner, flexible to fulfill specific needs of our clients. We pay a great attention to both visual design and internal implementation of our solutions. </p>
                            <p>We tailor the process using a smart mix of methodologies to create a zero-fat productive development process and to produce high quality software. By introducing transparency into our development process, delivering potentially shippable product every iteration, inspecting results, and adopting features according to customer's feedback, we work without loss of the time and money.</p>
                        </div>
                    </div>

                    <?php if(!empty($conditionsList)): ?>
                        <h2>Work Conditions<a href="/popup/DocumentsAll?id=1" class="inline cboxElement"><img src="images/pdf-icon0.png" alt=""></a></h2>
                        <p>CHI Software is flexible to follow different business models and leverage optimal measures to ensure more profitability for the Client.</p>
                        <div class="four-columns">
                            <?php foreach($conditionsList as $item) : ?>
                                <div class="col">
                                    <h3 class="col-heading"><?php echo $item->title; ?></h3>
                                    <?php echo $item->description; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if(!empty($techList)): ?>
                        <h2>Our Expertise <a href="/popup/DocumentsAll?id=2" class="inline cboxElement"><img src="images/pdf-icon0.png" alt="" width="22" height="27"></a></h2>
                        <p>CHI Software is flexible to follow different business models and leverage optimal measures to ensure more profitability for the Client.</p>
                        <div class="five-columns">
                            <?php foreach($techList as $item) : ?>
                                <div class="col">
                                    <a href="expertise/projects/tech/<?php echo $item->title; ?>">

                                        <h3><?php echo $item->title; ?></h3>
                                        <?php echo $item->description; ?>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if(!empty($clientsList)): ?>
                        <h2>Our Clients</h2>
                        <ul class="partners-list">
                            <?php foreach($clientsList as $item) : ?>
                                <li><a href="#"><span><img src="images/stories/<?php echo $item->id; ?>/<?php echo $item->pic; ?>" alt="#"/></span></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>


                    <?php if(!empty($conditionsList)): ?>
                        <h2>Testimonials<a href="/popup/DocumentsAll?id=0" class="inline cboxElement"><img src="images/pdf-icon0.png" alt=""></a></h2>
                        <div class="three-columns">
                            <?php foreach($testmonialsList as $item) : ?>
                                <div class="col">
<!--                                    <h3 class="col-heading">--><?php //echo $item->title; ?><!--</h3>-->
                                    <?php echo $item->description; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

<!--                    <h2>Testimonials</h2>-->
<!--                    <div class="three-columns">-->
<!--                        <div class="col">-->
<!--                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at magna vitae felis tempus faucibus eu id nisl. Integer rhoncus tellus eget tempor dictum. Nullam id pretium nulla. Aenean porttitor sagittis ipsum nec tempus. Vivamus auctor magna posuere leo molestie aliquet. Nam... <a href="#">Read more</a>-->
<!--                            </p>-->
<!--                            <p>John Doe, CEO at Company</p>-->
<!--                        </div>-->
<!--                        <div class="col">-->
<!--                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at magna vitae felis tempus faucibus eu id nisl. Integer rhoncus tellus eget tempor dictum. Nullam id pretium nulla. Aenean porttitor sagittis ipsum nec tempus. Vivamus auctor magna posuere leo molestie aliquet. Nam... <a href="#">Read more</a>-->
<!--                            </p>-->
<!--                            <p>John Doe, CEO at Company</p>-->
<!--                        </div>-->
<!--                        <div class="col">-->
<!--                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at magna vitae felis tempus faucibus eu id nisl. Integer rhoncus tellus eget tempor dictum. Nullam id pretium nulla. Aenean porttitor sagittis ipsum nec tempus. Vivamus auctor magna posuere leo molestie aliquet. Nam... <a href="#">Read more</a>-->
<!--                            </p>-->
<!--                            <p>John Doe, CEO at Company</p>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
        </section>
    </div>
</div>
<div id="bg"><img src="images/backgrounds/bg-body1.jpg" alt="" /></div>