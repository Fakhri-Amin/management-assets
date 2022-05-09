<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Static Navigation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#"><?= $menu; ?></a></li>
        <li class="breadcrumb-item active">list</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header text-center">
            <i class="fas fa-table me-1"></i>
            Data <?= $menu; ?>
            <a class="btn btn-primary btn-sm float-end" href="/tanah_dan_bangunan/create">
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
                        <th>Kondisi Bangunan</th>
                        <th>Luas Tanah</th>
                        <th>Luas Bangunan</th>
                        <th>Jumlah Bangunan</th>
                        <th>Jumlah Ruangan</th>
                        <th>Peruntukan Ruang</th>
                        <th>Tahun Perolehan</th>
                        <th>Nilai Bangunan / Nilai Pekerjaan</th>
                        <th>Nilai Satuan / Nilai Tanah</th>
                        <th>Luas Halaman / Taman</th>
                        <th>Nomor Kepemilikan / Sertifikat</th>
                        <th>Alamat</th>
                        <th>Batas Lahan</th>
                        <th>Denah Gedung</th>
                        <th>Nomor IMB</th>
                        <th>Jenis Kepemilikan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($datas as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <img src="/img/tanah_dan_bangunan/<?= $data['foto_barang'] ?>" alt="<?= $data['foto_barang'] ?>" title="<?= $data['foto_barang'] ?>" width="100">
                            </td>
                            <td><?= $data['kondisi_bangunan']; ?></td>
                            <td><?= $data['luas_tanah']; ?></td>
                            <td><?= $data['luas_bangunan']; ?></td>
                            <td><?= $data['jumlah_bangunan']; ?></td>
                            <td><?= $data['jumlah_ruangan']; ?></td>
                            <td><?= $data['peruntukan_ruang']; ?></td>
                            <td><?= $data['tahun_perolehan']; ?></td>
                            <td><?= $data['nilai_bangunan_pekerjaan']; ?></td>
                            <td><?= $data['nilai_satuan_tanah']; ?></td>
                            <td><?= $data['luas_halaman_taman']; ?></td>
                            <td><?= $data['nomor_kepemilikan_sertifikat']; ?></td>
                            <td><?= $data['alamat']; ?></td>
                            <td><?= $data['batas_lahan']; ?></td>
                            <td><?= $data['denah_gedung']; ?></td>
                            <td><?= $data['nomor_imb']; ?></td>
                            <td><?= $data['jenis_kepemilikan']; ?></td>
                            <td>
                                <a class="btn btn-success btn-sm" href="/tanah_dan_bangunan/edit/<?= $data['id']; ?>">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="/tanah_dan_bangunan/<?= $data['id']; ?>" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
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