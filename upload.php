<?php
include "Connect/Connect.php";
$conn = Connect();

$ma = $_POST['edit-ma'];
$ten = "";
$viTri = "";
$hinhViTri = "";
$hinhSoDo = "";
$vao = "";
$ra = "";
$danDuong = "";
$ngay = "";
$taiKhoan = "";
$ghiChu = "";

$sqlSearch = "SELECT *,CONVERT(varchar, Ngay, 103) Ngay,(SELECT NguoiDung FROM tbl_NguoiDung Where MaNV=TaiKhoan) TaiKhoan,GhiChu FROM tbl_ThongTin WHERE Ma = '$ma'";

//Thức hiện câu truy vấn
$doSearch = sqlsrv_query($conn, $sqlSearch);

while ($row = sqlsrv_fetch_array($doSearch, SQLSRV_FETCH_ASSOC)) {
  $ten = $row["Ten"];
  $viTri = $row["Vitri"];
  $hinhViTri = $row["Hinh_ViTri"];
  $hinhSoDo = $row["Hinh_SoDoTu"];
  $vao = $row["Vao"];
  $ra = $row["Ra"];
  $danDuong = $row["DanDuong"];
  $ngay = $row["Ngay"];
  $taiKhoan = $row["TaiKhoan"];
  $ghiChu = $row["GhiChu"];
}
sqlsrv_close($conn);

//Upload file
if (isset($_FILES["fileViTri"])) {
  $target_dir = "images/";
  $target_file = $target_dir . basename($_FILES["fileViTri"]["name"]);

  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  include "./Connect/Connect.php";
  echo "==============================:'$target_file' :============";
  if ($target_file != "images/") {
    $a = Update_Hinh_Vitri($ma, $target_file);
  } else {
    header("location:edit.php?ma=$ma&ten=$ten&viTri=$viTri&hinhViTri=$hinhViTri&hinhSoDo=$hinhSoDo&vao=$vao&ra=$ra&danDuong=$danDuong&ngay=$ngay&taiKhoan=$taiKhoan&ghiChu=$ghiChu");
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
      echo "==============================.'$G'";
      header("location:edit.php?ma=$G");
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}
?>