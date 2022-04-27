<?= $this->extend('layouts/template'); ?>


<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Static Navigation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">meubellair</a></li>
        <li class="breadcrumb-item active">daftar</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header text-center">
            <i class="fas fa-table me-1"></i>
            Data Meubellair
            <a class="btn btn-primary btn-sm float-end" href="/meubellair/create">
                <i class="fas fa-solid fa-plus"></i>
                Tambah Data
            </a>
        </div>

        <div class="card-body">

            <!-- jika ada flash data -->
            <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('message'); ?>
                </div>
            <?php endif; ?>

            <table id="datatablesSimple" class="data-profil">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto Barang</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Spesifikasi / Jenis / Merek</th>
                        <th>Tahun Perolehan</th>
                        <th>Nilai Satuan / Harga</th>
                        <th>Kondisi</th>
                        <th>Jumlah</th>
                        <th>Pengguna</th>
                        <th>Unit Pengguna</th>
                        <th>Jenis Kepemilian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($datas as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <img src="/img/meubellair/<?= $data['foto_barang'] ?>" alt="<?= $data['foto_barang'] ?>" title="<?= $data['foto_barang'] ?>" width="100">
                            </td>
                            <td><?= $data['kode_barang'] ?></td>
                            <td><?= $data['nama_barang'] ?></td>
                            <td><?= $data['spesifikasi'] ?></td>
                            <td><?= $data['tahun_perolehan'] ?></td>
                            <td><?= $data['nilai_satuan'] ?></td>
                            <td><?= $data['kondisi'] ?></td>
                            <td><?= $data['jumlah'] ?></td>
                            <td><?= $data['pengguna'] ?></td>
                            <td><?= $data['unit_pengguna'] ?></td>
                            <td><?= $data['jenis_kepemilikan'] ?></td>
                            <td>
                                <a class="btn btn-success btn-sm" href="/meubellair/edit/<?= $data['id'] ?>">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <!-- <a class="btn btn-danger btn-sm" href="/meubellair/delete">
                                    <i class="bi bi-trash-fill"></i>
                                </a> -->

                                <form action="/meubellair/<?= $data['id'] ?>" method="post" class="d-inline">
                                    <?= csrf_field() ?>
                                    <input type="hidden" value="DELETE" name="_method">
                                    <button type="submit" class="btn btn-sm btn-danger mt-1" onclick="return confirm('apakah anda yakin ingin dihapus?')">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>