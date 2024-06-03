<?= $this->extend('kerangka') ?>

<?= $this->section('isi_web') ?>
<form action="<?= base_url('aksi_login'); ?>" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">ID user</label>
        <input type="text" name="f_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter ID">
        <br>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="f_pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
        <br>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
<?= $this->endSection() ?>