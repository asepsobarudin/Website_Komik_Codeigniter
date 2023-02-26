<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" style="padding-top: 8rem;">
  <div class="conteainer-fluid">
    <a href="/admin/insert" class="btn btn-primary mb-3">Tambah Data Komik</a>
    <div class="d-flex w-100 justify-content-between">
      <h1 class="fw-semibold">Data Komik<ion-icon name="book-outline"></ion-icon></h1>
      <?php if(session()->getFlashdata('pesan')) : ?>
      <div class="alert alert-success d-flex" role="alert">
        <ion-icon name="checkmark-circle-outline" class="fs-4 me-1" style="margin-top: 1px;"></ion-icon>
        <div><?= session()->getFlashdata('pesan'); ?></div>
      </div>
      <?php endif; ?>
    </div>
    <hr>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Image</th>
          <th scope="col">Judul</th>
          <th scope="col">Batal</th>
        </tr>
      </thead>
      <tbody>
      <?php $i = 1; ?>
      <?php foreach($komik as $data) : ?>
        <tr style="vertical-align: middle;">
          <th scope="row"><?= $i++ ?></th>
          <td>
            <div class="d-flex align-items-center justify-content-center" style="width: 100px; height: 100px; ">
              <img src="<?= base_url('/dist/img/'.$data['cover']) ?>" height="100px" alt="">
            </div>
          </td>
          <td style="width: 500px;" class="fw-semibold"><?= $data['judul'] ?></td>
          <td style="width: 260px;">
            <a href="/admin/<?= $data['slug'] ?>" class="btn btn-primary mt-3">Detail</a>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection(); ?>