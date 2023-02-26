<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" style="padding-top: 7rem;">
  <h2 class="fw-semibold ms-2">Komik Terbaru</h2>
  <hr>
  <div class="container-fluid">
    <div class="row d-flex">
      <?php foreach ($komik as $data) : ?>
        <div class="col-md-3 mt-4">
          <div class="card">
            <div class="d-flex justify-content-center align-items-center" style="width: 100%; height: 200px; overflow: hidden;">
              <img src="<?= base_url('/dist/img/'.$data['cover']) ?>" height="200px" style="object-fit: cover;">
            </div>
            <div class="card-body">
            <div class="d-flex align-items-center" style="overflow-x: hidden; overflow-y: auto; height: 60px;">
                <div class="card-title fw-semibold"><?= $data['judul'] ?></div>
              </div>
              <?php $hargaAwal = (int)$data['harga']; ?>
              <div class="card-text fs-5 fw-semibold">RP. <?= number_format($hargaAwal, 0, ',', '.') ?></div>
              <!-- <div class="card-text fs-6 fw-normal">Stok </div> -->
              <a href="/detail/<?= $data['slug'] ?>" class="btn btn-primary w-100 mt-3">Detail</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <hr>
</div>

<?= $this->endSection(); ?>