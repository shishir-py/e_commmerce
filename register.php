<?php
session_start();
 include("includes/header.php");
?>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if(isset($_SESSION['message']))
                {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['message']; ?>.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['message']);
                }
                ?>   
                <div class="card">
                    <div class="card-header">
                        <h4>Register here</h4>
                    </div>
                    <div class="card-body">
                        <form action="functions/auth.php" name="myForm" onsubmit="return validateForm()" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter your full name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">phone</label>
                                <input type="number" name="phone" class="form-control" placeholder="Enter your phone number">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter your Email" id="exampleInputEmail1" aria-describedby="emailHelp">

                            </div>
                            <div class="mb-3">
                                <label class="form-label" placeholder="Enter your Password">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="enter your Password">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1" placeholder="confirm your Password">
                            </div>

                            <button type="submit" name="register_btn" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php");  ?>
<script>
    
    function validateForm() {
    let name = document.forms["myForm"]["name"].value;
    let phone = document.forms["myForm"]["phone"].value;
    let email = document.forms["myForm"]["email"].value;
    let password = document.forms["myForm"]["password"].value;
    let c_password = document.forms["myForm"]["cpassword"].value;
    if (name != "" || phone != "" || email != "" || password != "" || c_password != "") {
      if(!validatePhoneNumber(phone)){
        
        swal('error','invalid phone number','error');
        return false;
      }else{
        return true;
      } 
    }
    else
    {
        swal('error','all required','error');
        return false;
    }
    
    console.log(name+phone+email+password+c_password);
    return false;
  }
    function validatePhoneNumber(input_str) {
        var re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
            return re.test(input_str);
        }
</script>