<?= $this->extend('layouts/install/default') ?>

<?= $this->section('content') ?>

<div class="login-box">

    <div class="card card-outline card-success">
        <div class="card-header text-center">
            <p class="h5 text-dark">Instalação</p>
        </div>
        <div class="card-body">
            <?= form_open(base_url('install/it_started')) ?>
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="hostname" placeholder="Hostname" value="<?= old('hostname') ?>">
                <?php if (isset($error) && $error->hasError('hostname')): ?>
                    <span class="text-danger"><?= $error->getError('hostname'); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="database" placeholder="Database Name" value="<?= old('database') ?>">
                <?php if (isset($error) && $error->hasError('database')): ?>
                    <span class="text-danger"><?= $error->getError('database'); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="username" placeholder="Username" value="<?= old('username') ?>">
                <?php if (isset($error) && $error->hasError('username')): ?>
                    <span class="text-danger"><?= $error->getError('username'); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="password" placeholder="Password" value="<?= old('password') ?>">
                <?php if (isset($error) && $error->hasError('password')): ?>
                    <span class="text-danger"><?= $error->getError('password'); ?></span>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-success btn-block">Instalar o sistem de gestão</button>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>

</div>

<?= $this->endSection('content') ?>