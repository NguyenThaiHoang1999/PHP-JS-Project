<?php

require 'admin/DB.php';

class spRegister extends DB {
    
    public function register() {
        
        
            echo '123';
            $user   = "'".$_POST['username']."'";
            $email  = "'".$_POST['email']."'";
            $pass   = "'".$_POST['pass']."'";
            $phone  = "'".$_POST['phone']."'";
            $adress = "'".$_POST['address']."'";
            $repass = "'".$_POST['repass']."'";
            
            $sql = 'insert into accounts (user_account, email_account, pass_account,phone_account,address_account,balance_account) value(' . $user . ',' . $email . ',' . $pass . ',' . $phone . ',' . $adress . ',' . $repass . ')';
            ;
            if (@$this->querry($sql)) {
                
                header('location: index.php?ac=dsSP&tt=<?php echo"<script>alert("Đã đăng kí tài khoản thành công!");</script>" ?>');
            } else {
    
                header('location: index.php?ac=dsSP&tt=<div class="alert alert-danger"><strong>Lỗi!</strong> Đã xảy ra vấn đề. Vui long thử lại sau.</div>');
            }
    
            
    }
            
            
    
}


$sp = new spRegister();

    $sp->register();
    

        
    





?>