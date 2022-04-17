<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Static Navigation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/laboratorium">persediaan</a></li>
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
            <form method="POST" action="/persediaan/save">
                <?= csrf_field(); ?>
                <div class="form-floating mb-3">
                    <input class="form-control" id="foto_barang" name="foto_barang" type="text" autofocus />
                    <label for="foto_barang">Nama Foto</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="kode_barang" name="kode_barang" type="text" autofocus />
                    <label for="kode_barang">Kode Barang</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="nama_barang" name="nama_barang" type="text" autofocus />
                    <label for="nama_barang">Nama barang</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="spesifikasi" name="spesifikasi" type="text" autofocus />
                    <label for="spesifikasi">Spesifikasi Barang</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="tahun_perolehan" name="tahun_perolehan" type="text" autofocus />
                    <label for="tahun_perolehan">Tahun Perolehan</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="nilai_satuan" name="nilai_satuan" type="text" autofocus />
                    <label for="nilai_satuan">Nilai Satuan</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="jumlah_barang_masuk" name="jumlah_barang_masuk" type="text" autofocus />
                    <label for="jumlah_barang_masuk">Jumlah Barang Masuk</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="jumlah_barang_keluar" name="jumlah_barang_keluar" type="text" autofocus />
                    <label for="jumlah_barang_keluar">Jumlah Barang Keluar</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="sisa_barang" name="sisa_barang" type="text" autofocus />
                    <label for="sisa_barang">Sisa Barang</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="unit_pengguna_barang" name="unit_pengguna_barang" type="text" autofocus />
                    <label for="unit_pengguna_barang">Unit Pengguna Barang</label>
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