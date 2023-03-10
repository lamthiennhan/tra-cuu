<?php
/* Địa chỉ SQL Server */
function Connect()
{
    $serverName = "192.168.2.145,1433";
    /* Tài khoản kết nối */
    $uid = 'suoitien';
    $pwd = 'suoitien@@123';

    /* Cấu hình kết nối */
    $connectionInfo = ["UID" => $uid, "PWD" => $pwd, "Database" => "KTD_TRACUU", "CharacterSet" => "UTF-8"];

    /* Thực hiện kết nối */
    $conn = sqlsrv_connect($serverName, $connectionInfo);

    return $conn;
}

// Search
function searchMa($ma)
{
    $conn = Connect();
    $sql = "SELECT *,CONVERT(varchar, Ngay, 103) Ngay,(SELECT NguoiDung FROM tbl_NguoiDung Where MaNV=TaiKhoan) TaiKhoan FROM tbl_ThongTin
    WHERE Ma = '$ma'";

    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo "Lỗi truy vấn.</br>";
        die(print_r(sqlsrv_errors(), true));
    }

    $arr = [];

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

        $arr = [$ma, $ten, $viTri, $hinhViTri, $hinhSoDo, $vao, $ra, $danDuong, $ngay, $taiKhoan, $ghiChu];
    }

    sqlsrv_free_stmt($stmt); // Giải phóng tài nguyên câu truy vấn
    sqlsrv_close($conn);

    return $arr;
}

function searchInfor($infor)
{
    $conn = Connect();

    $infor = "N'%" . $infor . "%'";

    $sql = "SELECT *,CONVERT(varchar, Ngay, 103) Ngay,(SELECT NguoiDung FROM tbl_NguoiDung Where MaNV=TaiKhoan) TaiKhoan FROM tbl_ThongTin
    WHERE Ma LIKE $infor OR Ten LIKE $infor OR Vitri LIKE $infor OR Vao LIKE $infor OR Ra LIKE $infor OR DanDuong LIKE $infor OR GhiChu
    LIKE $infor OR Ngay LIKE $infor OR TaiKhoan LIKE $infor";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo "Lỗi truy vấn.</br>";
        die(print_r(sqlsrv_errors(), true));
    }

    $arr = [];

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

        array_push($arr, [$ma, $ten, $viTri, $hinhViTri, $hinhSoDo, $vao, $ra, $danDuong, $ngay, $taiKhoan, $ghiChu]);
    }

    sqlsrv_free_stmt($stmt); // Giải phóng tài nguyên câu truy vấn
    sqlsrv_close($conn);

    return $arr;
}

// Add, edit, delete
function add($ma, $ten, $viTri, $hinhViTri, $hinhSoDo, $vao, $ra, $danDuong, $ghiChu, $ngay, $taiKhoan)
{
    $conn = Connect();

    $ma = "N'" . $ma . "'";
    $ten = "N'" . $ten . "'";
    $viTri = "N'" . $viTri . "'";
    $vao = "N'" . $vao . "'";
    $ra = "N'" . $ra . "'";
    $danDuong = "N'" . $danDuong . "'";
    $ghiChu = "N'" . $ghiChu . "'";
    $taiKhoan = "N'" . $taiKhoan . "'";

    $sql = "INSERT INTO tbl_ThongTin (Ma,Ten,Vitri,Hinh_ViTri,Hinh_SoDoTu,Vao,Ra,DanDuong,GhiChu,Ngay,TaiKhoan)
    VALUES ($ma,$ten,$viTri,'$hinhViTri','$hinhSoDo',$vao,$ra,$danDuong,$ghiChu,'$ngay',$taiKhoan)";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo "Lỗi truy vấn.</br>";
        die(print_r(sqlsrv_errors(), true));
    }

    sqlsrv_free_stmt($stmt); // Giải phóng tài nguyên câu truy vấn
    sqlsrv_close($conn);
}

