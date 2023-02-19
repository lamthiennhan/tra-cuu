<?php
include "Connect/Connect.php";
$conn = Connect();

//Khai báo biến
$maGET = "";
$maPOST = "";

$ma = "";
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

//Sửa
if (isset($_GET['ma'])) {
    $maGET = $_GET['ma'];
}

//Truy vấn
$sqlSearch = "SELECT *,CONVERT(varchar, Ngay, 103) Ngay,(SELECT NguoiDung FROM tbl_NguoiDung Where MaNV=TaiKhoan) TaiKhoan,GhiChu FROM tbl_ThongTin WHERE Ma = '$maGET'";

//Thức hiện câu truy vấn
$doSearch = sqlsrv_query($conn, $sqlSearch);

while ($row = sqlsrv_fetch_array($doSearch, SQLSRV_FETCH_ASSOC)) {
    $ma = html_entity_decode($row["Ma"]);
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

if (isset($_POST['edit-ma'])) {
    $ma = $_POST['edit-ma'];
    $ten = $_POST['ten'];
    $viTri = $_POST['viTri'];
    $vao = $_POST['vao'];
    $ra = $_POST['ra'];
    $danDuong = $_POST['danDuong'];
    $ngay = '';
    $taiKhoan = $_POST['taiKhoan'];
    $ghiChu = $_POST['ghiChu'];

    edit($ma, $ten, $viTri, $vao, $ra, $danDuong, $ghiChu, $ngay, '17303');
}

sqlsrv_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Wed Tra Cuu</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/fontawesome.min.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="css/plugins/timeline/timeline.css" rel="stylesheet">

    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php include 'header.php'; ?>

    <article id="content" class="container mb-5 mt-5">
        <div id="content-item1">
            <div class="row d-flex justify-content-center">
                <div id="title">Sửa</div>
            </div>
            <div class="row">
                <div id="list-tb d-flex flex-column" style="width: 100%;">
                    <div class="table-boder rounded">
                        <table class="table m-0">
                            <thead class="table-active">
                                <tr>
                                    <th class="border-bottom-0" scope="col">Trường thông tin</th>
                                    <th class="border-bottom-0 border-right-0" scope="col">Thông tin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form method="POST" action="upload.php" enctype="multipart/form-data">
                                    <tr>
                                        <th class="table-info" scope="row">Mã</th>
                                        <td>
                                            <input type="text" name="edit-ma" id="edit-ma" value="<?php echo $ma ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info" scope="row">Tên</th>
                                        <td>
                                            <input type="text" name="ten" id="ten" value="<?php echo $ten ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info" scope="row">Vị Trí</th>
                                        <td>
                                            <input type="text" name="viTri" id="viTri" value="<?php echo $viTri ?>">
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>
                                            <p face="Times New Roman">Hình Vị Trí</p>
                                        </td>

                                        <td>
                                            <p face="Times New Roman"><img src="<?php echo $target_file ?>" /></p>
                                            <div id="wrapper"><input type="file" name="fileViTri" value="" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p face="Times New Roman">Hình Vị Trí</p>
                                        </td>
                                        <td>
                                            <!-- <p face="Times New Roman"><img src="'.$f4.'" /></p>
                                            <div id="wrapper"><input type="file" name="fileViTri" value="" />
                                                <input type="submit" name="submit" value="Upload " />
                                            </div> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info" scope="row">Nguồn Vào</th>
                                        <td>
                                            <input type="text" name="vao" id="vao" value="<?php echo $vao ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info" scope="row">Cấp Nguồn Cho</th>
                                        <td>
                                            <input type="text" name="ra" id="ra" value="<?php echo $ra ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info" scope="row">Đường dẫn</th>
                                        <td>
                                            <input type="text" name="danDuong" id="danDuong"
                                                value="<?php echo $danDuong ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info" scope="row">Ngày</th>
                                        <td>
                                            <input type="text" name="ngay" id="ngay" value="<?php echo $ngay ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info" scope="row">Tài Khoản</th>
                                        <td>
                                            <input type="text" name="taiKhoan" id="taiKhoan"
                                                value="<?php echo $taiKhoan ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info" scope="row">Ghi Chú</th>
                                        <td>
                                            <input type="text" name="ghiChu" id="ghiChu" value="<?php echo $ghiChu ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info" scope="row">Chức năng</th>
                                        <td class="text-center">
                                            <div id="group-function">
                                                <input type="submit" name="submit" value="Upload " />
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </article>
</body>

</html>