<?php

include('./config/dbcon.php');
session_start();


if(isset($_SESSION['auth_user']))
{
    if(isset($_POST['remove_cart_item']))
    {
        $prod_id =$_POST['id'];        
        $user_id = $_SESSION['auth_user']['user_id'];        
        $delete_query ="DELETE  FROM `carts` WHERE user_id='$user_id' AND prod_id= '$prod_id'";
        $delete_query_run = mysqli_query($conn , $delete_query);

            if ($delete_query_run)
            {
                echo 200;
            }
            else
            {
                echo 500;

            }
        }
        if(isset($_POST['update_cart_item']))
        {
            $prod_id =$_POST['mydata']['id'];
            $prod_qty =$_POST['mydata']['count'];        
            $user_id = $_SESSION['auth_user']['user_id'];
            $select_query ="SELECT p.qty FROM carts c INNER JOIN users u INNER JOIN products p WHERE c.user_id=u.id AND
             c.prod_id=p.id and u.id='$user_id' and prod_id='$prod_id'
             ";
             $select_query_run=mysqli_query($conn, $select_query);
             $iis =mysqli_fetch_assoc($select_query_run);
            //  print_r($iis);
             if($prod_qty<= $iis['qty']){
                $update_query ="UPDATE `carts` SET `prod_qty` = '$prod_qty' WHERE `prod_id` = '$prod_id'";
                $update_query_run = mysqli_query($conn , $update_query);
                if ($update_query_run)
                {
                    echo 'success';
                }
                else
                {
                    
                    echo 'faill';
    
                }

            }
            
            else
            {
                    
                echo $iis['qty'];  

            }
        }
}
?>