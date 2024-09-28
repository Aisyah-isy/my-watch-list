<div class="product__sidebar__comment">
    <div class="section-title">
        <h5>Another LIst</h5>
    </div>
    <div class="product__sidebar__comment__item">
        <?php foreach ($this->List_model->bawahrecent() as $re) { ?>
            <?php $limit = 25;
            $string = $re['title'];
            if (strlen($string) > $limit) {
                $limited_string = substr($string, 0, $limit) . '...';
            } else {
                $limited_string = $string;
            } ?>
            <div class="product__sidebar__comment__item__pict">
                <img src="<?= base_url('assets/upload/list/' . $re['image']) ?>" alt="">
            </div>
            <div class="product__sidebar__comment__item__text">
                <ul>
                    <li><?= $re['statues'] ?></li>
                    <li><?= $re['watch'] ?></li>
                </ul>
                <h5><a href="<?= site_url('home/detail_list/' . $re['slug']) ?>"><?= $limited_string; ?></a></h5>
            </div>
        <?php } ?>
    </div>
</div>