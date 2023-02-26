<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" style="padding-top: 7.5rem;">
  <?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success d-flex" role="alert">
      <ion-icon name="close-circle-outline" class="fs-4 me-1" style="margin-top: 1px;"></ion-icon>
      <div><?= session()->getFlashdata('pesan'); ?></div>
    </div>
    <?php endif; ?>
    <h2 class="fw-semibold ms-2">Manga Terbaru</h2>
    <hr>
    <div class="container-fluid">
      <div class="row d-flex">
        <?php $i = 1; ?>
        <?php foreach ($manga as $data) : ?>
          <div class="col-md-3 mt-4">
            <div class="card">
              <div class="d-flex justify-content-center align-items-center" style="width: 100%; height: 200px; overflow: hidden;">
                <img src="<?= base_url('/dist/img/' . $data['cover']) ?>" height="200px" style="object-fit: cover;">
              </div>
              <div class="card-body">
                <div class="d-flex align-items-center" style="overflow-x: hidden; overflow-y: auto; height: 60px;">
                  <div class="card-title fw-semibold"><?= $data['judul'] ?></div>
                </div>
                <?php $hargaAwal = (int)$data['harga']; ?>
                <div class="card-text fs-5 fw-semibold">RP. <?= number_format($hargaAwal, 0, ',', '.') ?></div>
                <a href="/detail/<?= $data['slug'] ?>" class="btn btn-primary w-100 mt-3">Detail</a>
              </div>
            </div>
          </div>
          <?php if ($i == 7) {
            break;
          } ?>
          <?php $i++; ?>
        <?php endforeach; ?>
        <div class="col-md-3 mt-4">
          <a href="/all/1">
            <div class="card" style="height: 22.3rem;">
              <div class="d-flex justify-content-center align-items-center" style="height: 100%; color: rgb(0, 0, 0, 0.5);">
                <ion-icon name="chevron-forward-outline" style="font-size: 12rem;"></ion-icon>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
    <hr>
</div>

<div class="container" style="padding-top: 3rem;">
  <h2 class="fw-semibold ms-2">Ligth Novel Terbaru</h2>
  <hr>
  <div class="container-fluid">
    <div class="row d-flex">
      <?php $i = 1; ?>
      <?php foreach ($novel as $data) : ?>
        <div class="col-md-3 mt-4">
          <div class="card">
            <div class="d-flex justify-content-center align-items-center" style="width: 100%; height: 200px; overflow: hidden;">
              <img src="<?= base_url('/dist/img/' . $data['cover']) ?>" height="200px" style="object-fit: cover;">
            </div>
            <div class="card-body">
              <div class="d-flex align-items-center" style="overflow-x: hidden; overflow-y: auto; height: 60px;">
                <div class="card-title fw-semibold"><?= $data['judul'] ?></div>
              </div>
              <?php $hargaAwal = (int)$data['harga']; ?>
              <div class="card-text fs-5 fw-semibold">RP. <?= number_format($hargaAwal, 0, ',', '.') ?></div>
              <a href="/detail/<?= $data['slug'] ?>" class="btn btn-primary w-100 mt-3">Detail</a>
            </div>
          </div>
        </div>
        <?php if ($i == 7) {
          break;
        } ?>
        <?php $i++; ?>
      <?php endforeach; ?>
      <div class="col-md-3 mt-4">
        <a href="/all/2">
          <div class="card" style="height: 22.3rem;">
            <div class="d-flex justify-content-center align-items-center" style="height: 100%; color: rgb(0, 0, 0, 0.5);">
              <ion-icon name="chevron-forward-outline" style="font-size: 12rem;"></ion-icon>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
  <hr>
</div>

<?= $this->endSection(); ?>