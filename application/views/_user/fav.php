<div id="done">
    <?= $this->session->flashdata('alert'); ?>
</div>
<!-- ditampilkan ke menu my favorite di backend-->

<h5 class="card-header">My Favorite List</h5>
<div class="table-responsive text-nowrap">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            <?php $no = 1;
            foreach ($fav as $aa) { ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $aa['title'] ?></td>
                    <td> 
                        <a class="dropdown-item" onClick="return confirm('Are you sure to delete this favorite list?')" href="<?= base_url('_user/fav/delete/' . $aa['id_fav']) ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                    </td>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
    </table>
</div>