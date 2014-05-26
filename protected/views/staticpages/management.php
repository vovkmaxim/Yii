<div class="pages-holder">
    <div class="page">
        <section class="main">
            <div class="m1">
                <div class="m2">
                    <ul class="breadcrumps group">
                        <li><a href="#">Home </a>&nbsp;&gt;&nbsp;</li>
                        <li><a href="#">Information</a>&nbsp;&gt;&nbsp;</li>
                        <li>Marketing Documents</li>
                    </ul>
                    <h2>Lorem ipsum</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris dignissim consectetur dui, eget porttitor velit elementum at. Praesent justo ligula, condimentum et bibendum id, volutpat at ante. Vivamus vel dignissim libero. Nulla porttitor lectus in nunc posuere interdum. Nam porta laoreet tellus id suscipit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus leo quam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam pretium mi sit amet libero gravida blandit. Nam ultrices ullamcorper risus. Vivamus magna diam, vulputate id ullamcorper et, pellentesque et arcu. Donec scelerisque aliquet magna a mattis. Donec nunc eros, pulvinar ut facilisis sagittis, volutpat a purus.</p>
                    <?php foreach($modelDynamic as $item) : ?>
                    <div class="block_download group">
                        <a href="#" class="links_pdf">
                            <img src="/images/pdf-icon_big.png" alt="">
                        </a>
                        <p>
                            <strong><?php echo $item->title; ?></strong>
                            <?php echo $item->description; ?>
                        </p>
                        <a href="#" class="links_pdf">
                            <img src="/images/pdf-icon_big.png" alt="">
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </div>
</div>