<main id="galeri" class="mt-5">
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h2 class="fw-normal text-body-emphasis" style="font-family: 'Oswald', sans-serif !important">Galeri Wisata</h2>
        <p class="fs-5 text-body-secondary" style="font-family: 'Oswald', sans-serif !important">"Galeri wisata adalah cermin dari waktu dan tempat, menawarkan kepada kita sebuah perjalanan visual yang mengagumkan dan mencerahkan." - Anonymous.</p>
    </div>
    <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="card-wrapper container-sm d-flex justify-content-around">
                    <div class="card" style="width: 25rem; height: 20rem">
                        <img src="<?= $base_url ?>/assets/img/image1.jpeg" class="card-img-top" alt="...">
                    </div>
                    <div class="card" style="width: 25rem; height: 20rem">
                        <img src="<?= $base_url ?>/assets/img/image2.jpeg" class="card-img-top" alt="...">
                    </div>
                    <div class="card" style="width: 25rem; height: 20rem">
                        <img src="<?= $base_url ?>/assets/img/image3.jpeg" class="card-img-top" alt="...">
                    </div>
                </div>
            </div> 
            <div class="carousel-item">
                <div class="card-wrapper container-sm d-flex justify-content-around">
                    <div class="card" style="width: 25rem; height: 20rem">
                        <img src="<?= $base_url ?>/assets/img/image4.jpeg" class="card-img-top" alt="...">
                    </div>
                    <div class="card" style="width: 25rem; height: 20rem">
                        <img src="<?= $base_url ?>/assets/img/image5.jpeg" class="card-img-top" alt="...">
                    </div>
                    <div class="card" style="width: 25rem; height: 20rem">
                        <img src="<?= $base_url ?>/assets/img/image6.jpeg" class="card-img-top" alt="...">
                    </div>
                </div>
            </div>       
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</main>

<div class="container mt-5 video-youtube">
    <div class="video-container">
        <iframe src="https://www.youtube.com/embed/AJOru0wzKP8" style="border-radius: 10px" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>