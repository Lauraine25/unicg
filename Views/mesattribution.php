<?php 
include('../connexion/connexion.php');
include_once('../models/select/sel-mesattribution.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>attribution</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
   
    <?php include_once('../include/link.php')?>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
     

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
                          <h4>attribution</h4>
                      </div>
                       <div class="card-body">
                          <div class="col-12 h-100  d-flex justify-content-center align-items-center p-4">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 bg-dark card p-3 shadow   m-3">
                                    <div class="card-header text-danger d-flex justify-content-between">
                                        <b class="text-white">Supprimer</b>
                                        <a href="attribution.php" class="btn btn-outline-danger text-white"><b><i class="bi bi-x"></i></b></a>
                                </div>
                                  <div class="card-body py-3  text-white">
                                      Voulez-vous vraiment supprimer l'attribution avec matricule <b><?=$supprimer['matricule']?> </b>"?
                                        <br>
                                        <em class="mt-3 text-danger">NB: cette action est irréversible</em>
                                  </div>
                                  <div class="card-footer">
                                      <a href='../models/del/del-attribution.php?id=<?=$_GET['idsup'] ?>' class="btn btn-outline-danger">Supprimer</a>
                                      <a href="attribution.php" class="btn btn-info">Annuler</a>
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
                          <h4> mes attributions</h4>
                        </div>
                            
           
                                
             </div>
             <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <div class="table-responsive">
                          <table class="table datatable ">
                                  
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">cours</th>
                                           <th scope="col">Promotion</th>
                                           <th scope="col">semestre</th>
                                           <th scope="col">annee academique</th>
                                            

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
                                           
                                            <td ><?=$data['nomcours']." : credit ".$data['credit']."/".$data['volumehoraire']?>h</td>
                                            <td ><?=$data['nompromotion'].",filiere : ".$data['nomfiliere'].",departement : ".$data['nomdepartement'].", faculte:".$data['nomfaculte']?></td>
                                            <td><?=$data['nomsemestre']?></td>
                                            <td><?=$data['anneeacademique']?></td>
                                             
                                           

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