<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="/css/styles.css" rel="stylesheet" />

    <!-- bootsrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

    <!-- top nav -->
    <?= $this->include('layouts/navbar'); ?>

    <div id="layoutSidenav">

        <!-- left side nav -->
        <?= $this->include('layouts/side-nav'); ?>

        <div id="layoutSidenav_content">
            <main>

                <!-- main content -->
                <?= $this->renderSection('content'); ?>

            </main>

            <!-- footer -->
            <?= $this->include('layouts/footer'); ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="/assets/demo/chart-area-demo.js"></script>
    <script src="/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="/js/datatables-simple-demo.js"></script>

    <script>
        const previewImage = () => {
            const sampul = document.querySelector('#foto_barang');
            // const sampulLabel = document.querySelector('.sampul-name')
            const imgPreview = document.querySelector('.img-preview')

            // sampulLabel.textContent = sampul.files[0].name;

            const fileSampul = new FileReader();
            fileSampul.readAsDataURL(sampul.files[0])
            fileSampul.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function select_stnk() {
            // Get the checkbox
            var checkBox = document.getElementById("cek_stnk");
            // Get the output text
            var stnk_bpkb = document.getElementById("checkedOptionStnk");

            // If the checkbox is checked, display the output stnk_bpkb
            if (checkBox.checked == true) {
                stnk_bpkb.style.display = "block";
            } else {
                stnk_bpkb.style.display = "none";
            }
        }
    </script>

</body>

</html>