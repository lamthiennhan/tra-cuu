<article id="header" class="fixed-top" style="width: 100vw; z-index: unset;">
    <nav class="navbar navbar-expand-lg navbar-light rounded-0 m-0">
        <div id="list-link" class="d-flex align-items-center">
            <a id="logo-link" href="index.php"><img id="logo-img" src="images/logo-img.png" alt=""></a>
            <a class="nav-link 	d-none d-lg-block" href="reAdd.php">TRANG CHỦ</a>
            <a class="nav-link" href="reAdd.php">THÊM</a>
            <a class="nav-link" href="?logout=true">ĐĂNG XUẤT</a>
        </div>
        <div id="user" class="ml-auto pr-5">
            <?php echo tenNV_theo_ma($_COOKIE['user']) ?>
        </div>
    </nav>
</article>