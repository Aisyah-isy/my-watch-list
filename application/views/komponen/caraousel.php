 <section class="hero">
        <div class="container">
            <div class="hero__slider owl-carousel">
                <?php foreach( $this->List_model->get_caraousel() as $i){?>
                <div class="hero__items set-bg" data-setbg="<?= base_url('assets/upload/caraousel/') . $i['image']?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <h2><?= $i['title_car']?></h2>
                                <p><?= $i['sub_title']?></p>
                                <a href="<?= site_url('_user/addlist')?>"><span>Add List</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>