<?= $this->extend('layouts/login/default') ?>

<?= $this->section('content') ?>

<div class="login-box">

    <?php $msgError = session()->getFlashdata('msgError') ?>

    <?php if (!empty($msgError)) : ?>
        <div class="alert alert-danger alert-dismissable fade show" role="alert">
            <?= $msgError ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if (!empty($msgSuccess)) : ?>
        <div class="alert alert-success alert-dismissable fade show" role="alert">
            <?= $msgSuccess ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="/" class="h1">Maya<b>ARQ</b></a>
        </div>
        <div class="card-body">
            <form action="<?= base_url('login/forgot-password') ?>" method="post">
                <p class="login-box-msg">Você esqueceu sua senha? Aqui você pode facilmente recuperar uma nova senha.</p>

                <div class="input-group mb-3">
                    <input type="email" name="email"class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <?php if (isset($error) && $error->hasError('hostname')) : ?>
                        <span class="text-danger"><?= $error->getError('hostname'); ?></span>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Solicitar Nova Senha</button>
                    </div>

                </div>
            </form>

            <p class="mt-2">
                <a href="<?= base_url('login') ?>">Login</a>
            </p>
        </div>

    </div>

</div>

<?= $this->endSection('content') ?>