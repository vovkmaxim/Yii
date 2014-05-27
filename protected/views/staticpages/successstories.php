<div class="pages-holder">

    <div class="page">

        <section class="main">
            <div class="m1">
                <div class="m2">
<!--                    <ul class="breadcrumps group">-->
<!--                        <li><a href="/">Home </a>&nbsp;&gt;&nbsp;</li>-->
<!---->
<!--                        <li>--><?php //echo $modelStatic->title; ?><!--</li>-->
<!--                    </ul>-->
                    <h2 style="font-style:italic"><strong>Success Stories</strong>
                    <a href="/popup/DocumentsAll?id=2" style="line-height: 1.2em; font-size: 13px;" class="inline cboxElement"><img alt="" src="../../images/pdf-icon0.png" /></a></h2>

                    <?php echo $modelStatic->text; ?>
                    <div class="block_stories_holder">
                        <?php foreach ($modelDynamic as $item) {
                            echo "
                            <div class='block_stories group'>
                                <div class='image_holder'>
                                    <img src='../".$item->pic."' alt='' >
                                </div>
                                <div class='block_information'>
                                    <strong>The client</strong>
                                    <p>".$item->client."</p>
                                    <strong>The challenge</strong>
                                    <p>".$item->task."</p>
                                </div>
                            </div>
                            <div class='two-columns'>
                                <div class='col'>
                                    <strong>The Solution</strong>
                                    <p>".$item->solution."</p>
                                </div>
                                <div class='col'>
                                    <strong>The Result</strong>
                                    <p>".$item->result."</p>
                                </div>
                            </div>";

                        }

                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<
