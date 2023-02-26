<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" style="padding-top: 8.5rem;">
  <div class="conteainer-fluid d-md-flex">
    <div class="col-md-3 d-flex align-items-center justify-content-center rounded-2" style="width: 500px; height: 500px; overflow-y: hidden; background-color: rgb(0, 0, 0, 0.3);">
      <img src="/dist/img/default_image.png" class="img-preview" alt="" height="500px" style="object-fit: cover;">
    </div>
    <div class="col-md-7 ms-md-3 mt-3" style="padding-bottom: 2rem;">
      <h1 class="fw-semibold">Insert Data Komik <ion-icon name="book-outline"></ion-icon>
      </h1>
      <hr>
      <form action="/admin/save" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="hidden" name="id" value="<?= $komik ?>">
        <div class="mb-3">
          <label for="judul" class="form-label fw-semibold">Judul komik</label>
          <input type="text" class="form-control <?=($validation->hasError('judul')) ? 'is-invalid' : '' ?>" id="judul" name="judul" value="<?= old('judul') ?>" autofocus>
          <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('judul') ?>
          </div>

        </div>
        <div class="mb-3">
          <label for="sinopsis" class="form-label fw-semibold">Sinopsis</label>
          <textarea class="form-control <?=($validation->hasError('sinopsis')) ? 'is-invalid' : '' ?>" name="sinopsis" id="sinopsis" cols="30" rows="10"><?= old('sinopsis') ?></textarea>
          <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('sinopsis') ?>
          </div>
        </div>
        <div class="col-5 mb-3">
          <label for="harga" class="form-label fw-semibold">Harga</label>
          <input type="number" class="form-control <?=($validation->hasError('harga')) ? 'is-invalid' : '' ?>" id="harga" name="harga" value="<?= old('harga') ?>">
          <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('harga') ?>
          </div>
        </div>
        <div class="col-5 mb-3">
        <label for="jenis" class="form-label fw-semibold">Jenis</label>
          <select class="form-control <?=($validation->hasError('jenis')) ? 'is-invalid' : '' ?>" name="jenis" id="jenis">
            <option value="">--Pilih--</option>
            <option value="1">Manga</option>
            <option value="2">Ligth Novel</option>
          </select>
          <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('jenis') ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="file" class="form-label fw-semibold">Upload File</label>
          <input type="file" class="form-control <?=($validation->hasError('cover')) ? 'is-invalid' : '' ?>" id="cover" name="cover" onchange="preview()" >
          <div id="validationServer03Feedback" class="invalid-feedback">
            <?= $validation->getError('cover') ?>
          </div>
        </div>
        <hr>
        <div>
          <button type="submit" class="btn btn-primary">SIMPAN</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>