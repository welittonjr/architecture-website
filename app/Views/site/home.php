<?= $this->extend('layouts/site/default') ?>

<?= $this->section('content') ?>

<!-- DESTAQUES -->
<div class="container" id="featured-container">
    <div class="col-12">
        <h2 class="title primary-color">Trabalhos em Destaque</h2>
        <p class="subtitle secondary-color">
            Conheça nossos projetos mais desafiadores
        </p>
    </div>
    <div class="col-12" id="featured-images">
        <div class="row g-4">
            <div class="col-12 col-md-4">
                <img src="<?= base_url('public/assets/img/escritorio.jpg') ?>" alt="Projeto 1" class="img-fluid" />
                <div class="banner-content">
                    <p class="secondary-color">Categoria</p>
                    <h3>Nome do Projeto</h3>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <img src="<?= base_url('public/assets/img/escritorio.jpg') ?>" alt="Projeto 2" class="img-fluid" />
                <div class="banner-content">
                    <p class="secondary-color">Categoria</p>
                    <h3>Nome do Projeto</h3>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <img src="<?= base_url('public/assets/img/escritorio.jpg') ?>" alt="Projeto 3" class="img-fluid" />
                <div class="banner-content">
                    <p class="secondary-color">Categoria</p>
                    <h3>Nome do Projeto</h3>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <img src="<?= base_url('public/assets/img/escritorio.jpg') ?>" alt="Projeto 4" class="img-fluid" />
                <div class="banner-content">
                    <p class="secondary-color">Categoria</p>
                    <h3>Nome do Projeto</h3>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <img src="<?= base_url('public/assets/img/escritorio.jpg') ?>" alt="Projeto 5" class="img-fluid" />
                <div class="banner-content">
                    <p class="secondary-color">Categoria</p>
                    <h3>Nome do Projeto</h3>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <img src="<?= base_url('public/assets/img/escritorio.jpg') ?>" alt="Projeto 6" class="img-fluid" />
                <div class="banner-content">
                    <p class="secondary-color">Categoria</p>
                    <h3>Nome do Projeto</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- INFO -->
<div class="container" id="info-container">
    <div class="col-12">
        <h2 class="title primary-color">Detalhes Importantes</h2>
        <p class="subtitle secondary-color">
            Saiba mais sobre a experiência da nossa incrível equipe
        </p>
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-12 col-md-5" id="info-banner">
                <img src="<?= base_url('public/assets/img/escritorio.jpg') ?>" alt="Informações" class="img-fluid" />
            </div>
            <div class="col-12 col-md-7 bg-secondary-color" id="info-content">
                <div class="row">
                    <div class="col-12">
                        <h2 class="title">Estes dados fazem a diferença:</h2>
                        <p class="subtitle secondary-color">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Praesentium tempore fugit et iusto quisquam beatae impedit
                            nobis quas doloribus, atque, ut id similique eligendi, ab
                            soluta magnam maxime cum debitis.
                        </p>
                    </div>
                    <div class="col-12" id="info-numbers">
                        <div class="row">
                            <div class="col-4">
                                <h3 class="primary-color">18</h3>
                                <p class="secondary-color">Anos na construção civil</p>
                            </div>
                            <div class="col-4">
                                <h3 class="primary-color">95</h3>
                                <p class="secondary-color">Projetos executados</p>
                            </div>
                            <div class="col-4">
                                <h3 class="primary-color">639</h3>
                                <p class="secondary-color">Clientes</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <a class="btn btn-dark">Saber Mais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>