<!-- ditampilkan berdasarkan kyword -->

<div class="col-lg-12">
    <div class="trending__product">
        <div class="row">
            <div class="anime__details__form">
                <div class="section-title">
                    <h5>Search Your List</h5>
                </div>
                <form action="<?= site_url('home/serch') ?>">
                    <input name="serch" placeholder="Search Something"></input>
                    <button><input type="submit" name="submit"></input></button>
                </form>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-lg-12  col-md-12 col-sm-12">
                <div class="section-title col-12">
                    <h4>My Watchlist | </h4>
                </div>
            </div>
        </div> -->
        <div class="row mt-4">
            <?php foreach ($get_serch as $li) { ?>
                <?php $limit = 20;
                $string = $li['title'];
                if (strlen($string) > $limit) {
                    $limited_string = substr($string, 0, $limit) . '...';
                } else {
                    $limited_string = $string;
                } ?>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/upload/list/' . $li['image']) ?>">
                            <div class="ep"><?= $li['rate'] ?> / 10</div>
                            <div class="comment"><i class="fa fa-eye"></i> <?= $li['watch'] ?></div>
                            <form action="<?= site_url('_user/fav/addfav') ?>" method="post">
                                <input type="hidden" name="id_genre" value="<?= $li['id_genre'] ?>">
                                <input type="hidden" name="id_list" value="<?= $li['id_list'] ?>">
                                <input type="hidden" name="id_type" value="<?= $li['id_type'] ?>">
                                <?php if ($this->List_model->cekfav() == NULL) { ?>
                                    <button class="view btn" type="submit" onClick="return confirm('Add this list to Favorite?')">+ Fav</button>
                                    <!-- <div class="view"><i class="fa fa-star"><a onClick="return confirm('Add this list to Favorite?')" class="text-light"> + Fav</a> </i></div> -->
                                <?php } ?>
                                <!--  -->
                            </form>
                        </div>
                        <div class="product__item__text">
                            <ul>
                                <li><?= $li['statues'] ?></li>
                                <li><?= $li['genre'] ?></li>
                                <a href="<?= site_url('home/detail_list/' . $li['slug']) ?>">
                                    <li>Detail-></li>
                                </a>
                            </ul>
                            <h5><a href="<?= site_url('home/detail_list/' . $li['slug']) ?>"><?= $limited_string ?></a></h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>