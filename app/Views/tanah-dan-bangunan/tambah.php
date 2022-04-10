<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Static Navigation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/admin/profile">profil</a></li>
        <li class="breadcrumb-item active">tambah profil</li>
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
            <form method="post" action="/profile/simpan">
                <?= csrf_field(); ?>
                <div class="form-floating mb-3">
                    <input class="form-control" id="name" id="name" name="name" type="text" autofocus />
                    <label for="name">nama profil</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="content" id="content" rows="7"></textarea>
                    <label for="content">isi profil</label>
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