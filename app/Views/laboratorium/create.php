<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Static Navigation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/laboratorium">laboratorium</a></li>
        <li class="breadcrumb-item active">tambah data</li>
    </ol>

    <!-- <div class="card mb-4">
        <div class="card-body">
            <p class="mb-0">
                This page is an example of using static navigation. By removing the
                <code>.sb-nav-fixed</code>
                class from the
                <code>body</code>
                , the top navigation and side navigation will become static on scroll. Scroll down this page to see an example.
            </p>
        </div>
    </div>
    <div style="height: 100vh"></div>
    <div class="card mb-4">
        <div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div>
    </div> -->

    <div class="card mb-4">
        <div class="card-header text-center">
            <i class="fas fa-table me-1"></i>
            Tambah Data
        </div>
        <div class="card-body">
            <form method="post" action="/laboratorium/save" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="row mb-3">
                            <!-- <label for="item_photo" class="form-label">nama foto</label>
                            <input class="form-control" id="item_photo" name="item_photo" type="text" autofocus /> -->

                            <label for="item_photo" class="col-sm-2 col-form-label">Foto Barang</label>
                            <div class="col-sm-3">
                                <img src="/img/laboratorium/default.png" alt="" class="img-thumbnail img-preview">
                            </div>
                            <div class="col-sm-7">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control <?= ($validation->hasError('item_photo')) ? 'is-invalid' : '' ?>" name="item_photo" id="item_photo" onchange="previewImage()">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('item_photo'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="item_code" class="form-label">Kode barang</label>
                            <input class="form-control" id="item_code" name="item_code" type="text" value="<?= old('item_code') ?>" required autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="item_name" class="form-label">Nama barang</label>
                            <input class="form-control" id="item_name" name="item_name" type="text" value="<?= old('item_name') ?>" required autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="item_spec" class="form-label">Spesifikasi / Jenis / Merek</label>
                            <input class="form-control" id="item_spec" name="item_spec" type="text" value="<?= old('item_spec') ?>" required autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="obtained_year" class="form-label">Tahun perolehan</label>
                            <input class="form-control" id="obtained_year" name="obtained_year" type="text" value="<?= old('obtained_year') ?>" required autofocus />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="unit_value" class="form-label">Nilai Satuan / Harga</label>
                            <input class="form-control" id="unit_value" name="unit_value" type="text" value="<?= old('unit_value') ?>" required autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="condition" class="form-label">Kondisi</label>
                            <input class="form-control" id="condition" name="condition" type="text" value="<?= old('condition') ?>" required autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="total" class="form-label">Total</label>
                            <input class="form-control" id="total" name="total" type="text" value="<?= old('total') ?>" required autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="user_unit" class="form-label">Unit Pengguna</label>
                            <input class="form-control" id="user_unit" name="user_unit" type="text" value="<?= old('user_unit') ?>" required autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="ownership_type" class="form-label">Jenis Kepemilikan</label>
                            <input class="form-control" id="ownership_type" name="ownership_type" type="text" value="<?= old('ownership_type') ?>" required autofocus />
                        </div>
                    </div>
                </div>
                <div class="mt-4 mb-0">
                    <a class="btn btn-danger float-start" href="#" onclick="window.history.back()">Kembali</a>
                    <button class="btn btn-primary float-end" type="submit" name="tambah">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>