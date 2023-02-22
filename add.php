<?php
include "Connect/Connect.php";

$time = time();
$datetimeinfo = getdate($time);

$ngay = $datetimeinfo['mon'] . "/" . $datetimeinfo['mday'] . "/" . $datetimeinfo['year'];

if (isset($_POST['ma'])) {
    $ma = $_POST['ma'];
    $ten = $_POST['ten'];
    $viTri = $_POST['viTri'];
    $vao = $_POST['vao'];
    $ra = $_POST['ra'];
    $danDuong = $_POST['danDuong'];
    $ghiChu = $_POST['ghiChu'];

    $hinhViTri = "";
    $hinhSoDo = "";

    $taiKhoan = $_COOKIE['user'];
}

// Upload file
if (isset($_FILES["fileViTri"]) && $_FILES["fileViTri"]["name"] != null) {
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileViTri"]["name"]);

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($target_file != "images/") {
        $hinhViTri = $target_file;
    }

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileViTri"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileViTri"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileViTri"]["name"])) . " has been uploaded.";
            echo "==============================.'$ma'";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

if (isset($_FILES["fileSoDo"]) && $_FILES["fileSoDo"]["name"] != null) {
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileSoDo"]["name"]);

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($target_file != "images/") {
        $hinhSoDo = $target_file;
    }

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileSoDo"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileSoDo"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileSoDo"]["name"])) . " has been uploaded.";
            echo "==============================.'$ma'";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

if (isset($_POST['ma'])) {
    add($ma, $ten, $viTri, $hinhViTri, $hinhSoDo, $vao, $ra, $danDuong, $ghiChu, $ngay, $taiKhoan);
}

header("location:reAdd.php");
?>