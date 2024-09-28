<form action="user/adduserC" method="post">
    <div class="modal fade" id="adduser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameWithTitle" class="form-label">Name</label>
                            <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Name" name="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="emailWithTitle" class="form-label">Username</label>
                            <input type="text" id="emailWithTitle" class="form-control" placeholder="Enter Username" name="username">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="nameWithTitle" class="form-label">Role</label>
                            <select name="role" class="form-control">
                                <option value="Admin">Admin</option>
                                <option value="Kasir">Kasir</option>
                            </select>
                        </div>
                        <div class="col mb-0">
                            <label for="dobWithTitle" class="form-label">Password</label>
                            <input type="password" id="dobWithTitle" class="form-control" name="password">
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
<h5 class="card-header">Data User</h5>
<div class="table-responsive text-nowrap">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>role</th>
                <th>Last Login</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            <button type="button" class="btn rounded-pill btn-primary mb-3 ml-3" data-bs-toggle="modal" data-bs-target="#adduser">
                + User
            </button>
            <?php $no = 1;
            foreach ($user as $aa) { ?>
                <form action="user/updateC" method="post">
                    <div class="modal fade" id="update<?= $aa['id_user'] ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <input type="hidden" name="id_user" value="<?= $aa['id_user'] ?>">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Update User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameWithTitle" class="form-label">Name</label>
                                            <input type="text" id="nameWithTitle" class="form-control" name="name" value="<?= $aa['name'] ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="emailWithTitle" class="form-label">Username</label>
                                            <input type="text" id="emailWithTitle" class="form-control" name="username" disabled value="<?= $aa['username'] ?>">
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col mb-0">
                                            <label for="nameWithTitle" class="form-label">role</label>
                                            <select name="role" class="form-control">
                                                <option value="Admin" <?php if ($aa['role'] == 'Admin') {
                                                                            echo "selected";
                                                                        } ?>>Admin</option>
                                                <option value="User" <?php if ($aa['role'] == 'User') {
                                                                            echo "selected";
                                                                        } ?>>User</option>
                                            </select>
                                        </div>
                                        <div class="col mb-0">
                                            <label for="dobWithTitle" class="form-label">Password</label>
                                            <input type="password" id="dobWithTitle" class="form-control" name="password" disabled value="...">
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
                    <td><?= $aa['name'] ?></td>
                    <td><?= $aa['username'] ?></td>
                    <td><?= $aa['role'] ?></td>
                    <td><?= $aa['last_active'] ?></td>
                    <td><span class="badge bg-label-primary me-1">Active</span></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#update<?= $aa['id_user'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" onClick="return confirm('Are you sure to delete this User?')" href="<?= base_url('admin/user/delete/' . $aa['id_user']) ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
    </table>
</div>