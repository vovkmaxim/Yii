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
                    <h2><strong>Success Stories</strong>
                    <a href="/popup/DocumentsAll?id=0" style="line-height: 1.2em; font-size: 13px;" class="inline cboxElement"><img alt="" src="../../images/pdf-icon0.png" /></a></h2>

                    <?php echo $modelStatic->text; ?>
                    <div class="block_stories_holder">
                        <?php
                            foreach ($modelDynamic as $item)
                            {
                                if(is_file($item->pic))
                                {
                                    $str="<img src='".DIRECTORY_SEPARATOR.$item->pic."' alt='img'>";
                                } else
                                {
                                    $str="<img src='/images/management/0/nophoto.png' alt='img'>";
                                }

                            echo "
                            <div class='block_stories group'>
                                <div class='image_holder'>".
                                    $str."
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
