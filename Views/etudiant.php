<?php 
include('../connexion/connexion.php');
include_once('../models/select/sel-etudiant.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>etudiant</title>
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
                          <h4>etudiant</h4>
                      </div>
                       <div class="card-body">
                          <div class="col-12 h-100  d-flex justify-content-center align-items-center p-4">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 bg-dark card p-3 shadow   m-3">
                                    <div class="card-header text-danger d-flex justify-content-between">
                                        <b class="text-white">Supprimer</b>
                                        <a href="etudiant.php" class="btn btn-outline-danger text-white"><b><i class="bi bi-x"></i></b></a>
                                </div>
                                  <div class="card-body py-3  text-white">
                                      Voulez-vous vraiment supprimer le etudiant de   "<b><?=$supprimer['nom']." ".$supprimer['postnom']." ".$supprimer['prenom']." avec le numero Tel ".$supprimer['telephone']?> </b>"?
                                        <br>
                                        <em class="mt-3 text-danger">NB: cette action est irréversible</em>
                                  </div>
                                  <div class="card-footer">
                                      <a href='../models/del/del-etudiant.php?id=<?=$_GET['idsup'] ?>' class="btn btn-outline-danger">Supprimer</a>
                                      <a href="etudiant.php" class="btn btn-info">Annuler</a>
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
                          <h4>etudiant</h4>
                        </div>
                            
                                  <form  class="shadow  p-3 m-3" action="<?=$action?>"  method="POST" >
                                  <h5 class="card-title text-center "><?=$titre?></h5>
                                    <div class="row">
                                        
                                         <div class="col-xl-3 col-lg-3 col-md-3  col-sm-3 p-3">
                                            <label for="">Nom</span></label>
                                            <input autocomplete="off" required type="text" class="form-control" placeholder="Ex:Kiro"  name="nom" <?php if(isset($_GET['id'])){ ?> value="<?=$modData['nom']?>" <?php } ?>> 
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-3  col-sm-3 p-3">
                                            <label for="">Postnom</span></label>
                                            <input autocomplete="off" required type="text" class="form-control" placeholder="Ex:Mwenge"  name="postnom" <?php if(isset($_GET['id'])){ ?> value="<?=$modData['postnom']?>" <?php } ?>> 
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-3  col-sm-3 p-3">
                                            <label for="">prenom</span></label>
                                            <input autocomplete="off" required type="text" class="form-control" placeholder="Ex:lauraine"  name="prenom" <?php if(isset($_GET['id'])){ ?> value="<?=$modData['prenom']?>" <?php } ?>> 
                                        </div>
                                        <div class=" col-xl-3 col-lg-3 col-md-3  col-sm-3 p-3">
                                            <label for="">Genre</span></label>
                                            <select name="genre" id="genre" class="form-control ">
                                                <?php if(isset($_GET['id'])){ ?>
                                                    <option value="F">feminin</option>
                                                    <option <?php if($modData['genre']=="M"){ ?> Selected <?php } ?> value="M">masculin</option>
                                                 
                                                <?php }else{?>
                                                    <option value="F">feminin</option>
                                                    <option value="M">masculin</option>
                                                   
                                                <?php }  ?>
                                            </select>
                                        </div>
                                         <div class="col-xl-3 col-lg-3 col-md-3  col-sm-3 p-3">
                                            <label for="">Numero tel</span></label>
                                            <input autocomplete="off" required type="text"  class="form-control" placeholder="Ex:0971402590 "  name="telephone" <?php if(isset($_GET['id'])){ ?> value="<?=$modData['telephone']?>" <?php } ?>> 
                                        </div>
                                         <div class="col-xl-3 col-lg-3 col-md-3  col-sm-3 p-3">
                                            <label for="">Etat civil</span></label>
                                            <input autocomplete="off" required type="text"  class="form-control" placeholder="Ex:celibataire "  name="etatcivil" <?php if(isset($_GET['id'])){ ?> value="<?=$modData['etatcivil']?>" <?php } ?>> 
                                        </div>
                                        
                                        <div class="col-xl-3 col-lg-3 col-md-3  col-sm-3 p-3">
                                            <label for="">lieu de naissance</span></label>
                                            <input autocomplete="off" required type="text" class="form-control" placeholder="Ex:beni"  name="lieudenaissance" <?php if(isset($_GET['id'])){ ?> value="<?=$modData['lieudenaissance']?>" <?php } ?>> 
                                        </div>
                                         <div class="col-xl-3 col-lg-3 col-md-3  col-sm-3 p-3">
                                            <label for="">date de naissance</span></label>
                                            <input autocomplete="off" required type="date" class="form-control"   name="datedenaissance" <?php if(isset($_GET['id'])){ ?> value="<?=$modData['datedenaissance']?>" <?php } ?>> 
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-3  col-sm-3 p-3">
                                            <label for="">adresse</span></label>
                                            <input autocomplete="off" required type="text" class="form-control" placeholder="Ex:malepe"  name="adresse" <?php if(isset($_GET['id'])){ ?> value="<?=$modData['adresse']?>" <?php } ?>> 
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-3  col-sm-3 p-3">
                                            <label for="">nationalite</span></label>
                                            <input autocomplete="off" required type="text" class="form-control" placeholder="Ex:congolaise"  name="nationalite" <?php if(isset($_GET['id'])){ ?> value="<?=$modData['nationalite']?>" <?php } ?>> 
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-3  col-sm-3 p-3">
                                            <label for="">province d'origine</span></label>
                                            <input autocomplete="off" required type="text" class="form-control" placeholder="Ex:nork-kivu"  name="provincedorigine" <?php if(isset($_GET['id'])){ ?> value="<?=$modData['provincedorigine']?>" <?php } ?>> 
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-3  col-sm-3 p-3">
                                            <label for="">ville d'origine</span></label>
                                            <input autocomplete="off" required type="text" class="form-control" placeholder="Ex:Beni"  name="villedorigine" <?php if(isset($_GET['id'])){ ?> value="<?=$modData['villedorigine']?>" <?php } ?>> 
                                        </div>
                                          <div class="col-xl-3 col-lg-3 col-md-3  col-sm-3 p-3">
                                            <label for="">territoire/commune</span></label>
                                            <input autocomplete="off" required type="text" class="form-control" placeholder="Ex:Beni"  name="territoirecommune" <?php if(isset($_GET['id'])){ ?> value="<?=$modData['territoirecommune']?>" <?php } ?>> 
                                        </div>
                                          <div class="col-xl-3 col-lg-3 col-md-3  col-sm-3 p-3">
                                            <label for="">ecole d'origine</span></label>
                                            <input autocomplete="off" required type="text" class="form-control" placeholder="Ex:Malkia"  name="ecoledorigine" <?php if(isset($_GET['id'])){ ?> value="<?=$modData['ecoleorigine']?>" <?php } ?>> 
                                        </div>
                                          <div class="col-xl-3 col-lg-3 col-md-3  col-sm-3 p-3">
                                            <label for="">pourcentage</span></label>
                                            <input autocomplete="off" required type="number" class="form-control" placeholder="Ex:65"  name="pourcentage" <?php if(isset($_GET['id'])){ ?> value="<?=$modData['pourcentage']?>" <?php } ?>> 
                                        </div>
                                          <div class="col-xl-3 col-lg-3 col-md-3  col-sm-3 p-3">
                                            <label for="">annee diplome</span></label>
                                            <input autocomplete="off" required type="text" class="form-control" placeholder="Ex:2021-2022"  name="anneediplome" <?php if(isset($_GET['id'])){ ?> value="<?=$modData['anneediplome']?>" <?php } ?>> 
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
                                                <a href="etudiant.php" class="btn btn-dark p-2  mt-1 w-100">Annuler</a>
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
                                  <h4 class="p-3 ">Liste des etudiant</h4>
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">noms </th>
                                           <th scope="col">adresse</th>
                                           <th scope="col">telephone</th>
                                           <th scope="col">date de naissance</th>
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
                                             <td ><?=$data['adresse']?></td>
                                             <td ><?=$data['telephone']?></td>
                                            <td ><?php echo date('d/m/Y',strtotime($data['datedenaissance']));?></td>
                                          
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