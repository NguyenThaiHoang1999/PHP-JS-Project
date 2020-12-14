<?php

    class cart extends DB{
             //$soluong=null;
	
	//Show product theo acc
    public function rowSanPhamByAccount($id) {
        $sql = 'select * from carts where id_account = ' . $id;
        if (@$this->select($sql)[0]) {
            return $this->select($sql)[0];
        }
    }
	public function addCart($_GET['idsp']){
		     
		    $mangCart=array();
		         
		    $mangCart=$sp->rowSanPham($id_sp);
			 
	    	$idchonsp=$mangCart[0]->id_product;

		    if(){
		        ->soluong=+1;   
		    }
			    else{
			        = $cart;    
			        soluong = 1;       
		    }
	}
			 
	//xoa gio hang 	     
	public function xoaCart($pid){
			    
	}
				
	public function capnhatCart(){
		        foreach ($_POST['soluong'] as $id_product => $soluong) {
			                if ($soluong==0){
		                    unset($_SESSION['cart'][$id_product]);
		                }
		            else{
		                 $_SESSION['cart'][$id_product]->soluong = $soluong;
		 
		            }    
		        }
	}
}
		
    //-------------------------------------------------------------     
		if (isset($_GET['addcart'])){
			
			$cart_sp->addCart($_GET['addcart']);
				
			echo "<script>window.history.back();</script>";
			
		}

   	 
	
		if (isset($_GET['xoa'])){
			$cart_sp->xoaCart($_GET['xoa']);
			echo "<script>window.history.back();</script>";
			
		}
		
	   	
		if (isset($_GET['xoahet'])){
		
			unset($_SESSION['cart']);
			echo "<script>window.history.back();</script>";
			
		}
		
	   
		if (isset($_POST['update'])){
			$cart_sp->capnhatCart();
			
		}
	
}





    public function table_SanPham($SP_BD) {
        $sql = 'select * from products order by id_product desc limit ' . $SP_BD . ',5';
        return $this->select($sql);
    }

    public function count() {
        $sql = 'select * from products';
        $table = $this->select($sql);
        return count($table);
    }

   
    public function row_loai($id) {
        $sql = 'select * from types where id_type = ' . $id;
        return $this->select($sql)[0];
    }

    public function row_nsx($id) {
        $sql = 'select * from brands where id_brand = ' . $id;
        return $this->select($sql)[0];
    }


       

 

?>