<div class="row mb-5">
    <div class="col-md">
        <div class="card mb-3">
            <form action="<?= site_url('_user/mylist/updatelistC'.$list[0]['id_list']) ?>" method="post" enctype="multipart/form-data">
                <div class="row g-0">
                    <div class="col-md-4 mt-2 mr-3 p-3">
                        <h5 class="card-title">Your Film Image</h5>
                        <input type="file" name="name_image" accept="image/png, image/gif, image/jpeg, image/jpg" />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Add Your List</h5>
                            <input type="hidden" name="id_list" value="<?= $list[0]['id_list']; ?>">
                            <input type="hidden" name="image" value="<?= $list[0]['image']; ?>">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Title</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title" name="title" value="<?= $list[0]['title']; ?>">
                            </div>
                            <div class="mb-3 row g-2">
                                <div class="col-md-6 mb-0">
                                    <label for="nameWithTitle" class="form-label">Genre</label>
                                    <select name="id_genre" class="form-control">
                                        <?php foreach ($genre as $aa) { ?>
                                            <option value="<?= $aa['id_genre'] ?>" <?= $aa['id_genre'] == $list[0]['id_genre'] ? 'selected' : ''; ?>><?= $aa['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-0">
                                    <label for="rate" class="form-label">Rate</label>
                                    <input type="number" class="form-control" id="rate" name="rate" step="0.1" min="0" max="10" value="<?= $list[0]['rate']; ?>">
                                </div>
                            </div>
                            <div class="mb-3 row g-2">
                                <div class="col-md-6 mb-0">
                                    <label for="nameWithTitle" class="form-label">Watch</label>
                                    <select name="watch" class="form-control">
                                        <option value="Belum ditonton" <?php if ($list[0]['role'] == 'Belum ditonton') {
                                                                            echo "selected";
                                                                        } ?>>Belum ditonton</option>
                                        <option value="Sedang ditonton"<?php if ($list[0]['role'] == 'Sedang ditonton') {
                                                                            echo "selected";
                                                                        } ?>>Sedang ditonton</option>
                                        <option value="Selesai" <?php if ($list[0]['role'] == 'Selesai') {
                                                                            echo "selected";
                                                                        } ?>>Selesai</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-0">
                                    <label for="statues" class="form-label">Statues</label>
                                    <select name="statues" class="form-control">
                                        <option value="Ongoing" <?php if ($list[0]['role'] == 'Ongoing') {
                                                                            echo "selected";
                                                                        } ?>>Ongoing</option>
                                        <option value="Completed" <?php if ($list[0]['role'] == 'Completed') {
                                                                            echo "selected";
                                                                        } ?>>Completed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row g-2">
                                <div class="col-md-6 mb-0">
                                    <label for="type" class="form-label">Type</label>
                                    <select name="id_type" class="form-control">
                                         <?php foreach ($type as $aa) { ?>
                                            <option value="<?= $aa['id_type'] ?>" <?= $aa['id_type'] == $list[0]['id_type'] ? 'selected' : ''; ?>><?= $aa['type_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-0">
                                    <label for="exampleFormControlInput1" class="form-label">Release Date</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1" name="date" <?= $list[0]['release_at']; ?>>
                                </div>
                            </div>
                            <div class="mb-3">

                            </div>
                            <div>
                                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" <?= $list[0]['description']; ?> rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn rounded-pill btn-primary mt-3"> + List</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>