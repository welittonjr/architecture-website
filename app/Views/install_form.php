<?= $this->extend('layouts/install/default') ?>
namespace App\Views;

<?= $this->section('content') ?>

<div class="login-box">

    <div class="card card-outline card-success">
        <div class="card-header text-center">
            <p class="h5 text-dark">Instalação</p>
        </div>
        <div class="card-body">
            <?= form_open('/install') ?>
            <div class="form-group mb-3">
                <?= form_input(array('class' => 'form-control', 'name' => 'hostname', 'placeholder' => 'Hostname', 'value' => set_value('hostname', 'localhost'))); ?>
            </div>
            <div class="form-group mb-3">
                <?= form_input(array('class' => 'form-control', 'name' => 'database', 'placeholder' => 'Database Name', 'value' => set_value('database'))); ?>
            </div>
            <div class="form-group mb-3">
                <?= form_input(array('class' => 'form-control', 'name' => 'username', 'placeholder' => 'Username', 'value' => set_value('username'))); ?>
            </div>
            <div class="form-group mb-3">
                <?= form_input(array('class' => 'form-control', 'name' => 'password', 'placeholder' => 'Password', 'value' => set_value('password'))); ?>
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