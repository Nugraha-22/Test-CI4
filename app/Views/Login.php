<?= $this->extend('Templates/Login/Main'); ?>

<?= $this->section('content'); ?>
<style>
    .login {
        width: 100%;
        min-height: 80vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<div class="login">
    <div class="card" style="width:28rem;">
        <div class="card-header">
            <h3 class="font-weight-bold text-center">LOGIN</h3>
        </div>
        <div class="card-body">
            <?= form_open('Login/Auth'); ?>
            <div class="form-group">
                <?php $isInvalidUsersName = (session()->getFlashdata('error_users_name')) ? 'is-invalid' : '' ?>
                <label for="">Username</label>
                <input type="text" class="form-control form-control-sm <?= $isInvalidUsersName; ?>" name="users_name" id="users_name" placeholder="Masukan Nama">
                <?php
                if (session()->getFlashdata('error_users_name')) {
                    echo '<div id="validationServer03Feedback" class="invalid-feedback">
                                 ' . session()->getFlashdata('error_users_name') . '
                                </div>';
                }
                ?>
            </div>
            <div class="form-group">
                <?php $isInvalidPassword = (session()->getFlashdata('error_users_password')) ? 'is-invalid' : '' ?>
                <label for="">Password</label>
                <input type="password" class="form-control form-control-sm <?= $isInvalidPassword; ?>" name="users_password" id="users_password" placeholder="Masukan Password">
                <?php
                if (session()->getFlashdata('error_users_password')) {
                    echo '<div id="validationServer03Feedback" class="invalid-feedback">
                                 ' . session()->getFlashdata('error_users_password') . '
                                </div>';
                }
                ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary w-100">Masuk</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>