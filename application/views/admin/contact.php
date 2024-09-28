<div id="done">
    <?= $this->session->flashdata('alert'); ?>
</div>

<h5 class="card-header">Messages</h5>
<div class="table-responsive text-nowrap">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Messages</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            <?php $no = 1;
            foreach ($con as $aa) { ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $aa['name'] ?></td>
                    <td><?= $aa['email'] ?></td>
                    <td><?= $aa['fill'] ?></td>
                    <td> 
                        <a class="dropdown-item" onClick="return confirm('Are you sure to delete this message?')" href="<?= base_url('admin/contact/deletecon/' . $aa['id_contact']) ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                    </td>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
    </table>
</div>