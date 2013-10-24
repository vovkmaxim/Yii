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
                <?php if ($profile != '') : ?>
                <a href="/profile/profile.pdf" class="banner"><img src="images/banner1.jpg" alt=""></a>
                <?php endif; ?>
                <h2>Work Conditions</h2>
                <p>CHI Software is flexible to follow different business models and leverage optimal measures to ensure more profitability for the Client.</p>
                <div class="four-columns">
                    <div class="col">
                        <h3 class="col-heading">Offshore Dedicated Development Team</h3>
                        <p>CHI Software provides customers with technical experts, thoroughly selected, based on each customer's project needs. Our customers choose and have full control over our technical experts, treating them as employees of their own company.</p>
                    </div>
                    <div class="col">
                        <h3 class="col-heading">Monthly Resource-<br />based Model</h3>
                        <p>CHI Software's technical experts provide our customers with high-quality software development services during large projects. Our customers do monthly billing.</p>
                    </div>
                    <div class="col">
                        <h3 class="col-heading">Time and Material</h3>
                        <p>CHI Software monitors our technical experts work on daily basis. Our customers do billing based on hourly rate of our technical experts the actual time spent.</p>
                    </div>
                    <div class="col">
                        <h3 class="col-heading">Fixed Price</h3>
                        <p>CHI Software's business analysts and architects work with our customers to make project estimation and delivery part, based on mutually agreed price for final deliverable result.</p>
                    </div>
                </div>
                <h2>Contact Us</h2>
                <div class="section">
                    <div class="contact-box">
                        <ul class="contact-list">
                            <li>
                                <strong class="title">General queries: </strong>
                                <a href="mailto:&#105;&#110;&#102;&#111;&#064;&#099;&#104;&#105;&#115;&#119;&#046;&#117;&#115;">&#105;&#110;&#102;&#111;&#064;&#099;&#104;&#105;&#115;&#119;&#046;&#117;&#115;</a>
                            </li>
                            <li>
                                <strong class="title">Job opportunities</strong>
                                <a href="mailto:&#099;&#097;&#114;&#101;&#101;&#114;&#115;&#064;&#099;&#104;&#105;&#115;&#119;&#046;&#117;&#115;">&#099;&#097;&#114;&#101;&#101;&#114;&#115;&#064;&#099;&#104;&#105;&#115;&#119;&#046;&#117;&#115;</a>
                            </li>
                            <li>
                                <strong class="title">Partnership</strong>
                                <a href="mailto:&#115;&#097;&#108;&#101;&#115;&#064;&#099;&#104;&#105;&#115;&#119;&#046;&#117;&#115;">&#115;&#097;&#108;&#101;&#115;&#064;&#099;&#104;&#105;&#115;&#119;&#046;&#117;&#115;</a>
                            </li>
                        </ul>
                        <div class="other-contacts">
                            <strong class="title">Call</strong>
                            <span class="phone">+1 650 45 1111 7</span>
                            <strong class="title">Social</strong>
                            <ul class="social-networks">
                                <li><a href="#" class="facebook">facebook</a></li>
                                <li><a href="#" class="twitter">twitter</a></li>
                                <li><a href="#" class="linkedin">linkedin</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="circle-box">
                        <div class="col">
                            <img class="circle-image" src="images/circle1.png" alt="" width="182" height="182">
                            <strong class="title">Headquarters</strong>
                            <span>Moscow, Russia</span>
                        </div>
                        <div class="col">
                            <img class="circle-image" src="images/circle2.png" alt="" width="182" height="182">
                            <strong class="title">Development Center</strong>
                            <span>Kharkiv, Ukraine</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="page technology-page">
    <section class="main">
        <div class="m1">
            <div class="m2">
                <h1>Technologies</h1>
                <div class="technology-section">
                    <div class="frame">
                        <?php foreach ($tech as $technology) : ?>
                        <article class="item">
                            <header>
                                <h2 class="technology-header"><?php echo $technology->title; ?></h2>
                                <a href="#" class="btn">get a glimpse of</a>
                            </header>
                            <div class="info">
                                <div class="description">
                                    <p><?php echo $technology->description; ?></p>
                                </div>
                                <ul class="capabilities-list">
                                    <?php foreach ($technology->techLists as $element) : ?>
                                    <li>- <?php echo $element->title; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="page">
    <section class="main">
        <div class="m1">
            <div class="m2">
                <h1>Projects</h1>
                <div class="projects-case">
                    <?php if (count($projects) > 0) : ?>
                    <?php $firstPrj = reset($projects); ?>
                    <section class="case-info">
                        <h1><?php echo $firstPrj->title; ?></h1>
                        <div class="case-description">
                            <?php echo Text::formatText($firstPrj->description); ?>
                            <?php if ($firstPrj->skills != '') : ?>
                            <strong class="title">Desired Skills</strong>
                            <p> </p>
                            <?php endif; ?>
                        </div>
                        <div class="case-navigate">
                            <a href="#" class="prev">Previous</a>
                            <a href="#" class="next">Next</a>
                            <a href="#" class="close">Close</a>
                        </div>
                    </section>
                    <div class="case-images">
                         &nbsp;
                        <?php foreach($firstPrj->projectsPics as $image): ?>
                        <img src="<?php echo Yii::app()->baseUrl . $image->url; ?>" alt="">
                        <?php endforeach; ?>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="page">
    <section class="main">
        <div class="m1">
            <div class="m2">
                <h1>Vacancies</h1>
                <?php foreach ($jobs as $jobGroup) : ?>
                <div class="vacancy-image">
                    <div class="holder">
                        <div class="frame">
                            <img class="main-image" src="images/img-vacancy.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="three-columns">
                    <?php foreach ($jobGroup as $job) : ?>
                    <div class="col">
                    <div class="frame">
                        <h2 class="col-heading"><?php echo $job->title; ?></h2>
                        <p><?php echo $job->description; ?></p>
                        <a href="#inline-content" id="<?php echo $job->id; ?>" class="btn-square inline">Oh, I'm exactly that Guy</a>
                    </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
<?php if (isset($open)) : ?>
    <input type="hidden" name="open" value="1" />
    <input type="hidden" name="job-title" value="<?php echo $jobcv->title; ?>" />
    <input type="hidden" name="job_id" value="<?php echo $jobcv->id; ?>" />
    <input type="hidden" name="title" value="<?php echo $title; ?>" />
    <input type="hidden" name="message" value="<?php echo $message; ?>" />
    <?php if (isset($errors['subject'])) : ?>
        <input type="hidden" name="error_subject" value="<?php echo $errors['subject']; ?>" />
    <?php endif; ?>
    <?php if (isset($errors['cv'])) : ?>
       <input type="hidden" name="error_cv" value="<?php echo $errors['cv']; ?>" />
    <?php endif; ?>
    <?php if (isset($success)) : ?>
        <input type="hidden" name="success" value="<?php echo $success; ?>" />
    <?php endif; ?>

<?php else: ?>
    <input type="hidden" name="open" value="0" />
<?php endif; ?>




