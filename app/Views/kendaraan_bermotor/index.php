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
            <a class="btn btn-primary btn-sm float-end" href="/kendaraan_bermotor/create">
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
                        <th>Foto Kendaraan</th>
                        <th>No.Polisi</th>
                        <th>Merek / Tipe</th>
                        <th>Jenis / Model</th>
                        <th>Tahun Pembuatan</th>
                        <th>Warna</th>
                        <th>Isi Silinder</th>
                        <th>Nomor Rangka / Nik</th>
                        <th>Nomor Mesin</th>
                        <th>Bahan Bakar</th>
                        <th>STNK / BPKB</th>
                        <th>Kondisi</th>
                        <th>Pejabat / Pengguna</th>
                        <th>Sopir</th>
                        <th>Jenis Kepemilikan</th>
                        <?php if (in_groups(['admin-master', 'admin-bmn-unkhair', 'admin-bmn-fakultas'])) : ?>
                            <th>Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($datas as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <img src="/img/kendaraan_bermotor/<?= $data['foto_barang'] ?>" alt="<?= $data['foto_barang'] ?>" title="<?= $data['foto_barang'] ?>" width="100">
                            </td>
                            <td><?= $data['no_polisi']; ?></td>
                            <td><?= $data['merek_tipe']; ?></td>
                            <td><?= $data['jenis_model']; ?></td>
                            <td><?= $data['tahun_pembuatan']; ?></td>
                            <td><?= $data['warna']; ?></td>
                            <td><?= $data['isi_silinder']; ?></td>
                            <td><?= $data['nomor_rangka_nik']; ?></td>
                            <td><?= $data['nomor_mesin']; ?></td>
                            <td><?= $data['bahan_bakar']; ?></td>
                            <td><?= $data['stnk_bpkb']; ?></td>
                            <td><?= $data['kondisi']; ?></td>
                            <td><?= $data['pejabat_pengguna']; ?></td>
                            <td><?= $data['sopir']; ?></td>
                            <td><?= $data['jenis_kepemilikan']; ?></td>
                            <?php if (in_groups(['admin-master', 'admin-bmn-unkhair', 'admin-bmn-fakultas'])) : ?>
                                <td>
                                    <a class="btn btn-success btn-sm" href="/kendaraan_bermotor/edit/<?= $data['id']; ?>">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <form action="/kendaraan_bermotor/<?= $data['id']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm btn-danger mt-1" onclick="return confirm('apakah anda yakin ingin dihapus?')">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>