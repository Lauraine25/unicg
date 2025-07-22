
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>index</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
   
    <?php include_once('../include/link.php')?>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
    
        <!-- Spinner End -->

            <?php
            include_once('../include/menu.php');
            ?>

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php include_once('../include/nav.php')?>
            <!-- Navbar End -->


         

            <div class="container-fluid pt-4 px-4">
                  <div class="card-body">
                    <div><center><img src="../assets/img/ucglogo.jpeg" alt=""></center></div>
                            
                 
                </div>
            </div>
            <!-- Recent Sales End -->

            <!-- Footer Start -->
            <?php
            include_once('../include/footer.php')
            ?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <?php include_once('../include/js.php')?>


 
</body>

</html>