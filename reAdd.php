<?php
include "Connect/Connect.php";
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php include 'header.php'; ?>

    <article id="content" class="container-fuild">
        <div class="row justify-content-center">
            <div id="title">Thêm</div>
        </div>
        <div class="row justify-content-center">
            <div id="list-tb">
                <table class="table table-boder">
                    <thead>
                        <tr>
                            <th class="border-bottom-0 w-25 text-center" scope="col">Trường thông tin</th>
                            <th class="border-bottom-0 border-right-0 text-center" scope="col">Thông tin
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <form method="POST" action="add.php" enctype="multipart/form-data">
                            <tr>
                                <th scope="row">Mã</th>
                                <td>
                                    <input type="text" name="ma" id="ma" value="" required>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Tên</th>
                                <td>
                                    <input type="text" name="ten" id="ten" value="">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Vị Trí</th>
                                <td>
                                    <input type="text" name="viTri" id="viTri" value="">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Hình Vị Trí</th>
                                <td>
                                    <img id="blah" class="h-img myImg" src="" alt="">
                                    <input id="imgInp" type="file" name="fileViTri" value="" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Hình Sơ Đồ</th>
                                <td>
                                    <img id="blah1" class="h-img myImg" src="" alt="">
                                    <input id="imgInp1" type="file" name="fileSoDo" value="" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Nguồn Vào</th>
                                <td>
                                    <input type="text" name="vao" id="vao" value="">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Cấp Nguồn Cho</th>
                                <td>
                                    <input type="text" name="ra" id="ra" value="">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Đường dẫn</th>
                                <td>
                                    <input type="text" name="danDuong" id="danDuong" value="">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Ghi Chú</th>
                                <td>
                                    <input type="text" name="ghiChu" id="ghiChu" value="">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Chức năng</th>
                                <td class="text-center">
                                    <div id="group-function">
                                        <input type="submit" name="submit" value="Thêm" />
                                    </div>
                                </td>
                                </td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </article>

    <div id="myModal" class="modal justify-content-center align-items-center" style="height: 100vh;">
        <img class="modal-content" id="img" style="max-height: 100%; width: auto;">
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="js/img.js"></script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });

        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah1').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp1").change(function () {
            readURL1(this);
        });

    </script>
</body>

</html>