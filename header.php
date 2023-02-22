<article id="header">
    <div id="wrapper">
        <nav id="navbar" class="navbar navbar-default d-flex justify-content-start w-100 p-0 rounded-0"
            role="navigation" style="margin-bottom: 0">
            <div id="nav-left">
                <a id="logo-a" class="rounded-circle navbar-brand h-100 rounded-circle" href="index.php">
                    <img id="logo-img" class="h-100" src="images/logo-img.png" alt=""></a>
            </div>
            <div id="nav-right" class="d-flex flex-column align-items-end">
                <div class="row">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reAdd.php">Thêm</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div id="card-user">
                        <!-- user -->
                        <?php echo tenNV_theo_ma($_COOKIE['user']) ?>
                        <a href="?logout=true"><i class="fas fa-sign-out-alt"></i></a>
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