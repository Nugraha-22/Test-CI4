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
        <div class="card">
            <div class="card-header">
                <h3 class="font-weight-bold">Update Data</h3>
            </div>
            <div class="card-body">
                <?= form_open('Users/UpdateData'); ?>
                <div class="form-group">
                    <label for="users_name">Username</label>
                    <input type="hidden" class="form-control form-control-sm" name="users_id" id="users_id" value="<?= $users_id; ?>">
                    <input type="text" class="form-control form-control-sm" name="users_name" id="users_name" placeholder="Masukan Username" value="<?= $users_name; ?>">
                </div>
                <div class="form-group">
                    <label for="users_password">Password</label>
                    <input type="password" class="form-control form-control-sm" name="users_password" id="users_password" placeholder="Masukan Password" value="<?= $users_password; ?>">
                </div>
                <div class="form-group">
                    <label for="users_name">Role</label>
                    <select name="users_role" id="users_role" class="form-control form-control-sm">
                        <?php foreach ($role as $data) : ?>
                            <?php if ($data['role_id'] == $users_role) : ?>
                                <option value="<?= $data['role_id']; ?>" selected><?= $data['role_nama']; ?></option>
                            <?php else : ?>
                                <option value="<?= $data['role_id']; ?>"><?= $data['role_nama']; ?></option>
                            <?php endif; ?>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <a href="<?= base_url('Home'); ?>" class="btn btn-sm btn-warning">Kembali</a>
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>