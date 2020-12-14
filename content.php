<div class="container-fluid">
<!-- Nguoi dung chon action -->
    <?php if (isset($_GET['ac'])): ?>
        <?php
        if ($_GET['ac'] == 'dsSP') {
            require './danhsachsanpham.php';
        } else if ($_GET['ac'] == 'ctSP') {
            require './chitietsanpham.php';
        } else if ($_GET['ac'] == 'gioHang'){
            require './view_cart.php';
        }
        ?>
    <?php else: ?>
        <?php
        require './danhsachsanpham.php';
        ?>
    <?php endif;
    ?>
</div>