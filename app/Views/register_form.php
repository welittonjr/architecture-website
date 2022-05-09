<?= $this->extend('layouts/install/default') ?>

<?= $this->section('content') ?>

<div class="login-box">
    <?php if (isset($msgError)) : ?>
        <div class="alert alert-danger alert-dismissable fade show" role="alert">
            <?= $msgError ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="card card-outline card-success">
        <div class="card-header text-center">
            <p class="h5 text-dark">Registro de Administrador</p>
        </div>
        <div class="card-body">
            <?= form_open(base_url('install/it_started')) ?>
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="name" placeholder="Nome" value="<?= old('name') ?>">
                <?php if (isset($error) && $error->hasError('name')) : ?>
                    <span class="text-danger"><?= $error->getError('name'); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="username" placeholder="Nome do usuário" value="<?= old('username') ?>">
                <?php if (isset($error) && $error->hasError('username')) : ?>
                    <span class="text-danger"><?= $error->getError('username'); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="password" placeholder="Senha" value="<?= old('password') ?>">
                <?php if (isset($error) && $error->hasError('password')) : ?>
                    <span class="text-danger"><?= $error->getError('password'); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="cpassword" placeholder="Confirmar a Senha" value="<?= old('cpassword') ?>">
                <?php if (isset($error) && $error->hasError('cpassword')) : ?>
                    <span class="text-danger"><?= $error->getError('cpassword'); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="email" placeholder="E-mail" value="<?= old('email') ?>">
                <?php if (isset($error) && $error->hasError('email')) : ?>
                    <span class="text-danger"><?= $error->getError('email'); ?></span>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-success btn-block">Registrar</button>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>

</div>

<?= $this->endSection('content') ?>