<?php
include("includes/header.php"); 
 ?>
  <div class="py-3 bg-primary">
    <div class="container">        
        <h6 class="text-white">
            <a href="index.php" class="text-white" >
                Home
            </a>
            <a href="cart.php"  class="text-white">
                /Cart
            </a>
        </h6> 
    </div>
 </div>
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center border rounded bg-light mt-5">
            <h3>My Cart</h3>
        </div>
        <div class="col-lg-8">
            <table class="table">
            <thead class="text-center">
                <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">Item</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                    $total =0;
                    $items =getCartItems();

                    if (is_array($items) || is_object($items))
                    {
                    foreach($items as $item)
                        {
                            ?>
                            <tr>
                                <th scope="row"><?=$item['prod_id'] ?></th>
                                <td><?=$item['name'] ?></td>
                                <td><img class="img-fluid rounded-3 w-50 " src="uploads/<?= $item['image'] ?>" alt="Image"></td>
                                <td><?= $item['selling_price'] ?>
                                    <input type="hidden" class="iprice" value="<?= $item['selling_price'] ?>">
                                </td>
                                <td> <input class="text-center iquantity" id="<?=$item['prod_id'] ?>" type="number" value="<?= $item['prod_qty'] ?>" min='1' max='<?= $item['qty'] ?>'> </td>
                                <td class="itotal">
                                    <?php $itp =  $item['selling_price']*$item['prod_qty'];
                                    echo $itp;
                                    $total +=$itp ?>
                                </td>
                                <td>
                                        <button class="btn btn-danger btn-sm  remove_item " value="<?=$item['prod_id'] ?>" name=""><i class="fa fa-trash"></i>
                                        </button>
                                 </td>
                            </tr> 
                        <?php                  

                        }
                    }
                    else
                    {
                        echo "Unfortunately, an error occured.";

                    }

                ?>
                              
            </tbody>
            </table>



            </div>
            <div class="col-lg-4">
                <div class="border bg-light rounded p-4 mt-4 ">
                    <h3>Total:</h3>
                    <h5 class="text-right"><?php echo $total; ?></h5>
                    <br>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Cash on Delivery
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled" disabled>
                    <label class="form-check-label" for="flexRadioDisabled">
                        Online/Card Payment
                    </label>
                    </div>
                    <form action="" method="post">
                        <button class="btn btn-primary btn-block w-100" >CheckOut</button>
                    </form>
                </div>
            </div>
    </div>
</div>

<?php include("includes/footer.php");  ?>
<script>
     $('.remove_item').click(function(e){
        e.preventDefault();

        var id =$(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete)=> {
            if (willDelete){
                $.ajax({
                    method : 'POST',
                    url : 'cart_remove.php',
                    data : {'id':id, 'remove_cart_item':true},
                    success:function(){
                            swal('success','deleted succesfully','success');
                            
                            setTimeout(function(){
                                location.reload();
                            },1000)
                        
                    },
                    error:function(){
                        alert('error occured');
                    }
                });
            }
            else {
                swal("Your cart item is safe!");
              }
          });

    }); 
    $('.iquantity').on('change',this,function(){

        var ivalue =$(this).val();
        var id =$(this). prop('id');
        var mydata = {'id':id, 'count':ivalue};
        $.ajax({
                    method : 'POST',
                    url : 'cart_remove.php',
                    data : {'mydata':mydata, 'update_cart_item':true},
                    success:function(response){
                        setTimeout(function(){
                                location.reload();
                            })
                        if(!isNaN(response)){
                            swal('error','only '+response+' items available in the stock','error');
                            setTimeout(function(){
                                location.reload();
                            },1500);
                        }

                        
                    }
                });
    });
</script>
                    

<script>
    var iprice =document.getElementsByClassName('iprice');
    var iquantity =document.getElementsByClassName('iquantity');
    var itotal =document.getElementsByClassName('itotal');
function subtotal(){
    for(i=0; i<iprice.length; i++){
        itotal[i].innerText= (iprice[i].value) * (iquantity[i].value);
    }

}

</script>    