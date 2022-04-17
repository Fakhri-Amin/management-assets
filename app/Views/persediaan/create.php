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
            <form method="POST" action="/persediaan/save" class="row g-3 needs-validation">
                <?= csrf_field(); ?>
                <div class="col">
                    <div class="mb-3">
                        <label for="foto_barang" class="form-label">Foto Barang</label>
                        <input type="file" class="form-control" id="foto_barang" name="foto_barang" required>
                    </div>
                    <div class="mb-3">
                        <label for="kode_barang" class="form-label">Kode Barang</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                    </div>
                    <div class="mb-3">
                        <label for="spesifikasi" class="form-label">Spesifikasi / Jenis / Merek</label>
                        <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" required>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="tahun_perolehan" class="form-label">Tahun Perolehan</label>
                        <input type="text" class="form-control" id="tahun_perolehan" name="tahun_perolehan" required>
                    </div>
                    <div class="mb-3">
                        <label for="nilai_satuan" class="form-label">Nilai Satuan</label>
                        <input type="text" class="form-control" id="nilai_satuan" name="nilai_satuan" required>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_barang_masuk" class="form-label">Jumlah Barang Masuk</label>
                        <input type="text" class="form-control" id="jumlah_barang_masuk" name="jumlah_barang_masuk" required>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_barang_keluar" class="form-label">Jumlah Barang Keluar</label>
                        <input type="text" class="form-control" id="jumlah_barang_keluar" name="jumlah_barang_keluar" required>
                    </div>
                    <div class="mb-3">
                        <label for="sisa_barang" class="form-label">Sisa Barang</label>
                        <input type="text" class="form-control" id="sisa_barang" name="sisa_barang" required>
                    </div>
                    <div class="mb-3">
                        <label for="unit_pengguna_barang" class="form-label">Unit Pengguna Barang</label>
                        <input type="text" class="form-control" id="unit_pengguna_barang" name="unit_pengguna_barang" required>
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