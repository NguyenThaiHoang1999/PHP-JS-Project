

<div class="row-fluid">
    <hr>

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <img src="public/logo/logo1.png" height="100%">
        </div>
        <!--Tìm kiếm-->
        <div class="col-md-2 col-sm-6 col-xs-12" style="margin:50px">
            <form action="search.php" method="post">
                <input type="text" name="search" placeholder="Tìm kiếm"
                    value="<?php if (isset($_GET['key'])) echo $_GET['key']; ?>">
            </form>
        </div>
        <!--Lọc-->
        <div class="col-md-5 col-sm-12 col-xs-12" style="margin-top:50px">
            <div class="btn-group">
                <button type="button" class="btn btn-default"><strong></strong> Lọc </button>
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                        <?php
                        if (!empty($_GET['loai'])) {
                            echo $sp->rowLoaiSP($_GET['loai'])['name_type'];
                        } else {
                            echo 'Tất cả loại';
                        }
                        ?>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a
                                href="<?php echo $sp->hrefdanhsachsanpham('dsSP', '', $_GET['hang'], $_GET['sx'], '1', $_GET['key']); ?>">
                                Tất cả loại </a></li>
                        <li class="divider"></li>
                        <?php
                        if (@$sp->loaisanpham()):
                            foreach ($sp->loaisanpham() as $row):
                                ?>
                        <li><a
                                href="<?php echo $sp->hrefdanhsachsanpham('dsSP', $row['id_type'], $_GET['hang'], $_GET['sx'], '1', $_GET['key']); ?>"><?php echo $row['name_type']; ?></a>
                        </li>
                        <li class="divider"></li>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                        <?php
                        if (!empty($_GET['hang'])) {
                            echo $sp->rowNSX($_GET['hang'])['name_brand'];
                        } else {
                            echo 'Tất cả hãng';
                        }
                        ?>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a
                                href="<?php echo $sp->hrefdanhsachsanpham('dsSP', $_GET['loai'], '', $_GET['sx'], '1', $_GET['key']); ?>">
                                Tất cả hãng </a></li>
                        <li class="divider"></li>
                        <?php
                        if (@$sp->hangsanxuat()):
                            foreach ($sp->hangsanxuat() as $row):
                                ?>
                        <li><a
                                href="<?php echo $sp->hrefdanhsachsanpham('dsSP', $_GET['loai'], $row['id_brand'], $_GET['sx'], '1', $_GET['key']); ?>"><?php echo $row['name_brand']; ?></a>
                        </li>
                        <li class="divider"></li>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                        <?php
                        if (!empty($_GET['sx'])) {
                            echo $_GET['sx'];
                        } else {
                            echo 'Không sắp xếp';
                        }
                        ?>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a
                                href="<?php echo $sp->hrefdanhsachsanpham('dsSP', $_GET['loai'], $_GET['hang'], '', '1', $_GET['key']); ?>">
                                Không sắp xếp </a></li>
                        <li class="divider"></li>
                        <li><a
                                href="<?php echo $sp->hrefdanhsachsanpham('dsSP', $_GET['loai'], $_GET['hang'], 'GiaGiam', '1', $_GET['key']); ?>">Theo
                                giá giảm dần</a></li>
                        <li class="divider"></li>
                        <li><a
                                href="<?php echo $sp->hrefdanhsachsanpham('dsSP', $_GET['loai'], $_GET['hang'], 'GiaTang', '1', $_GET['key']); ?>">Theo
                                giá tăng dần</a></li>
                        <li class="divider"></li>
                        <li><a
                                href="<?php echo $sp->hrefdanhsachsanpham('dsSP', $_GET['loai'], $_GET['hang'], 'TenGiam', '1', $_GET['key']); ?>">Theo
                                tên A-Z</a></li>
                        <li class="divider"></li>
                        <li><a
                                href="<?php echo $sp->hrefdanhsachsanpham('dsSP', $_GET['loai'], $_GET['hang'], 'TenTang', '1', $_GET['key']); ?>">Theo
                                tên Z-A</a></li>
                    </ul>
                </div>
            </div>
        </div>


    </div>
    <hr>
    <!--Chuyen phan trang-->
    <div class="col-md-2 col-sm-6 col-xs-12" style="margin-top:0px">
        <ul class="pagination ">
            <?php
                error_reporting(0);
                $per = 12;
                @$SP_BD = $sp->perpage($per, $_GET['loai'], $_GET['hang'], $_GET['sx'], $_GET['page'], $_GET['key']);
                ?>
        </ul>
    </div>
    <div class="col-md-10 col-sm-6 col-xs-12" style="margin-top:15px">
        <a href="<?php echo $sp->hrefdanhsachsanpham('gioHang', $_GET['loai'], $_GET['hang'], $_GET['sx'], $_GET['page'], $_GET['key']) . '&user=' .$_COOKIE['account']; ?>"
            role="button" class="" style="width: 70%;" title="Xem giỏ hàng "><img src="public/logo/images.png" width="50px" height="50px">
        
        </a>  
      
    </div>

</div>
<hr style="height: 50px">