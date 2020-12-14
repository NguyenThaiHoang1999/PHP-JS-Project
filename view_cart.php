<?php 

 if(isset($_COOKIE['account'])){
    

    $rowCart = $spCart->rowSanPhamByAccount($_COOKIE['account']);

 }else{

     echo 'Ban can phai dang nhap tai khoan';
 }
 ?>


<div class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">remove</th>
                                    <th class="li-product-thumbnail">images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="li-product-price">Unit Price</th>
                                    <th class="li-product-quantity">Quantity</th>
                                    <th class="li-product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($rowCart)){
                                    foreach($rowCart as $row):
                                        ?>
                                        <tr>
                                            <td class="li-product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                                            <td class="li-product-thumbnail">
                                                <?php
                                                $arr = explode("p", $row['image_product']);
                                                foreach ($arr as $r):
                                                    if (!empty($r)):
                                                ?>
                                                <img src="public/images/<?php echo $load->row($r)['url_image']; ?>"
                                                    class="img-responsive" width="60" height="60"><br>
                                                <?php
                                                    endif;
                                                endforeach;
                                                ?>
                                            </td>
                                            <td class="li-product-name"><a href="#"><?php echo $row['name_product']; ?></a></td>
                                            <td class="li-product-price"><span
                                                    class="amount"><?php echo $row['price_product']; ?></span></td>
                                            <td class="quantity">
                                                <label>Quantity</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" value="1" type="text">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </td>
                                            <td class="product-subtotal"><span class="amount">$70.00</span></td>
                                        </tr>
                                        <?php
                                    endforeach;
                                }else{
                                    echo 'Khong co san pham nao trong gio hang';
                                }
                            

                                    ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value=""
                                        placeholder="Coupon code" type="text">
                                    <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                </div>
                                <div class="coupon2">
                                    <input class="button" name="update_cart" value="Update cart" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Subtotal <span>$130.00</span></li>
                                    <li>Total <span>$130.00</span></li>
                                </ul>
                                <a href="#">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>