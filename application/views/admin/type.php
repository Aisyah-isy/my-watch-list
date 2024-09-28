<form action="type/addtypeC" method="post">
    <div class="modal fade" id="addtype" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameWithTitle" class="form-label">Type</label>
                            <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Name" name="type_name">
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

<h5 class="card-header">Type</h5>
<div class="table-responsive text-nowrap">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            <button type="button" class="btn rounded-pill btn-primary mb-3 ml-3" data-bs-toggle="modal" data-bs-target="#addtype">
                + Type
            </button>
            <?php $no = 1;
            foreach ($type as $aa) { ?>
                <form action="type/updatetypeC" method="post">
                    <div class="modal fade" id="update<?= $aa['id_type'] ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <input type="hidden" name="id_type" value="<?= $aa['id_type'] ?>">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Update Type</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameWithTitle" class="form-label">Name</label>
                                            <input type="text" id="nameWithTitle" class="form-control" name="type_name" value="<?= $aa['type_name'] ?>">
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
                    <td><?= $aa['type_name'] ?></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#update<?= $aa['id_type'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" onClick="return confirm('Are you sure to delete this Type?')" href="<?= base_url('admin/type/deletetype/' . $aa['id_type']) ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
    </table>
</div>