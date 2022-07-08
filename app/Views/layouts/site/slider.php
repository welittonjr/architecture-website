<!-- SLIDER -->
<div id="slider-container">
    <div id="slider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#slider" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url('public/assets/img/escritorio.jpg') ?>" class="d-block" alt="Casa 1" />
                <div class="carousel-caption">
                    <h5>Casas planejadas</h5>
                    <a href="#" class="btn btn-dark">Ver Projeto</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('public/assets/img/escritorio.jpg') ?>" class="d-block" alt="Casa 2" />
                <div class="carousel-caption">
                    <h5>Projetos Complexos</h5>
                    <a href="#" class="btn btn-dark">Ver Projeto</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('public/assets/img/escritorio.jpg') ?>" class="d-block" alt="Casa 3" />
                <div class="carousel-caption">
                    <h5>Projetos Inovadores</h5>
                    <a href="#" class="btn btn-dark">Ver Projeto</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
            <i class="bi bi-chevron-compact-left"></i>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
            <i class="bi bi-chevron-compact-right"></i>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="col-12 col-md-10 offset-md-1" id="mini-banners">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card text-center">
                    <i class="bi bi-box primary-color"></i>
                    <div class="card-body">
                        <h5 class="card-title primary-color">Projetos completos</h5>
                        <p class="card-text secondary-color">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>
                        <a href="#" class="btn btn-dark">Saber Mais</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card text-center">
                    <i class="bi bi-layers primary-color"></i>
                    <div class="card-body">
                        <h5 class="card-title primary-color">Você participa também</h5>
                        <p class="card-text secondary-color">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>
                        <a href="#" class="btn btn-dark">Saber Mais</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card text-center">
                    <i class="bi bi-lightning-charge"></i>
                    <div class="card-body primary-color">
                        <h5 class="card-title primary-color">
                            Adiantamento de entregas
                        </h5>
                        <p class="card-text secondary-color">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>
                        <a href="#" class="btn btn-dark">Saber Mais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>