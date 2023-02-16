<?php
include "Connect/Connect.php";
$conn = Connect();
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
                <div id="title">Thêm</div>
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
                                <form action="./add.php" method="get">
                                    <tr>
                                        <th class="table-info" scope="row">Mã</th>
                                        <td>
                                            <input type="text" name="ma" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info" scope="row">Tên</th>
                                        <td>
                                            <input type="text" name="ten" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info" scope="row">Vị Trí</th>
                                        <td>
                                            <input type="text" name="viTri" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info" scope="row">Hình Vị Trí</th>
                                        <td>
                                            <!-- <form method="GET" action="upload.php" enctype="multipart/form-data">
                                                                <p><img src="<?php echo $listInfor[$i][3] ?>" alt=""></p>
                                                                <div id="wrapper"><input type="file" name="fileToUpload" value="" />
                                                                    <input type="submit" name="submit" value="Upload " />
                                                                </div>
                                                            </form> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info" scope="row">Hình Sơ Đồ Tủ</th>
                                        <td>
                                            <!-- <form method="GET" action="upload.php" enctype="multipart/form-data">
                                                                <p><img src="<?php echo $listInfor[$i][4] ?>" alt=""></p>
                                                                <div id="wrapper"><input type="file" name="fileToUpload" value="" />
                                                                    <input type="submit" name="submit" value="Upload " />
                                                                </div>
                                                            </form> -->
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="table-info" scope="row">Nguồn Vào</th>
                                        <td>
                                            <input type="text" name="vao" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info" scope="row">Cấp Nguồn Cho</th>
                                        <td>
                                            <input type="text" name="ra" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info" scope="row">Đường dẫn</th>
                                        <td>
                                            <input type="text" name="danDuong" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info" scope="row">Ngày</th>
                                        <td>
                                            <input type="text" name="ngay" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info" scope="row">Tài Khoản</th>
                                        <td>
                                            <input type="text" name="taiKhoan" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info" scope="row">Ghi Chú</th>
                                        <td>
                                            <input type="text" name="ghiChu" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info" scope="row">Chức năng</th>
                                        <td class="text-center">
                                            <div id="group-function">
                                                <input type="submit" value="Save">
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