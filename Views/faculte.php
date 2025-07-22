<?php 
include('../connexion/connexion.php');
include_once('../models/select/sel-faculte.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>faculte</title>
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


             <?php if(isset($_GET['idsup'])){ ?>
        <div class="row">
                <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                          <h4>faculte</h4>
                      </div>
                       <div class="card-body">
                          <div class="col-12 h-100  d-flex justify-content-center align-items-center p-4">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 bg-dark card p-3 shadow   m-3">
                                    <div class="card-header text-danger d-flex justify-content-between">
                                        <b class="text-white">Supprimer</b>
                                        <a href="faculte.php" class="btn btn-outline-danger text-white"><b><i class="bi bi-x"></i></b></a>
                                </div>
                                  <div class="card-body py-3  text-white">
                                      Voulez-vous vraiment supprimer la faculte  "<b><?=$supprimer['nom']?> </b>"?
                                        <br>
                                        <em class="mt-3 text-danger">NB: cette action est irréversible</em>
                                  </div>
                                  <div class="card-footer">
                                      <a href='../models/del/del-faculte.php?id=<?=$_GET['idsup'] ?>' class="btn btn-outline-danger">Supprimer</a>
                                      <a href="faculte.php" class="btn btn-info">Annuler</a>
                                  </div>

                            </div>
                          </div>
                      </div>
                        
                    </div>
                </div>
            </div>
        
       <?php }else {?>

            <!-- Recent Sales Start -->
              <div class="row">
                <div class="col-12">
                    <div class="card">

                      <div class="card-header">
                          <h4>faculte</h4>
                        </div>
                        
                            
                                  <form  class="shadow  p-3 m-3" action="<?=$action?>"  method="POST" >
                                  <h5 class="card-title text-center "><?=$titre?></h5>
                                    <div class="row">
                                        
                                         <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12 p-3">
                                            <label for="">Nom</span></label>
                                            <input autocomplete="off" required type="text" class="form-control" placeholder="Ex:economie"  name="nom" <?php if(isset($_GET['id'])){ ?> value="<?=$modData['nom']?>" <?php } ?>> 
                                        </div>
                                      <div class="col-xl-12 col-lg-12 col-md-12 mt-10 col-sm-12 p-3 aling-center">


                                        <?php if(isset($_SESSION['notif'])){ ?>
                                            <center><p class="alert-<?=$_SESSION['color']?> alert">
                                            <b> <i class="bi bi-<?=$_SESSION['icon']?>">  <?php echo $_SESSION['notif']; unset($_SESSION['notif']) ?></i></b>
                                                    
                                            </p></center> 
                                        <?php } ?> 
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12  col-sm-12 ">
                                   
                                        <?php if(isset($_GET['id'])){?>
                                        <div class="row">
                                            <div class="col-xl-8 col-lg-8 col-md-8  col-sm-8">
                                                <input type="submit" class="btn btn-info text-white p-2 mt-1 w-100" name="valider" value="<?=$bouton?>">
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4  col-sm-4">
                                                <a href="faculte.php" class="btn btn-dark p-2  mt-1 w-100">Annuler</a>
                                            </div>
                                        </div>
                                        <?php }else {?>
                                                <input type="submit" class="btn btn-info text-white p-2 w-100" name="valider" value="<?=$bouton?>">
                                            <?php } ?>
                                    </div>
                                          
                  
                
                                  </form>
                                
             </div>
             <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <div class="table-responsive">
                          <table class="table datatable ">
                                  <h4 class="p-3 ">Liste des facultés</h4>
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">denomination</th>
                                          
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php  $numero=0;
                                        while($data=$SelData->fetch())
                                        { 
                                            $numero++;
                                        ?>
                                       <tr>
                                            <th scope="row"><?=$numero?></th>
                                           
                                            <td ><?=$data['nom']?></td>
                                            <td>
                                                <a href="?id=<?=$data['id']?>" class="btn btn-info btn-sm "><i
                                                        class="bi bi-pencil-square"></i></a>
                                                <a 
                                                    href="?idsup=<?=$data['id']?>"
                                                    class="btn btn-dark btn-sm "><i class="bi bi-trash-fill"></i></a>
                                            </td>

                                       </tr>
                                       <?php } ?>
                                        


                                       
                                       
                                    </tbody>
                                </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->
        <?php }?>
            <!-- Footer Start -->
            <?php
            include_once('../include/footer.php')
            ?>
            <!-- Footer End -->
              
               </div>
               </div>
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <?php include_once('../include/js.php')?>


 
</body>

</html>