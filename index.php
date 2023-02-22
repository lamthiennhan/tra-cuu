<?php
if (!isset($_COOKIE['user'])) {
    header("location:login.php");
}

if (isset($_GET['logout'])) {
    setcookie("user", "", time() - 99999);
    setcookie("pass", "", time() - 99999);
    header("location:index.php");
}

include "Connect/Connect.php";

//Khai báo biến
$listInfor = [];

//Xóa
if (isset($_GET['delete'])) {
    delete($_GET['ma']);
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php include 'header.php'; ?>

    <article id="content" class="container mb-5 mt-5">
        <div id="content-item1">
            <div class="row d-flex justify-content-center">
                <div id="title">Tìm kiếm</div>
            </div>
            <div class="row">
                <!-- search -->
                <div id="search" class="m-auto">
                    <div>
                        <form class="user" method="GET">
                            <div class="row d-flex mb-3">
                                <input id="search-input" class="form-inline mr-sm-2 w-75" type="search"
                                    placeholder="Search" aria-label="Search" name="search_ma">
                                <button class="btn btn-outline-success my-2 my-sm-0 w-25" type="submit">Search</button>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <input type="radio" id="html" name="radio" value="ma">
                                <label>Mã</label>
                                <input type="radio" id="css" name="radio" value="thongTin">
                                <label>Thông tin</label>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /search -->
            </div>
            <div class="row">
                <div id="list-tb d-flex flex-column" style="width: 100%;">
                    <?php if (isset($_GET['search_ma'])) {
                        if (isset($_GET['radio']) && $_GET['radio'] != "ma") {
                            for ($i = 0; $i <= count($listInfor) - 1; $i++) { ?>
                                <div class="table-boder rounded">
                                    <table class="table m-0">
                                        <thead class="table-active">
                                            <tr>
                                                <th class="border-bottom-0 w-25 text-center" scope="col">Trường thông tin</th>
                                                <th class="border-bottom-0 border-right-0 text-center" scope="col">Thông tin
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action="./add.php" method="get">
                                                <tr>
                                                    <th class="table-info" scope="row">Mã</th>
                                                    <td>
                                                        <?php echo $listInfor[$i][0] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table-info" scope="row">Tên</th>
                                                    <td>
                                                        <?php echo $listInfor[$i][1] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table-info" scope="row">Vị Trí</th>
                                                    <td>
                                                        <?php echo $listInfor[$i][2] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table-info" scope="row">Hình Vị Trí</th>
                                                    <td>
                                                        <div class="hinh"><img src="<?php echo $listInfor[$i][3] ?>" alt=""></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table-info" scope="row">Hình Sơ Đồ Tủ</th>
                                                    <td>
                                                        <div class="hinh"><img src="<?php echo $listInfor[$i][4] ?>" alt="">
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th class="table-info" scope="row">Nguồn Vào</th>
                                                    <td>
                                                        <?php echo $listInfor[$i][5] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table-info" scope="row">Cấp Nguồn Cho</th>
                                                    <td>
                                                        <?php echo $listInfor[$i][6] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table-info" scope="row">Đường dẫn</th>
                                                    <td>
                                                        <?php echo $listInfor[$i][7] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table-info" scope="row">Ngày</th>
                                                    <td>
                                                        <?php echo $listInfor[$i][8] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table-info" scope="row">Tài Khoản</th>
                                                    <td>
                                                        <?php echo $listInfor[$i][9] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table-info" scope="row">Ghi Chú</th>
                                                    <td>
                                                        <?php echo $listInfor[$i][10] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table-info" scope="row">Chức năng</th>
                                                    <td class="text-center">
                                                        <div id="group-function">
                                                            <a href="reEdit.php?ma=<?php echo $listInfor[$i][0] ?>"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <a href="index.php?ma=<?php echo $listInfor[$i][0] ?>"><i
                                                                    class="fas fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </form>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                            }
                        } else {
                            if ($listInfor) { ?>
                                <div class="table-boder rounded">
                                    <table class="table m-0">
                                        <thead class="table-active">
                                            <tr>
                                                <th class="border-bottom-0 w-25 text-center" scope="col">Trường thông tin</th>
                                                <th class="border-bottom-0 border-right-0 text-center" scope="col">Thông tin
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action="./add.php" method="get">
                                                <tr>
                                                    <th class="table-info" scope="row">Mã</th>
                                                    <td>
                                                        <?php echo $listInfor[0] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table-info" scope="row">Tên</th>
                                                    <td>
                                                        <?php echo $listInfor[1] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table-info" scope="row">Vị Trí</th>
                                                    <td>
                                                        <?php echo $listInfor[2] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table-info" scope="row">Hình Vị Trí</th>
                                                    <td>
                                                        <div class="hinh"><img src="<?php echo $listInfor[3] ?>" alt=""></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table-info" scope="row">Hình Sơ Đồ Tủ</th>
                                                    <td>
                                                        <div class="hinh"><img src="<?php echo $listInfor[4] ?>" alt=""></div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th class="table-info" scope="row">Nguồn Vào</th>
                                                    <td>
                                                        <?php echo $listInfor[5] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table-info" scope="row">Cấp Nguồn Cho</th>
                                                    <td>
                                                        <?php echo $listInfor[6] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table-info" scope="row">Đường dẫn</th>
                                                    <td>
                                                        <?php echo $listInfor[7] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table-info" scope="row">Ngày</th>
                                                    <td>
                                                        <?php echo $listInfor[8] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table-info" scope="row">Tài Khoản</th>
                                                    <td>
                                                        <?php echo $listInfor[9] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table-info" scope="row">Ghi Chú</th>
                                                    <td>
                                                        <?php echo $listInfor[10] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="table-info" scope="row">Chức năng</th>
                                                    <td class="text-center">
                                                        <div id="group-function">
                                                            <a href="reEdit.php?ma=<?php echo $listInfor[0] ?>"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <a href="index.php?ma=<?php echo $listInfor[0] ?>"><i
                                                                    class="fas fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </form>
                                        </tbody>
                                    </table>
                                </div>
                            <?php }
                        }
                    } ?>
                </div>
            </div>
        </div>
    </article>
</body>

</html>