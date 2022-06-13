<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Static Navigation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/role_list"><?= $menu; ?></a></li>
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
            <form method="POST" action="/user_type/update/<?= $data['id'] ?>" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="description" name="description" required value="<?= (old('description')) ? old('description') : $data['description']; ?>">
                        </div>
                    </div>
                    <div class="mt-4 mb-0">
                        <a class="btn btn-danger float-start" href="#" onclick="window.history.back()">Kembali</a>
                        <button class="btn btn-primary float-end" type="submit" name="tambah">Edit</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>