<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Static Navigation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/laporan_yang_dibutuhkan"><?= $menu; ?></a></li>
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
            <form method="POST" action="/laporan_yang_dibutuhkan/save" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="tanah_dan_bangunan" class="form-label">Tanah dan Bangunan</label>
                            <textarea class="form-control" id="tanah_dan_bangunan" name="tanah_dan_bangunan" value="<?= (old('tanah_dan_bangunan')) ? old('tanah_dan_bangunan') : ''; ?>"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="kendaraan_bermotor" class="form-label">Kendaraan Bermotor</label>
                            <textarea class="form-control" id="kendaraan_bermotor" name="kendaraan_bermotor" value="<?= (old('kendaraan_bermotor')) ? old('kendaraan_bermotor') : ''; ?>"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="peralatan_dan_mesin" class="form-label">Peralatan dan Mesin / Jenis / Merek</label>
                            <textarea class="form-control" id="peralatan_dan_mesin" name="peralatan_dan_mesin" value="<?= (old('peralatan_dan_mesin')) ? old('peralatan_dan_mesin') : ''; ?>"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="meubellair" class="form-label">Meubellair</label>
                            <textarea class="form-control" id="meubellair" name="meubellair" value="<?= (old('meubellair')) ? old('meubellair') : ''; ?>"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="persediaan" class="form-label">Persediaan</label>
                            <textarea class="form-control" id="persediaan" name="persediaan" value="<?= (old('persediaan')) ? old('persediaan') : ''; ?>"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="aset_lainnya" class="form-label">Aset Lainnya</label>
                            <textarea class="form-control" id="aset_lainnya" name="aset_lainnya" value="<?= (old('aset_lainnya')) ? old('aset_lainnya') : ''; ?>"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="laboratorium" class="form-label">Laboratorium</label>
                            <textarea class="form-control" id="laboratorium" name="laboratorium" value="<?= (old('laboratorium')) ? old('laboratorium') : ''; ?>"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="data_hibah" class="form-label">Data Hibah</label>
                            <textarea class="form-control" id="data_hibah" name="data_hibah" value="<?= (old('data_hibah')) ? old('data_hibah') : ''; ?>"></textarea>
                        </div>
                    </div>
                    <div class="mt-4 mb-0">
                        <a class="btn btn-danger float-start" href="#" onclick="window.history.back()">Kembali</a>
                        <button class="btn btn-primary float-end" type="submit" name="tambah">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>