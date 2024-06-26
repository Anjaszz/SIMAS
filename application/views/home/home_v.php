<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10"><?= $title ?></h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('home') ?>"><i class="feather icon-home"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <?php foreach ($box as $b) { ?>
        <div class="col-md-6 col-xl-3">
            <div class="card social-widget-card">
                <div class="card-body-big bg-<?= $b->color ?>">
                    <h3 class="text-white m-0"><?= $b->total ?></h3>
                    <span class="m-t-10"><?= $b->title ?></span>
                    <a href="<?= $b->link ?>" class="total-mahasiswa-link">
                        <i class="fa fa-<?= $b->icon ?>"></i>
                    </a>
                    <a href="<?= $b->link ?>" class="total-fakultas-link">
                        <i class="fa fa-<?= $b->icon ?>"></i>
                    </a>
                    <a href="<?= $b->link ?>" class="total-prodi-link">
                        <i class="fa fa-<?= $b->icon ?>"></i>
                    </a>
                    <a href="<?= $b->link ?>" class="total-seminar-link">
                        <i class="fa fa-<?= $b->icon ?>"></i>
                    </a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="row">
         
    
        </div>
    </div>

</div>
<script>
    // Fungsi untuk menangani pengalihan halaman ketika ikon total mahasiswa diklik
    document.querySelectorAll('.total-mahasiswa-link').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            window.location.href = this.getAttribute('href');
        });
    });
    document.querySelectorAll('.total-fakultas-link').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            window.location.href = this.getAttribute('href');
        });
    });
    document.querySelectorAll('.total-prodi').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            window.location.href = this.getAttribute('href');
        });
    });
    document.querySelectorAll('.total-seminar').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            window.location.href = this.getAttribute('href');
        });
    });
</script>
