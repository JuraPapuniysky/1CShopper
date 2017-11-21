<?php

/* @var $model \common\models\Slider[] */

?>
<div class="home-slider">
    <div class="container">
        <div class="home-slider-container" id="slider">

            <?php foreach ($model as $item){ ?>
            <div class="home-slider-item">
                <div class="home-slider-item-inner">
                    <div class="slide-column-left slide-photo-item">
                       <a href="<?= $item->name ?>"><img src="<?= $item->sliderImages[0]->image->src ?>"></a>
                    </div>
                    <div class="slide-column-center">
                        <div class="slide-column-center-top slide-photo-item">
                            <img src="<?= $item->sliderImages[1]->image->src ?>">
                        </div>
                        <div class="slide-column-center-bottom slide-photo-item">
                            <img src="<?= $item->sliderImages[2]->image->src ?>">
                        </div>
                    </div>
                    <div class="slide-column-right slide-photo-item">
                        <img src="<?= $item->sliderImages[3]->image->src ?>">
                    </div>
                </div>
            </div>
            <?php } ?>


        </div>
    </div>
</div>