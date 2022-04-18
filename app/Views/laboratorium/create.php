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
            <form method="post" action="/laboratorium/save">
                <?= csrf_field(); ?>
                <div class="form-floating mb-3">
                    <input class="form-control" id="item_photo" name="item_photo" type="text" autofocus />
                    <label for="item_photo">nama foto</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="item_name" name="item_name" type="text" autofocus />
                    <label for="item_name">nama barang</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="item_code" name="item_code" type="text" autofocus />
                    <label for="item_code">kode barang</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="item_spec" name="item_spec" type="text" autofocus />
                    <label for="item_spec">spesifikasi barang</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="obtained_year" name="obtained_year" type="text" autofocus />
                    <label for="obtained_year">tahun perolehan</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="unit_value" name="unit_value" type="text" autofocus />
                    <label for="item_value">nilai satuan</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="condition" name="condition" type="text" autofocus />
                    <label for="condition">kondisi</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="total" name="total" type="text" autofocus />
                    <label for="total">total</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="user_unit" name="user_unit" type="text" autofocus />
                    <label for="user_unit">unit pengguna</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="ownership_type" name="ownership_type" type="text" autofocus />
                    <label for="ownership_type">jenis kepemilikan</label>
                </div>
                <div class="mt-4 mb-0">
                    <a class="btn btn-danger float-start" href="#" onclick="window.history.back()">kembali</a>
                    <button class="btn btn-primary float-end" type="submit" name="tambah">tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>