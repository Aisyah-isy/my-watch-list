<div class="row mb-5">
    <div class="col-md">
        <div class="card mb-3">
            <form action="<?= site_url('_user/addlist/addlistC') ?>" method="post" enctype="multipart/form-data">
                <div class="row g-0">
                    <div class="col-md-4 mt-2 mr-3 p-3">
                        <h5 class="card-title">Your Film Image</h5>
                        <input type="file" class="form-control" name="name_image" accept="image/png, image/gif, image/jpeg, image/jpg" />
                        <!-- <img class="card-img card-img-left" src="<?= site_url("assets/sneat") ?>/assets/img/elements/12.jpg" alt="Card image"> -->
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Add Your List</h5>
                            <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user'); ?>">

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Title</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title" name="title">
                            </div>
                            <div class="mb-3 row g-2">
                                <div class="col-md-6 mb-0">
                                    <label for="nameWithTitle" class="form-label">Genre</label>
                                    <select name="id_genre" class="form-control">
                                        <?php foreach ($genre as $aa) { ?>
                                            <option value="<?= $aa['id_genre'] ?>"><?= $aa['genre'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-0">
                                    <label for="rate" class="form-label">Rate</label>
                                    <input type="number" class="form-control" id="rate" name="rate" step="0.1" min="0" max="10">
                                </div>
                            </div>
                            <div class="mb-3 row g-2">
                                <div class="col-md-6 mb-0">
                                    <label for="nameWithTitle" class="form-label">Watch</label>
                                    <select name="watch" class="form-control">
                                        <option value="Belum ditonton">Belum ditonton</option>
                                        <option value="Sedang ditonton">Sedang ditonton</option>
                                        <option value="Selesai ditonton">Selesai ditonton</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-0">
                                    <label for="statues" class="form-label">Statues</label>
                                    <select name="statues" class="form-control">
                                        <option value="Ongoing">Ongoing</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row g-2">
                                <div class="col-md-6 mb-0">
                                    <label for="type" class="form-label">Type</label>
                                    <select name="id_type" class="form-control">
                                        <?php foreach ($type as $aa) { ?>
                                            <option value="<?= $aa['id_type'] ?>"><?= $aa['type_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-0">
                                    <label for="exampleFormControlInput1" class="form-label">Release Date</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1" name="date">
                                </div>
                            </div>
                            <div class="mb-3">

                            </div>
                            <div>
                                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn rounded-pill btn-primary mt-3">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>