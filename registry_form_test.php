<?php

session_start();

require_once "core/base.php";
require_once "core/functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class=" col-12 col-md-4">
                <div class="my-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="font-weight-bold">Register Form</h4>
                            <hr>
                            <?php
                                if(isset($_POST['reg'])){
                                    register();
                                }
                            ?>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name" class="font-weight-bold">Your Name</label>
                                    <input type="text" id="name" name="name" class="form-control" value="<?php old('name') ?>">
                                    <small class="text-danger font-weight-bold"><?php getError('name') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="font-weight-bold">Email</label>
                                    <input type="text" id="email" name="email" class="form-control" value="<?php old('email') ?>">
                                    <small class="text-danger font-weight-bold"><?php getError('email') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="font-weight-bold">Ph. Number</label>
                                    <input type="number" id="phone" name="phone" class="form-control" value="<?php old('phone') ?>">
                                    <small class="text-danger font-weight-bold"><?php getError('phone') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="font-weight-bold">Address</label>
                                    <textarea type="text" id="address" name="address" class="form-control"><?php old('address') ?></textarea>
                                    <small class="text-danger font-weight-bold"><?php getError('address') ?></small>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Gender</label>
                                    <div class="border border-faded rounded p-2">
                                        <?php foreach($gendersArr as $g){ ?>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="gender<?php echo $g ?>" name="gender" class="custom-control-input" <?php echo (old_get("gender")==$g ? 'checked':"") ?> value="<?php echo $g ?>">
                                                <label class="custom-control-label text-capitalize" for="gender<?php echo $g ?>"><?php echo $g ?></label>
                                            </div>
                                        <?php } ?>
                                        <br>
                                        <small class="text-danger font-weight-bold"><?php getError('gender') ?></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Skills</label>
                                    <div class="border border-faded rounded p-2">
                                        <?php foreach($skillsArr as $s){ ?>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" id="skills<?php echo $s ?>" name="skill[]" class="custom-control-input" 
                                                <?php 
                                                    if(old_get("skill")){
                                                        if(in_array($s, old_get("skill"))){
                                                            echo "checked";
                                                        }
                                                    }
                                                ?> 
                                                value="<?php echo $s ?>">
                                                <label class="custom-control-label text-capitalize" for="skills<?php echo $s ?>"><?php echo $s ?></label>
                                            </div>
                                        <?php } ?>
                                        <br>
                                        <small class="text-danger font-weight-bold"><?php getError('skill') ?></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="upload" class="font-weight-bold">Upload Profile Pic</label>
                                    <div class="border border-faded rounded p-2">
                                        <input type="file" name="upload" accept="image/png, image/jpeg">
                                        <small class="text-danger font-weight-bold"><?php getError('profile') ?></small>
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center w-25" style="height: 25px;">
                                        <input type="checkbox" class="form-control" style="height: 15px;" checked required>
                                        <span>Agree</span>
                                    </div>
                                    <button name="reg" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php clearError() ?>
</body>
</html>