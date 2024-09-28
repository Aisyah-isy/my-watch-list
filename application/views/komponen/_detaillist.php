<?php require_once('css.php'); ?>
<!-- di tampilkanketika detail list di tambahkan -->

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <?php require_once('navbar.php'); ?>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <!-- <section class="hero">
        <div class="container">
            <div class="hero__slider owl-carousel">
                <div class="hero__items set-bg" data-setbg="img/hero/hero-1.jpg">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <div class="label">Adventure</div>
                                <h2>Fate / Stay Night: Unlimited Blade Works</h2>
                                <p>After 30 days of travel across the world...</p>
                                <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero__items set-bg" data-setbg="img/hero/hero-1.jpg">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <div class="label">Adventure</div>
                                <h2>KASJ / Stay Night: Unlimited Blade Works</h2>
                                <p>After 30 days of travel across the world...</p>
                                <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="anime-details spad mt-0">
        <div class="container mt-0">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="<?= base_url('assets/upload/list/' . $detail->image) ?>">
                            <div class="comment"><i class="fa "></i> <?= $detail->rate; ?> / 10</div>
                            <div class="view"><i class="fa fa-eye"></i> <?= $detail->watch; ?></div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3><?= $detail->title; ?></h3>
                                <span><?= $detail->slug; ?></span>
                            </div>
                            <div class="anime__details__rating">
                                <div class="rating">
                                    <a><i class="fa fa-star"></i></a>
                                    <a><i class="fa fa-star"></i></a>
                                    <a><i class="fa fa-star"></i></a>
                                    <a><i class="fa fa-star"></i></a>
                                    <a><i class="fa fa-star"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <p><?= $detail->description; ?></p>
                            </div>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Type:</span> <?= $detail->type_name; ?></li>
                                            <li><span>genre:</span> <?= $detail->genre; ?></li>
                                            <li><span>Rate:</span> <?= $detail->rate; ?> / 10</li>
                                            <li><span>Status:</span> <?= $detail->statues; ?></li>
                                            <li><span>Watch Statues:</span> <?= $detail->watch; ?></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Added List at:</span> <?= $detail->create_at; ?></li>
                                            <li><span>Total Eps:</span> 24 min/ep</li>
                                            <li><span>Quality:</span> HD</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="anime__details__btn">
                                <form action="<?= site_url('_user/fav/addfav') ?>" method="post">
                                    <input type="hidden" name="id_genre" value="<?= $detail->id_genre; ?>">
                                    <input type="hidden" name="id_list" value="<?=  $detail->id_list;?>">
                                    <input type="hidden" name="id_type" value="<?=  $detail->id_type; ?>">
                                    <?php if ($this->List_model->cekfav() !== true) {
                                        echo '<button class="follow-btn" type="submit" onClick="return confirm(\'Add this list to Favorite?\')"><i class="fa fa-heart-o"></i> Add Fav</button>';
                                    } else {
                                        echo 'return confirm(\'Add this list to Favorite?\')';
                                    } ?>

                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Another List</h5>
                        </div>
                        <!-- another list -->
                        <?php require_once('listhome.php'); ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="anime__details__sidebar">
                        <!-- recent -->
                        <?php require_once('recent.php'); ?>
                    </div>
                </div>
            </div>
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    <?php require_once('footer.php'); ?>

    <!-- Search model end -->

    <!-- Js Plugins -->
    <?php require_once('js.php'); ?>

</body>

</html>