function edit($ma, $ten, $viTri, $vao, $ra, $danDuong, $ghiChu, $ngay, $taiKhoan)
{
    $conn = Connect();

    $ma = "N'" . $ma . "'";
    $ten = "N'" . $ten . "'";
    $viTri = "N'" . $viTri . "'";
    $vao = "N'" . $vao . "'";
    $ra = "N'" . $ra . "'";
    $danDuong = "N'" . $danDuong . "'";
    $ghiChu = "N'" . $ghiChu . "'";
    $taiKhoan = "N'" . $taiKhoan . "'";

    $sql = "UPDATE tbl_ThongTin SET Ma=$ma,Ten=$ten,Vitri=$viTri,Vao=$vao,Ra=$ra,DanDuong=$danDuong,GhiChu=$ghiChu,Ngay='$ngay',TaiKhoan=$taiKhoan WHERE Ma=$ma";

    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo "Lỗi truy vấn.</br>";
        die(print_r(sqlsrv_errors(), true));
    }

    sqlsrv_free_stmt($stmt); // Giải phóng tài nguyên câu truy vấn
    sqlsrv_close($conn);
}

function delete($ma)
{
    $conn = Connect();
    $sql = "DELETE FROM tbl_ThongTin WHERE Ma='$ma'";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo "Lỗi truy vấn.</br>";
        die(print_r(sqlsrv_errors(), true));
    }

    sqlsrv_free_stmt($stmt); // Giải phóng tài nguyên câu truy vấn
    sqlsrv_close($conn);

}


// Update hinh
function Up_Hinh_Vitri($ma, $hinh)
{
    $conn = Connect();

    $sql = "UPDATE tbl_ThongTin SET Hinh_Vitri='$hinh' WHERE Ma='$ma'";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo "Lỗi truy vấn.</br>";
        die(print_r(sqlsrv_errors(), true));
    }

    sqlsrv_free_stmt($stmt); // Giải phóng tài nguyên câu truy vấn
    sqlsrv_close($conn);
}

function Up_Hinh_Sodo($ma, $hinh)
{
    $conn = Connect();

    $sql = "UPDATE tbl_ThongTin SET Hinh_SoDoTu='$hinh' WHERE Ma='$ma'";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo "Lỗi truy vấn.</br>";
        die(print_r(sqlsrv_errors(), true));
    }

    sqlsrv_free_stmt($stmt); // Giải phóng tài nguyên câu truy vấn
    sqlsrv_close($conn);
}


// Xuất mã NV theo tên
function ma_theo_tenNV($tenNV)
{
    $conn = Connect();
    $sql = "SELECT MaNV,NguoiDung FROM tbl_NguoiDung";

    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo "Lỗi truy vấn.</br>";
        die(print_r(sqlsrv_errors(), true));
    }

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        if ($tenNV === $row["NguoiDung"]) {
            $ma = html_entity_decode($row["MaNV"]);
        }
    }

    sqlsrv_free_stmt($stmt); // Giải phóng tài nguyên câu truy vấn
    sqlsrv_close($conn);

    return $ma;
}

// Xuất tên NV theo mã
function tenNV_theo_ma($ma)
{
    $conn = Connect();
    $sql = "SELECT MaNV,NguoiDung FROM [tbl_NguoiDung]";

    $stmt = sqlsrv_query($conn, $sql);

    $tenNV = "";
    if ($stmt === false) {
        echo "Lỗi truy vấn.</br>";
        die(print_r(sqlsrv_errors(), true));
    }

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        if ($ma === html_entity_decode($row["MaNV"])) {
            $tenNV = $row["NguoiDung"];
        }
    }

    sqlsrv_free_stmt($stmt); // Giải phóng tài nguyên câu truy vấn
    sqlsrv_close($conn);

    return $tenNV;
}


// Kiểm tra đang nhập
function checkLogin($user, $pass)
{
    $conn = Connect();
    $sql = "SELECT * FROM tbl_NguoiDung";

    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo "Lỗi truy vấn.</br>";
        die(print_r(sqlsrv_errors(), true));
    }

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        if ($pass == $row["MatKhau"] && $user == html_entity_decode($row["MaNV"])) {
            return true;
        }
    }

    sqlsrv_free_stmt($stmt); // Giải phóng tài nguyên câu truy vấn
    sqlsrv_close($conn);

    return false;
}

// Check trùng mã
function checTrungkMa($ma)
{
    $conn = Connect();
    $sql = "SELECT Ma FROM tbl_ThongTin";

    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo "Lỗi truy vấn.</br>";
        die(print_r(sqlsrv_errors(), true));
    }

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        if ($ma == html_entity_decode($row["Ma"])) {
            return true;
        }
    }

    sqlsrv_free_stmt($stmt); // Giải phóng tài nguyên câu truy vấn
    sqlsrv_close($conn);

    return false;
}
?>