<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Static Navigation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/aset_lainnya">Aset Lainnya</a></li>
        <li class="breadcrumb-item active">edit data</li>
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
            Edit Data
        </div>
        <div class="card-body">
            <form method="POST" action="/aset_lainnya/update/<?= $data['id'] ?>" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <input type="hidden" name="foto_lama" value="<?= $data['foto_barang'] ?>">

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="row mb-3">
                            <!-- <label for="item_photo" class="form-label">nama foto</label>
                            <input class="form-control" id="item_photo" name="item_photo" type="text" autofocus /> -->

                            <label for="foto_barang" class="col-sm-2 col-form-label">Foto Barang</label>
                            <div class="col-sm-3">
                                <img src="/img/aset_lainnya/default.png" alt="" class="img-thumbnail img-preview">
                            </div>
                            <div class="col-sm-7">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control <?= ($validation->hasError('foto_barang')) ? 'is-invalid' : '' ?>" name="foto_barang" id="foto_barang" onchange="previewImage()">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('foto_barang'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="kode_barang" class="form-label">Kode Barang</label>
                            <input type="text" class="form-control" id="kode_barang" name="kode_barang" required value="<?= (old('kode_barang')) ? old('kode_barang') : $data['kode_barang']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" required value="<?= (old('nama_barang')) ? old('nama_barang') : $data['nama_barang']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="spesifikasi" class="form-label">Spesifikasi / Jenis / Merek</label>
                            <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" required value="<?= (old('spesifikasi')) ? old('spesifikasi') : $data['spesifikasi']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tahun_perolehan" class="form-label">Tahun Perolehan</label>
                            <input type="text" class="form-control" id="tahun_perolehan" name="tahun_perolehan" required value="<?= (old('tahun_perolehan')) ? old('tahun_perolehan') : $data['tahun_perolehan']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tahun_perolehan" class="form-label">Nilai Satuan / Harga</label>
                            <input type="text" class="form-control" id="nilai_satuan" name="nilai_satuan" required value="<?= (old('nilai_satuan')) ? old('nilai_satuan') : $data['nilai_satuan']; ?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="nilai_satuan" class="form-label">Kondisi</label>
                            <select class="form-select" aria-label="Default select example" name="kondisi" required>
                                <option selected>- - Jenis Kerusakan --</option>
                                <option value="<?= (old('kondisi')) ? old('kondisi') : 'Baik'; ?>">Baik</option>
                                <option value="<?= (old('kondisi')) ? old('kondisi') : 'Rusak Ringan'; ?>">Rusak Ringan</option>
                                <option value="<?= (old('kondisi')) ? old('kondisi') : 'Rusak Berat'; ?>">Rusak Berat</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_barang_masuk" class="form-label">Jumlah</label>
                            <input type="text" class="form-control" id="jumlah" name="jumlah" required value="<?= (old('jumlah')) ? old('jumlah') : $data['jumlah']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_barang_keluar" class="form-label">Pengguna</label>
                            <input type="text" class="form-control" id="pengguna" name="pengguna" required value="<?= (old('pengguna')) ? old('pengguna') : $data['pengguna']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="sisa_barang" class="form-label">Unit Pengguna</label>
                            <input type="text" class="form-control" id="unit_pengguna" name="unit_pengguna" required value="<?= (old('unit_pengguna')) ? old('unit_pengguna') : $data['unit_pengguna']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="unit_pengguna_barang" class="form-label">Jenis Kepemilikan</label>
                            <input type="text" class="form-control" id="jenis_kepemilikan" name="jenis_kepemilikan" required value="<?= (old('jenis_kepemilikan')) ? old('jenis_kepemilikan') : $data['jenis_kepemilikan']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="unit_pengguna_barang" class="form-label">Kolom Keterangan</label>
                            <input type="text" class="form-control" id="kolom_keterangan" name="kolom_keterangan" required value="<?= (old('kolom_keterangan')) ? old('kolom_keterangan') : $data['kolom_keterangan']; ?>">
                        </div>
                    </div>
                    <div class="mt-4 mb-0">
                        <a class="btn btn-danger float-start" href="#" onclick="window.history.back()">Kembali</a>
                        <button class="btn btn-primary float-end" type="submit" name="tambah">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>