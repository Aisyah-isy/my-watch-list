<div id="done">
    <?= $this->session->flashdata('alert'); ?>
</div>
<div class="card">
    <div class="card-header">
        <div class="card-head-row card-tools-still-right">
            <h2 class="card-title fw-b">File Input</h4>
        </div>
    </div>
    <div class="card-body">
        <form action="<?= site_url('admin/caraousel/add') ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="emailWithTitle" class="form-label">Image Title</label>
                <input type="text" id="emailWithTitle" class="form-control" placeholder="Title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="emailWithTitle" class="form-label">Sub Title</label>
                <input type="text" id="emailWithTitle" class="form-control" placeholder="Sub Title" name="sub_title" required>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Pilih Foto (1:3)</label>
                <input class="form-control" type="file" id="formFile" name="image">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?php foreach ($caraousel as $aa) { ?>
    <div class="">
        <div class="col-md-12 mb-3 mt-3">
            <div class="h-100">
                <img class="card-img-top" src="<?= base_url('assets/upload/caraousel/' . $aa['image']) ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $aa['title_car'] ?></h5>
                    <p><?= $aa['sub_title']?></p>
                    <a class="btn btn-sm btn-danger mt-2" onClick="return confirm('Yakin Ingin Menghapus Gambar?')" href="<?= site_url('admin/caraousel/delete/' . $aa['image']) ?>">
                        <i class="bx bx-trash me-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>