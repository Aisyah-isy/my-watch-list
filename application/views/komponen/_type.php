<!-- ditampilkan berdasarkan type -->
<div class="col-lg-12">
    <div class="trending__product">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-4">
                <div class="section-title">
                    <h4>My Watchlist | <?= $name_type; ?></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($get_type_id as $li) { ?>
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
                                    <?php } ?>
                                    <!--  -->
                                </form>
                        </div>
                        <div class="product__item__text">
                            <ul>
                                <li><?= $li['statues'] ?></li>
                                <li><?= $li['type_name'] ?></li>
                            </ul>
                            <h5><a href="<?= site_url('home/detail_list/' . $li['slug']) ?>"><?= $limited_string ?></a></h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>