<!-- recent addedlist -->
<div class="product__sidebar__view">
    <div class="section-title">
        <h5>Your Recent Watchlist</h5>
    </div>

    <div class="filter__gallery">
        <?php foreach ($this->List_model->recent() as $re) { ?>
            <?php $limit = 25;
            $string = $re['title'];
            if (strlen($string) > $limit) {
                $limited_string = substr($string, 0, $limit) . '...';
            } else {
                $limited_string = $string;
            } ?>
            <div class="product__sidebar__view__item set-bg mix day years" data-setbg="<?= base_url('assets/upload/list/' . $re['image']) ?>">
                <div class="ep"><?= $re['rate'] ?> / 10</div>
                <div class="view"><i class="fa fa-eye"></i> <?= $re['watch'] ?></div>
                <h5><a href="<?= site_url('home/detail_list/'.$re['slug'])?>"><?= $limited_string; ?></a></h5>
            </div>
        <?php } ?>
    </div>
</div>