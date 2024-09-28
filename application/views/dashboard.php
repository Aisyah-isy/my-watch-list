<div class="col-lg-8">
    <div class="trending__product">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="section-title">
                    <h4>My Watchlist</h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="btn__all">
                    <a href="<?= base_url('mylist') ?>" class="primary-btn">View All <span class="arrow_right"></span></a>
                </div>
            </div>
        </div>
        <?php require_once('komponen/listhome.php'); ?>
    </div>
</div>
<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="product__sidebar">
        <div class="product__sidebar__view">
            <?php require_once('komponen/recent.php'); ?>
        </div>
        
        
    </div>
</div>