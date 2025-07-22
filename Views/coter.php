<?php 
include('../connexion/connexion.php');
include_once('../models/select/sel-coter.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>coter</title>
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
                          <h4>coter</h4>
                      </div>
                       <div class="card-body">
                          <div class="col-12 h-100  d-flex justify-content-center align-items-center p-4">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 bg-dark card p-3 shadow   m-3">
                                    <div class="card-header text-danger d-flex justify-content-between">
                                        <b class="text-white">Supprimer</b>
                                        <a href="coter.php" class="btn btn-outline-danger text-white"><b><i class="bi bi-x"></i></b></a>
                                </div>
                                  <div class="card-body py-3  text-white">
                                      Voulez-vous vraiment supprimer l'coter avec matricule <b><?=$supprimer['matricule']?> </b>"?
                                        <br>
                                        <em class="mt-3 text-danger">NB: cette action est irréversible</em>
                                  </div>
                                  <div class="card-footer">
                                      <a href='../models/del/del-coter.php?id=<?=$_GET['idsup'] ?>' class="btn btn-outline-danger">Supprimer</a>
                                      <a href="coter.php" class="btn btn-info">Annuler</a>
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
                          <h4>coter</h4>
                        </div>
                            
                            <?php if(isset($_GET['new'])){?>
                                   <div class="container-fluid pt-4 px-4">
                                        <div class="bg-light rounded p-4">
                                            <div class="table-responsive">
                                                <table class="table datatable ">
                                                    <center><h4 class="p-3 ">Choisissez le cours</h4></center>
                                                    
                                                        
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">cours</th>
                                                                <th scope="col">Promotion</th>
                                                                <th scope="col">semestre</th>
                                                                <th scope="col">annee academique</th>
                                                                <th scope="col">Action</th>
                                                                    

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php  $numero=0;
                                                                while($attr=$SelAttribution->fetch())
                                                                { 
                                                                    $numero++;
                                                                ?>
                                                            <tr>
                                                                    <th scope="row"><?=$numero?></th>
                                                                
                                                                    <td ><?=$attr['nomcours']." : credit ".$attr['credit']."/".$attr['volumehoraire']?>h</td>
                                                                    <td ><?=$attr['nompromotion'].",filiere : ".$attr['nomfiliere'].",departement : ".$attr['nomdepartement'].", faculte:".$attr['nomfaculte']?></td>
                                                                    <td><?=$attr['nomsemestre']?></td>
                                                                    <td><?=$attr['anneeacademique']?></td>
                                                                    <td>
                                                                        <a href="?attribution=<?=$attr['id']?>&affectation=<?=$attr['affectation']?>&anneeacademique=<?=$attr['anneeacademique']?>"class="btn btn-dark btn-sm">Evaluer</a>
                                                                           
                                                                           
                                                                        </td>

                                                                    
                                                                

                                                            </tr>
                                                            <?php } ?>
                                                                


                                                            
                                                            
                                                            </tbody>
                                                        </table>
                                            </div>
                                        </div>
                                    </div>
                            <?php }else if(isset($_GET['affectation'])){?>
                                 <form  class="shadow  p-3 m-3" action="<?=$action?>"  method="POST" >
                                  <h5 class="card-title text-center "><?=$titre?></h5>
                                    <div class="row">
                                        
                                         
                                         <div class=" col-xl-12 col-lg-12 col-md-12  col-sm-12 p-3">
                                            <label for="">etudiant</span></label>
                                            <select name="etudiant" id="etudiant" class="form-control ">
                                                <?php 
                                                while($etudiant=$Seletudiant->fetch()){
                                                if(isset($_GET['id'])){ ?>
                                               
                                                    <option <?php if($modData['idetudiant']==$etudiant['idinscription']){ ?> Selected <?php } ?> value="<?=$etudiant['idinscription']?>"><?=$etudiant['nom']." ".$etudiant['postnom']." ".$etudiant['prenom']?></option>
                                                 
                                                <?php }else{?>
                                                    <option value="<?=$etudiant['idinscription']?>"><?=$etudiant['nom']." ".$etudiant['postnom']." ".$etudiant['prenom']?></option>
                                               
                                                   
                                                <?php }  }?>
                                            </select>
                                        </div>
                                         <div class="col-xl-4 col-lg-4 col-md-4  col-sm-4 p-3">
                                            <label for="">cote tp sur 5 </span></label>
                                            <input autocomplete="off" required type="number" step="0.01" max="5" class="form-control" placeholder="Ex:4"  name="cote_tp" <?php if(isset($_GET['id'])){ ?> value="<?=$modData['cote_tp']?>" <?php } ?>> 
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4  col-sm-4 p-3">
                                            <label for="">cote interrogation sur 5 </span></label>
                                            <input autocomplete="off" required type="number" step="0.01" max="5" class="form-control" placeholder="Ex:4"  name="cote_interro" <?php if(isset($_GET['id'])){ ?> value="<?=$modData['cote_interro']?>" <?php } ?>> 
                                        </div>
                                         <div class="col-xl-4 col-lg-4 col-md-4  col-sm-4 p-3">
                                            <label for="">cote examen sur 10</span></label>
                                            <input autocomplete="off" required type="number" step="0.01" max="10" class="form-control" placeholder="Ex:8"  name="cote_exam" <?php if(isset($_GET['id'])){ ?> value="<?=$modData['cote_exam']?>" <?php } ?>> 
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
                                                <a href="inscription.php" class="btn btn-dark p-2  mt-1 w-100">Annuler</a>
                                            </div>
                                        </div>
                                        <?php }else {?>
                                                <input type="submit" class="btn btn-info text-white p-2 w-100" name="valider" value="<?=$bouton?>">
                                            <?php } ?>
                                    </div>

                                          
                  
                
                                  </form>

                                    <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <div class="table-responsive">
                          <table class="table datatable ">
                                  <h4 class="p-3 ">fiche de cote</h4>
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">etudiant</th>
                                           <th scope="col">cote tp </th>
                                            <th scope="col">cote interro</th>
                                            <th scope="col">cote examen</th>
                                            <th scope="col">action</th>

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
                                           
                                            <td ><?=$data['nom']." ".$data['postnom']." ".$data['prenom']." /".$data['matricule']?></td>
                                             <td ><?=$data['cote_tp']?>/5</td>
                                              <td ><?=$data['cote_interro']?>/5</td>
                                              <td ><?=$data['cote_exam']?>/10</td>
                                            <td>
                                                <a href="?id=<?=$data['id_cote']?>" class="btn btn-info btn-sm "><i
                                                        class="bi bi-pencil-square"></i></a>
                                                <a 
                                                    href="?idsup=<?=$data['id_cote']?>"
                                                    class="btn btn-dark btn-sm "><i class="bi bi-trash-fill"></i></a>
                                            </td>

                                       </tr>
                                       <?php } ?>
                                        


                                       
                                       
                                    </tbody>
                                </table>
                    </div>
                </div>
            </div>

                            <?php  }else if(isset($_GET['cours'])){?>
                            <?php }else{?>
                                 <a href="?new" class="btn btn-dark p-2  mt-1 w-100">coter </a>
                            <?php }?>
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