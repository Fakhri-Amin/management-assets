<?= $this->extend('layouts/template'); ?>


<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Static Navigation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">persediaan</a></li>
        <li class="breadcrumb-item active">list</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header text-center">
            <i class="fas fa-table me-1"></i>
            Data Persediaan
            <a class="btn btn-primary btn-sm float-end" href="/persediaan/create">
                <i class="fas fa-solid fa-plus"></i>
                Tambah Data
            </a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="data-profil">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>foto barang</th>
                        <th>kode barang</th>
                        <th>nama barang</th>
                        <th>spesifikasi</th>
                        <th>tahun perolehan</th>
                        <th>nilai satuan</th>
                        <th>Jumlah Barang Masuk</th>
                        <th>Jumlah Barang Keluar</th>
                        <th>Sisa Barang</th>
                        <th>Unit Pengguna Barang</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($datas as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <img src="/img/laboratorium/<?= $data['foto_barang'] ?>" alt="<?= $data['foto_barang'] ?>" title="<?= $data['foto_barang'] ?>" width="100">
                            </td>
                            <td><?= $data['kode_barang']; ?></td>
                            <td><?= $data['nama_barang']; ?></td>
                            <td><?= $data['spesifikasi']; ?></td>
                            <td><?= $data['tahun_perolehan']; ?></td>
                            <td><?= $data['nilai_satuan']; ?></td>
                            <td><?= $data['jumlah_barang_masuk']; ?></td>
                            <td><?= $data['jumlah_barang_keluar']; ?></td>
                            <td><?= $data['sisa_barang']; ?></td>
                            <td><?= $data['unit_pengguna_barang']; ?></td>
                            <td>
                                <a class="btn btn-success badge btn-sm" href="/laboratorium/edit">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <a class="btn btn-danger badge btn-sm" href="/laboratorium/delete">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>