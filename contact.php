
<?php
session_start();
require_once "core/base.php";
require_once "core/functions.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="assets/vendor/data_table/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/vendor/feather-icons-web/feather.css">
</head>
<body>
<div class="container">
    <div class="row mt-3">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                <h1>Contact Form</h1>
                    <div class="">
                        <a href="registry_form_test.php" class="btn btn-outline-primary"><i class="feather-upload"></i> Upload</a>
                    </div>
                </div>
            <hr>
            </div>
        <div class="col-12">
            <div class="mt-3">
                <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th><i class="feather-mail text-dark rounded-circle p-2"></i> Email</th>
                        <th><i class="feather-phone-call text-dark p-2"></i>Phone No.</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach(contact() as $c){ ?>
                        <tr>
                            <td><?php echo $c['id'];?></td>
                            <td><img src="<?php echo $c['photo'];?>" alt="" style="width: 35px!important; height: 35px!important; object-fit: cover!important;" class="shadow rounded-circle"></td>
                            <td><?php echo $c['name'];?></td>
                            <td><a href="#" class="text-decoration-none text-dark"> <?php echo $c['email']?></a></td>
                            <td><a href="#" class="text-decoration-none text-dark"> <?php echo $c['phone']?></a></td>
                            <td><?php echo showTime($c['created_at']);?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendor/data_table/jquery.dataTables.min.js"></script>
<script src="assets/vendor/data_table/dataTables.bootstrap4.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/app.js"></script>
<script>
$(document).ready(function () {
$('table').DataTable()
});
</script>
</body>
</html>