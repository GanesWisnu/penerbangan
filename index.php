<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/checkout/">
    <link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Checkout example · Bootstrap v5.1</title>
</head>

<body class="bg-light">
<div class="container">
    <main>
        <div class="py-5 text-center">
        <h2>Checkout form</h2>
        <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
        </div>

        <div class="row">
        <div class="col">
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" method="post" action="penerbangan.php">
                <input type="hidden" name="tanggal" value="<?php echo date("d-m-Y"); ?>">
                <label for="nama_maskapai" class="form-label">Nama Maskapai</label>
                <input type="text" class="form-control" id="nama_maskapai" name="nama_maskapai" placeholder="" value="" required="">
                <div class="invalid-feedback">
                    Valid first name is required.
                </div>

                <label for="bandara_asal" class="form-label">Bandara Asal</label>
                <select class="form-select" id="bandara_asal" name="bandara_asal" required="">
                <option value="">Choose...</option>
                <?php 
                    foreach ($bandara_asal as $asal => $pajak_asal){
                ?>
                    <option value="<?= $asal; ?>"><?= $asal; ?></option>
                <?php
                }
                ?>
                </select>
                <div class="invalid-feedback">
                Please select a valid country.
                </div>

                <label for="bandara_tujuan" class="form-label">Bandara Tujuan</label>
                <select class="form-select" id="bandara_tujuan" name="bandara_tujuan" required="">
                <option value="">Choose...</option>
                <?php 
                    foreach ($bandara_tujuan as $tujuan => $pajak_tujuan){
                ?>
                    <option value="<?= $tujuan; ?>"><?= $tujuan; ?></option>
                <?php
                }
                array_multisort($bandara_tujuan, SORT_ASC, $tujuan)
                ?>
                </select>
                <div class="invalid-feedback">
                Please select a valid country.
                </div>

                <label for="firstName" class="form-label">Harga Tiket</label>
                <input type="text" class="form-control" name="harga_tiket" id="harga_tiket" placeholder="" value="" required="">
                <div class="invalid-feedback">
                Valid first name is required.
                </div>

                <button class="w-100 btn btn-primary btn-lg my-4" type="submit" value="Daftar" name="daftar">Continue to checkout</button>
            </form>
        </div>

        <!-- break -->
        <div class="col">
            <h4 class="mb-3">Billing address</h4>
            <table class="table">
            <?php
            if (isset($_POST['daftar'])){
                $tanggal            = $_POST['tanggal'];
                $maskapai           = $_POST['nama_maskapai'];
                $asal               = $_POST['bandara_asal'];
                $tujuan             = $_POST['bandara_tujuan'];
                $harga_tiket        = $_POST['harga_tiket'];
                $pajak              = hitung_total_pajak($bandara_asal, $asal, $bandara_tujuan, $tujuan);
                $total_harga_tiket  = hitung_total_harga_tiket($_POST['harga_tiket'],$pajak);
            }
            ?>
                <tr>
                    <th scope="row">Tanggal</th>
                    <td>:</td>
                    <td><?php echo "$tanggal"?></td>
                </tr>
                <tr>
                    <th scope="row">Nama Maskapai</th>
                    <td>:</td>
                    <td><?php echo "$maskapai"?></td>
                </tr>
                <tr>
                    <th scope="row">Asal Penerbangan</th>
                    <td>:</td>
                    <td><?php echo "$asal"?></td>
                </tr>
                <tr>
                    <th scope="row">Tujuan Penerbangan</th>
                    <td>:</td>
                    <td><?php echo "$tujuan"?></td>
                </tr>
                <tr>
                    <th scope="row">Harga Tiket</th>
                    <td>:</td>
                    <td><?php echo "".rupiah($harga_tiket)?></td>
                </tr>
                <tr>
                    <th scope="row">Pajak</th>
                    <td>:</td>
                    <td><?php echo "".rupiah($pajak)?></td>
                </tr>
                <tr>
                    <th scope="row">Total Harga Tiket</td>
                    <td>:</td>
                    <td><?php echo "".rupiah($total_harga_tiket)?></td>
                </tr>
            </table>
        </div>
    </main>
</div>

<script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="form-validation.js"></script> 
</body>
</html>