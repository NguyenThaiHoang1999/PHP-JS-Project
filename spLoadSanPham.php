<?php

class phantrangSP extends DB {
//dem bang gallerys
    public function count() {
        $sql = 'select * from gallerys';
        $table = $this->select($sql);
        return count($table);
    }

    public function perpage() {
        //Truy van de hien thi san pham
        $sql = 'select * from gallerys';
        //Thuc thi cau truy van
        $table = $this->select($sql);
        //Dem san pham 
        $count_page = count($table);
        //lam tron 
        $total_page = ceil($count_page / 3);
        //trang 1
        $pg = 1;
        //neu nguoi dung chon trang
        if (isset($_GET['trang'])) {
            $pg = $_GET['trang'];
        }
        for ($i = 1; $i <= $total_page; $i++) {
            if ($i == $pg) {
                echo '<a href="index.php?quanly=gallery&ac=lietke&trang=' . $i . '" class="btn btn-success">' . $i . ' </a>';
            } else {
                echo '<a href="index.php?quanly=gallery&ac=lietke&trang=' . $i . '" class="btn ">' . $i . ' </a>';
            }
        }
    }

}

class sanpham extends DB {

    // public function count(id_account) {
    //     $sql = 'select * from ';
    //     $table = $this->select($sql);
    //     return count($table);
    // }

    public function row_img($ID_img) {
        $sql = 'select * from images where id_image like '.$ID_img;
        return @$this->select($sql)[0];
    }

    public function danhsachsanphamphantrang($SP_BD, $per) {
        $key = "'%%'";
        if (isset($_GET['key']) && $_GET['key'] != '') {
            $key = "'%" . $_GET['key'] . "%'";
        }
        $type = "'%%'";
        if (isset($_GET['loai']) && $_GET['loai'] != '') {
            $type = "'" . $_GET['loai'] . "'";
        }
        $brand = "'%%'";
        if (isset($_GET['hang']) && $_GET['hang'] != '') {
            $brand = "'" . $_GET['hang'] . "'";
        }
        $sx = "";
        if (isset($_GET['sx'])) {
            if ($_GET['sx'] == 'GiaGiam') {
                $sx = " order by price_product desc ";
            } else if ($_GET['sx'] == 'GiaTang') {
                $sx = " order by price_product asc ";
            } else if ($_GET['sx'] == 'TenGiam') {
                $sx = " order by name_product asc ";
            } else if ($_GET['sx'] == 'TenTang') {
                $sx = " order by name_product desc ";
            }
        }
        $sql = 'select * from products where name_product like ' . $key . ' and id_type like ' . $type . ' and id_brand like ' . $brand . $sx . ' limit ' . $SP_BD . ',' . $per . ';';
        if (@$this->select($sql)) {
            return $this->select($sql);
        }
    }
//tra ve san pham can tim
    public function danhsachsanpham() {
        $key = "'%%'";
        
        if (isset($_GET['key']) && $_GET['key'] != '') {
            $key = "'%" . $_GET['key'] . "%'";
        }
        $type = "'%%'";
        if (isset($_GET['loai']) && $_GET['loai'] != '') {
            $type = "'" . $_GET['loai'] . "'";
        }
        $brand = "'%%'";
        if (isset($_GET['hang']) && $_GET['hang'] != '') {
            $brand = "'" . $_GET['hang'] . "'";
        }
        $sx = "";
        if (isset($_GET['sx'])) {
            if ($_GET['sx'] == 'GiaGiam') {
                $sx = " order by price_product desc ";
            } else if ($_GET['sx'] == 'GiaTang') {
                $sx = " order by price_product asc ";
            } else if ($_GET['sx'] == 'TenGiam') {
                $sx = " order by name_product asc ";
            } else if ($_GET['sx'] == 'TenTang') {
                $sx = " order by name_product desc ";
            }
        }
        $sql = 'select * from products where  name_product like ' . $key . ' and id_type like ' . $type . ' and id_brand like ' . $brand . $sx . ';';
        if (@$this->select($sql)) {
            return $this->select($sql);
        }
    }
    
//trả về những sản phẩm hot cho slide
    public function gallary() {
        $sql = 'select * from gallerys';
        if (@$this->select($sql)) {
            return $this->select($sql);
        }
    }
//trả về sản phẩm theo id
    public function rowSanPham($id) {
        $sql = 'select * from products where id_product = ' . $id;
        if (@$this->select($sql)[0]) {
            return $this->select($sql)[0];
        }
    }
    
//trả về loại của 1 sản phẩm
    public function rowLoaiSP($id) {
        $sql = 'select * from types where id_type = ' . $id;
        if (@$this->select($sql)[0]) {
            return $this->select($sql)[0];
        }
    }
// trả về ngày sx của sản phẩm
    public function rowNSX($id) {
        $sql = 'select * from brands where id_brand = ' . $id;
        if (@$this->select($sql)[0]) {
            return $this->select($sql)[0];
        }
    }
//per là số sản phẩm đươc hiển thị trên trang 
//
    public function perpage($per, $loai, $hang, $sx, $page, $key) {
        $numPage = 0;
        // 
        if (!empty($page)) {
            $numPage = $page;
        } else {
            $numPage = 1;
        }
        
        if ($numPage == '' || $numPage == 1) {
            $SP_BD = 0;
        } else {
            $SP_BD = ($numPage * $per) - $per;
        }

        $table = $this->danhsachsanpham();
        $count_page = count($table);
        $total_page = ceil($count_page / $per);
        if ($numPage > 1) {
            echo '<li><a href="' . $this->hrefdanhsachsanpham('dsSP', $loai, $hang, $sx, 1, $key) . '">1</a></li>';
            echo '<li><a href="' . $this->hrefdanhsachsanpham('dsSP', $loai, $hang, $sx, ($numPage - 1), $key) . '">&laquo;</a></li>';
        }
        for ($i = $numPage - 2; $i <= $numPage + 2; $i++) {
            if ($i == $numPage) {
                echo '<li><a href="' . $this->hrefdanhsachsanpham('dsSP', $loai, $hang, $sx, $i, $key) . '" style="background-color: blue; color:#fff;"> ' . $i . '</a></li>';
            } else if ($i > 0 && $i <= $total_page) {
                echo '<li><a href="' . $this->hrefdanhsachsanpham('dsSP', $loai, $hang, $sx, $i, $key) . '">' . $i . ' </a></li>';
            }
        }
        if ($numPage < $total_page) {
            echo '<li><a href="' . $this->hrefdanhsachsanpham('dsSP', $loai, $hang, $sx, ($numPage + 1), $key) . '">&raquo;</a></li>';
            echo '<li><a href="' . $this->hrefdanhsachsanpham('dsSP', $loai, $hang, $sx, $total_page, $key) . '">' . $total_page . '</a></li>';
        }
        return $SP_BD;
    }
//xu lý duong dan trả về null
    public function hrefdanhsachsanpham($ac, $loai, $hang, $sx, $page, $key) {
        //kiem tra loại 
        if (empty($loai)) {
            $loai = '';
        }
        //kiểm tra hãng sx nếu có giá trị thì set về null
        if (empty($hang)) {
            $hang = '';
        }

        if (empty($sx)) {
            $sx = '';
        }
        // 
        if (empty($page)) {
            $page = '';
        }
        if (empty($key)) {
            $key = '';
        }
        return "?ac=$ac&loai=$loai&hang=$hang&sx=$sx&page=$page&key=$key";
    }
//Gui truy vấn trả về hãng sản xuất
    public function hangsanxuat() {
        $sql = 'select * from brands';
        if (@$this->select($sql)) {
            return $this->select($sql);
        }
    }
//gui truy van tra ve loại sản phẩm
    public function loaisanpham() {
        $sql = 'select * from types';
        if (@$this->select($sql)) {
            return $this->select($sql);
        }
    }

}

