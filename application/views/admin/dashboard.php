<div class="card alert alert-secondary">
    <div class="d-flex align-items-end row">
        <div class="col-sm-7">
            <div class="card-body">
                <h3 class="card-title fw-bold text-primary">Welcome to My WAtchlist <?= $this->session->userdata('name'); ?>! 🎉</h3>
                <p class="mb-4">
                    Make <span class="fw-bold">Your Watch List</span> Here!
                </p>

            </div>
        </div>
        <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
                <img src="<?= site_url('assets/sneat') ?>/assets/img/illustrations/girl-doing-yoga-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
            </div>
        </div>
    </div>
</div>
<div class="row mt-5">

    <div class="col-lg-6 col-md-12 col-6 mb-4">
        <div class="card alert alert-success  ">
            <div class="card-header ">
                <span class="fw-bold h4 d-block mb-1">Your WatchList Total</span>
            </div>
            <div class="card-body">
                <h5 class="card-title mb-2"><?= number_format($countlist);?></h5>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-6 mb-4">
        <div class="card alert alert-danger  ">
        <div class="card-header ">
                <span class="fw-bold h4 d-block mb-1">Your Favorite List Total</span>
            </div>
            <div class="card-body">
                <h5 class="card-title mb-2"><?= number_format($countfav);?></h5>
            </div>
        </div>
    </div>
</div>