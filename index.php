<?php
include "Connect/Connect.php";

if (!isset($_COOKIE['user'])) {
    header("location:login.php");
}

if (isset($_GET['logout'])) {
    setcookie("user", $_POST['user'], time() - 9999999);
    header("location:index.php");
}

//Khai báo biến
$listInfor = [];

//Xóa
if (isset($_GET['delete-ma'])) {
    delete($_GET['delete-ma']);
}

//Tìm theo mã
if (isset($_GET['search_ma'])) {
    if (isset($_GET['radio']) && $_GET['radio'] != "ma") {
        $maGET = $_GET['search_ma'];
        $listInfor = searchInfor($maGET);
    } else {
        $maGET = $_GET['search_ma'];
        $listInfor = searchMa($maGET);
    }
}
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
    <link rel="stylesheet" href="css/img.css">
    <link rel="stylesheet" href="css/btn-top.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php include 'header.php'; ?>

    <article id="content" class="container-fuild">
        <div class="row justify-content-center">
            <div id="title">Tìm kiếm</div>
        </div>
        <div class="row">
            <!-- search -->
            <?php include 'search.php'; ?>
            <!-- /search -->
        </div>
        <div class="row justify-content-center">
            <div id="list-tb">
                <?php if (isset($_GET['search_ma'])) {
                    if (isset($_GET['radio']) && $_GET['radio'] != "ma") {
                        for ($i = 0; $i <= count($listInfor) - 1; $i++) { ?>
                            <table class="table table-boder">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0 w-25 text-center" scope="col">Trường thông tin</th>
                                        <th class="border-bottom-0 border-right-0 text-center" scope="col">Thông tin
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="./add.php" method="get">
                                        <tr>
                                            <th scope="row">Mã</th>
                                            <td>
                                                <?php echo $listInfor[$i][0] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tên</th>
                                            <td>
                                                <?php echo $listInfor[$i][1] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Vị Trí</th>
                                            <td>
                                                <?php echo $listInfor[$i][2] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Hình Vị Trí</th>
                                            <td>
                                                <img class="h-img myImg" src="<?php echo $listInfor[$i][3] ?>" alt="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Hình Sơ Đồ Tủ</th>
                                            <td>
                                                <img class="h-img myImg" src="<?php echo $listInfor[$i][4] ?>" alt="">
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Nguồn Vào</th>
                                            <td>
                                                <?php echo $listInfor[$i][5] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Cấp Nguồn Cho</th>
                                            <td>
                                                <?php echo $listInfor[$i][6] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Đường dẫn</th>
                                            <td>
                                                <?php echo $listInfor[$i][7] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Ngày</th>
                                            <td>
                                                <?php echo $listInfor[$i][8] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tài Khoản</th>
                                            <td>
                                                <?php echo $listInfor[$i][9] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Ghi Chú</th>
                                            <td>
                                                <?php echo $listInfor[$i][10] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Chức năng</th>
                                            <td class="text-center">
                                                <div id="group-function">
                                                    <a href="reEdit.php?ma=<?php echo $listInfor[$i][0] ?>"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="index.php?delete-ma=<?php echo $listInfor[$i][0] ?>"><i
                                                            class="fas fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </form>
                                </tbody>
                            </table>
                            <?php
                        }
                    } else {
                        if ($listInfor) { ?>
                            <table class="table table-boder">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0 w-25 text-center" scope="col">Trường thông tin</th>
                                        <th class="border-bottom-0 border-right-0 text-center" scope="col">Thông tin
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="./add.php" method="get">
                                        <tr>
                                            <th scope="row">Mã</th>
                                            <td>
                                                <?php echo $listInfor[0] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tên</th>
                                            <td>
                                                <?php echo $listInfor[1] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Vị Trí</th>
                                            <td>
                                                <?php echo $listInfor[2] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Hình Vị Trí</th>
                                            <td>
                                                <img class="h-img myImg" src="<?php echo $listInfor[3] ?>" alt="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Hình Sơ Đồ Tủ</th>
                                            <td>
                                                <img class="h-img myImg" src="<?php echo $listInfor[4] ?>" alt="">
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Nguồn Vào</th>
                                            <td>
                                                <?php echo $listInfor[5] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Cấp Nguồn Cho</th>
                                            <td>
                                                <?php echo $listInfor[6] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Đường dẫn</th>
                                            <td>
                                                <?php echo $listInfor[7] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Ngày</th>
                                            <td>
                                                <?php echo $listInfor[8] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tài Khoản</th>
                                            <td>
                                                <?php echo $listInfor[9] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Ghi Chú</th>
                                            <td>
                                                <?php echo $listInfor[10] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Chức năng</th>
                                            <td class="text-center">
                                                <div id="group-function">
                                                    <a href="reEdit.php?ma=<?php echo $listInfor[0] ?>"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="index.php?delete-ma=<?php echo $listInfor[0] ?>"><i
                                                            class="fas fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </form>
                                </tbody>
                            </table>
                        <?php }
                    }
                } ?>
    </article>

    <div id="myModal" class="modal justify-content-center align-items-center" style="height: 100vh;">
        <img class="modal-content" id="img" style="max-height: 100%; width: auto;">
    </div>

    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>

    <footer class="d-flex justify-content-center align-items-center">
        Thông tin liên hệ: Phòng IT
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="js/img.js"></script>
    <script src="js/btn-ontop.js"></script>
</body>

</html>