// =============================================

class carts extends DB{
	
    public function rowSanPhamByAccount($user) {
        $sql = 'select pro.name_product,pro.image_product,pro.price_product,pro.sale_product
				from products as pro, carts,cart_info,accounts 
				where pro.id_product=cart_info.id_product 
				and  cart_info.id_cart= carts.id_cart
				and carts.user_account= '.$user.';';
        if (@$this->select($sql)) {
            return $this->select($sql);
        }
	}
	// public function rowAccountInCart($user){
	// 	$sql ='select user_account from carts where user_account ='.$user';';
	// 	if (@$this->select($sql)) {
    //         return $this->select($sql);
    //     }

	// }
	public function addCart($ip_sp,$user,$sl){
        echo 'jj';
		     
		    $mangCart=array();
		         
		    $mangCart=$cart_sp->rowSanPham($id_sp);
			 
	    	$idchonsp=$mangCart[0]->id_product;

		    if($cart_sp->rowAccountInCart($user)){
				$sl =+1;
			   $sql = 'update cart_info set sl_cart_info='.$sl.' where id_product ='.$id_sp.';';
			   if (@$this->select($sql)) {
				return $this->select($sql);
			}     
		    }
			else{
					$sql='insert into cart (id_cart,user_account,date_cart) value (,'.$user.',now());
							insert into cart_info(id_cart_info,id_cart,id_product,sl_cart_info) value (,,'.$id_sp.','.$sl.');';
					
					if (@$this->select($sql)) {
						return $this->select($sql);
					}    
			       
		    }
	}
			 
	
}
// if (isset($_GET['ac'])): 
    
//     if ($_GET['ac'] == 'dsSP') {
//         require './danhsachsanpham.php';
//     } else if ($_GET['ac'] == 'ctSP') {
//         require './chitietsanpham.php';
//     } else if ($_GET['ac'] == 'gioHang'){
//         require './view_cart.php';
//     }
    
// if (isset($_POST['addcart'])) {
//     $spCart->addCart();
// } elseif (isset($_POST['remove'])) {
//     //$xulySanPham->removeCart();
// }
?>