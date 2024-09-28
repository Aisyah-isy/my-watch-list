<!-- <div class="row row-cols-1 row-cols-md-4 g-4 mb-5">
    <?php foreach ($list as $aa) { ?>
        <?php $limit = 15;
        $string = $aa['description'];
        if (strlen($string) > $limit) {
            $limited_string = substr($string, 0, $limit) . '...';
        } else {
            $limited_string = $string;
        }
        ?>
        <div class="col">
            <div class="card d-flex h-100 align-items-stretch">
                <img class="img-fluid" src="<?= site_url("assets/sneat") ?>/assets/img/elements/13.jpg" alt="Card image cap">
                <div class="card-body card-block">
                    <h5 class="card-title"><?= $aa['title'] ?></h5>
                    <div class="row">
                        <div class="col-6">
                            <a href="" class="card-subtitle text-dark"><?= $aa['name'] ?></a>
                        </div>
                        <div class="col-6">
                            <a ref="" class="card-subtitle text-dark">kdrama</a>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <p class="card-text"> <?= $limited_string; ?></p>
                       
                        <a href="javascript:void(0)" class="btn rounded-pill btn-outline-dark btn-dark ">See Details</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div> -->
<div id="done">
    <?= $this->session->flashdata('alert'); ?>
</div>
<h5 class="card-header">My Watch List</h5>
<div class="table-responsive text-nowrap">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Genre</th>
                <th>Watch</th>
                <th>Rate</th>
                <th>Release Date</th>
                <th>Statues</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            <a href="<?= site_url("_user/addlist") ?>"> <button type="button" class="btn rounded-pill btn-primary mb-3 ml-3">
                    + List
                </button></a>

            <?php $no = 1;
            foreach ($list as $aa) { ?>
                <?php $limit = 15;
                $string = $aa['description'];
                if (strlen($string) > $limit) {
                    $limited_string = substr($string, 0, $limit) . '...';
                } else {
                    $limited_string = $string;
                } ?>
                 <?php $limit = 15;
                $string2 = $aa['title'];
                if (strlen($string2) > $limit) {
                    $limited_string2 = substr($string2, 0, $limit) . '...';
                } else {
                    $limited_string2 = $string2;
                } ?>
                <form action="mylist/updatelistC" method="post" enctype="multipart/form-data">
                    <div class="modal fade" id="update<?= $aa['id_list'] ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <input type="hidden" name="id_list" value="<?= $aa['id_list'] ?>">
                                <input type="hidden" name="image" value="<?= $aa['image'] ?>">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update List</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Your Film Image</label>
                                            <input class="form-control" type="file" name="name_image" accept="image/png, image/gif, image/jpeg, image/jpg" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title" name="title" value="<?= $aa['title'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3 g-2">
                                        <div class="col mb-0">
                                            <label for="nameWithTitle" class="form-label">Genre</label>
                                            <select name="id_genre" class="form-control">
                                                <?php foreach ($genre as $bb) { ?>
                                                    <option <?php if ($bb['id_genre'] == $aa['id_genre']) {
                                                                echo 'selected';
                                                            } ?> value="<?= $bb['id_genre'] ?>"><?= $bb['genre'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col mb-0">
                                            <label for="rate" class="form-label">Rate</label>
                                            <input type="number" class="form-control" id="rate" name="rate" step="0.1" min="0" max="10" value="<?= $aa['rate'] ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 row g-2">
                                        <div class="col-md-6 mb-0">
                                            <label for="nameWithTitle" class="form-label">Watch</label>
                                            <select name="watch" class="form-control">
                                                <option value="Belum ditonton" <?php if ($aa['watch'] == 'Belum ditonton') {
                                                                                    echo "selected";
                                                                                } ?>>Belum ditonton</option>
                                                <option value="Sedang ditonton" <?php if ($aa['watch'] == 'Sedang ditonton') {
                                                                                    echo "selected";
                                                                                } ?>>Sedang ditonton</option>
                                                <option value="Selesai ditonton" <?php if ($aa['watch'] == 'Selesai ditonton') {
                                                                            echo "selected";
                                                                        } ?>>Selesai ditonton</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-0">
                                            <label for="statues" class="form-label">Statues</label>
                                            <select name="statues" class="form-control">
                                                <option value="Ongoing" <?php if ($aa['statues'] == 'Ongoing') {
                                                                            echo "selected";
                                                                        } ?>>Ongoing</option>
                                                <option value="Completed" <?php if ($aa['statues'] == 'Completed') {
                                                                                echo "selected";
                                                                            } ?>>Completed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row g-2">
                                        <div class="col-md-6 mb-0">
                                            <label for="type" class="form-label">Type</label>
                                            <select name="id_type" class="form-control">
                                                <?php foreach ($type as $bb) { ?>
                                                    <option value="<?= $bb['id_type'] ?>"><?= $bb['type_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-0">
                                            <label for="exampleFormControlInput1" class="form-label">Release Date</label>
                                            <input type="date" class="form-control" id="exampleFormControlInput1" name="date" value="<?= $aa['release_at'] ?>">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                        <textarea name="description" class="form-control" id="exampleFormControlinput1" rows="2" value="<?= $aa['description'] ?>"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $limited_string2 ?></td>
                    <td><?= $aa['genre'] ?></td>
                    <td><?= $aa['watch'] ?></td>
                    <td><?= $aa['rate'] ?></td>
                    <td><?= $aa['release_at'] ?></td>
                    <td><?= $aa['statues'] ?></td>
                    <td><?= $limited_string ?></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?= base_url('assets/upload/list/' . $aa['image']) ?>" target="_blank"><i class="bx bx-image-alt me-1"></i> Images</a>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#update<?= $aa['id_list'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" onClick="return confirm('Are you sure to delete this list?')" href="<?= base_url('_user/mylist/delete_listC/' . $aa['image']) ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
    </table>
</div>