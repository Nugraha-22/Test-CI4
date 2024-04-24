<?= $this->extend('Templates/Main'); ?>

<?= $this->section('content'); ?>
<style>
    .content {
        width: 100%;
        min-height: 70vh;
        margin-top: 100px;
    }
</style>

<div class="content">
    <div class="container">
        <div class="card mb-2">
            <div class="card-body">
                <h4 class="font-weight-bold">SELAMAT DATANG, <?= session()->get('users_name'); ?></h4>
            </div>
        </div>
        <?php if (session()->users_role == 1) : ?>
            <div class="card">
                <div class="card-header">
                    <a href="<?= base_url('Users/Tambah'); ?>" class="btn btn-sm btn-primary">Tambah Data</a>
                </div>
                <div class="card-body">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($users as $data) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['users_name']; ?></td>
                                    <td><?= $data['users_password']; ?></td>
                                    <td><?= $data['role_nama']; ?></td>
                                    <td>
                                        <a href="<?= base_url('Users/Update/' . $data['users_id']); ?>" class="btn btn-sm btn-success">Update</a>
                                        <a href="<?= base_url('Users/Hapus/' . $data['users_id']); ?>" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
        <?php if (session()->users_role == 2) : ?>
            <div class="card">
                <div class="card-header">
                    <a href="<?= base_url('Users/Tambah'); ?>" class="btn btn-sm btn-primary">Tambah Data</a>
                </div>
                <div class="card-body">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($users as $data) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['users_name']; ?></td>
                                    <td><?= $data['users_password']; ?></td>
                                    <td><?= $data['role_nama']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection(); ?>