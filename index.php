<?php
include "Connect/Connect.php";
$conn = Connect();

//Khai báo biến
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

//Câu truy vấn
$sqlGetAll = "SELECT *,CONVERT(varchar, Ngay, 103) Ngay FROM tbl_ThongTin";

// sqlsrv_free_stmt($stmt);  // Giải phóng tài nguyên câu truy vấn
// sqlsrv_close($conn);      // Giải phóng, ngắt kết nối SQL Server
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

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/index.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
    <article id="header">
        <div id="wrapper">
            <nav id="navbar" class="navbar navbar-default d-flex justify-content-start w-100 p-0 rounded-0"
                role="navigation" style="margin-bottom: 0">
                <div id="nav-left" class="h-100 w-50">
                    <a id="logo-a" class="rounded-circle navbar-brand h-100 rounded-circle" href="index.html">
                        <img id="logo-img" class="h-100" src="images/logo-img.png" alt=""></a>
                </div>
                <div id="nav-right" class="d-flex flex-column align-items-end">
                    <div class="row">

                        <div id="card-user.">
                            <!-- user -->
                            <i class="fas fa-user-edit p-3"></i>
                        </div>
                    </div>
                </div>
                <!-- /.navbar-header -->
                <div class="navbar-default navbar-static-side" role="navigation">
                    <div class="sidebar-collapse">
                        <ul class="nav" id="side-menu"></ul>
                        <!-- /#side-menu -->
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
    </article>


    <article id="content" class="container mb-5 mt-5">
        <div id="content-item1">
            <div class="row">
                <!-- search -->
                <div id="search" class="w-50 m-auto">
                    <div>
                        <form class="user" method="POST">
                            <div class="row d-flex mb-3">
                                <input id="search-input" class="form-inline mr-sm-2 w-75" type="search"
                                    placeholder="Search" aria-label="Search" name="Ma">
                                <button class="btn btn-outline-success my-2 my-sm-0 w-25" type="submit">Search</button>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <input type="radio" id="html" name="fav_language" value="HTML">
                                <label for="html">Mã</label>
                                <input type="radio" id="css" name="fav_language" value="CSS">
                                <label for="css">Thông tin</label>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /search -->
            </div>
            <div class="row">
                <div id="list-tb d-flex flex-column" style="width: 100%;">
                    <?php
                    //Tìm theo mã
                    if (isset($_POST['Ma'])) {
                        $maPOST = $_POST['Ma'];

                        //Truy vấn
                        $tsql = "SELECT *,CONVERT(varchar, Ngay, 103) Ngay,(SELECT NguoiDung FROM tbl_NguoiDung Where MaNV=TaiKhoan) TaiKhoan,GhiChu FROM tbl_ThongTin WHERE Ma = '$maPOST'";

                        //Thức hiện câu truy vấn
                        $stmt = sqlsrv_query($conn, $tsql);

                        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
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
                            ?>
                            <div class="table-boder rounded">
                                <table class="table m-0">
                                    <thead class="table-active">
                                        <tr>
                                            <th class="border-bottom-0" scope="col">Trường thông tin</th>
                                            <th class="border-bottom-0 border-right-0" scope="col">Thông tin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="table-info" scope="row">Mã Tủ</th>
                                            <td>
                                                <?php echo $ma ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table-info" scope="row">Tên</th>
                                            <td>
                                                <?php echo $ten ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table-info" scope="row">Vị Trí</th>
                                            <td>
                                                <?php echo $viTri ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table-info" scope="row">Hình Vị Trí</th>
                                            <td>
                                                <form method="POST" action="upload.php" enctype="multipart/form-data">
                                                    <p><img src="<?php echo $hinhViTri ?>" alt=""></p>
                                                    <div id="wrapper"><input type="file" name="fileToUpload" value="" />
                                                        <input type="submit" name="submit" value="Upload " />
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table-info" scope="row">Hình Sơ Đồ Tủ</th>
                                            <td>
                                                <form method="POST" action="upload.php" enctype="multipart/form-data">
                                                    <p><img src="<?php echo $hinhSoDo ?>" alt=""></p>
                                                    <div id="wrapper"><input type="file" name="fileToUpload" value="" />
                                                        <input type="submit" name="submit" value="Upload " />
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table-info" scope="row">Nguồn Vào</th>
                                            <td>
                                                <?php echo $vao ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table-info" scope="row">Cấp Nguồn Cho</th>
                                            <td>
                                                <?php echo $ra ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table-info" scope="row">Đường dẫn</th>
                                            <td>
                                                <?php echo $danDuong ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table-info" scope="row">Ngày</th>
                                            <td>
                                                <?php echo $ngay ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table-info" scope="row">Tài Khoản</th>
                                            <td>
                                                <?php echo $taiKhoan ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table-info" scope="row">Ghi Chú</th>
                                            <td>
                                                <?php echo $ghiChu ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table-info" scope="row">Chức năng</th>
                                            <td class="text-center">
                                                <div id="group-function">
                                                    <i id="add" class="fas fa-plus-square"></i>
                                                    <i id="edit" class="fas fa-edit"></i>
                                                    <i id="delete" class="fas fa-trash"></i>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php
                        }
                    }
                    sqlsrv_free_stmt($stmt);
                    sqlsrv_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </article>

    <script>
        $("#delete").click(function () {
            $d = delete ($_POST['Ma']);
        });
    </script>
</body>

</html>