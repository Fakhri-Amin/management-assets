<?= $this->extend('layouts/template'); ?>


<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Static Navigation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">laboratorium</a></li>
        <li class="breadcrumb-item active">list</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header text-center">
            <i class="fas fa-table me-1"></i>
            Data Laboratorium
            <a class="btn btn-primary btn-sm float-end" href="/laboratorium/create">
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
                        <th>no</th>
                        <th>foto barang</th>
                        <th>nama barang</th>
                        <th>kode barang</th>
                        <th>spesifikasi</th>
                        <th>tahun perolehan</th>
                        <th>nilai satuan</th>
                        <th>kondisi</th>
                        <th>jumlah</th>
                        <th>unit pengguna</th>
                        <th>jenis kepemilian</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($datas as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <img src="/img/laboratorium/<?= $data['item_photo'] ?>" alt="<?= $data['item_photo'] ?>" title="<?= $data['item_photo'] ?>" width="100">
                            </td>
                            <td><?= $data['item_name'] ?></td>
                            <td><?= $data['item_code'] ?></td>
                            <td><?= $data['item_spec'] ?></td>
                            <td><?= $data['obtained_year'] ?></td>
                            <td><?= $data['unit_value'] ?></td>
                            <td><?= $data['condition'] ?></td>
                            <td><?= $data['total'] ?></td>
                            <td><?= $data['user_unit'] ?></td>
                            <td><?= $data['ownership_type'] ?></td>
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
                    <!-- <tr>
                        <td>2</td>
                        <td>komputer k</td>
                        <td>akses point</td>
                        <td>2342$#</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>
                            <a class="btn btn-success badge btn-sm" href="/laboratorium/edit">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <a class="btn btn-danger badge btn-sm" href="/laboratorium/delete">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>komputer h</td>
                        <td>akses point</td>
                        <td>2342$#</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>
                            <a class="btn btn-success badge btn-sm" href="/laboratorium/edit">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <a class="btn btn-danger badge btn-sm" href="/laboratorium/delete">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>