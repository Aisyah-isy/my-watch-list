<form action="genre/addgenreC" method="post">
    <div class="modal fade" id="addgenre" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameWithTitle" class="form-label">Genre</label>
                            <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Name" name="genre">
                        </div>
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
<div id="done">
    <?= $this->session->flashdata('alert'); ?>
</div>

<h5 class="card-header">Genres</h5>
<div class="table-responsive text-nowrap">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Genre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            <button type="button" class="btn rounded-pill btn-primary mb-3 ml-3" data-bs-toggle="modal" data-bs-target="#addgenre">
                + Genre
            </button>
            <?php $no = 1;
            foreach ($genre as $aa) { ?>
                <form action="genre/updategenreC" method="post">
                    <div class="modal fade" id="update<?= $aa['id_genre'] ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <input type="hidden" name="id_genre" value="<?= $aa['id_genre'] ?>">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Update Genre</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameWithTitle" class="form-label">Name</label>
                                            <input type="text" id="nameWithTitle" class="form-control" name="name" value="<?= $aa['genre'] ?>">
                                        </div>
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
                    <td><?= $aa['genre'] ?></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#update<?= $aa['id_genre'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" onClick="return confirm('Are you sure to delete this User?')" href="<?= base_url('admin/genre/deletegenre/' . $aa['id_genre']) ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
    </table>
</div>