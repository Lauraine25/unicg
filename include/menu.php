
     
 <?php 
include_once('../connexion/connexion.php');
?>
    <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">UCG</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../assets/img/avatar-1.png" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?=$_SESSION['noms']?></h6>
                        <span><?=$_SESSION['fonction']?></span>
                    </div>
                </div>
               <div class="navbar-nav w-100">
                <?php if($_SESSION['fonction']=="admin"){?>
                    
                    <a href="../views/faculte.php" class="nav-item nav-link"><i class=" bi bi-collection-fill"></i>Faculté</a>
                    <a href="../views/departement.php" class="nav-item nav-link"><i class=" bi bi-collection-fill"></i>Departement</a>
                    <a href="../views/filiere.php" class="nav-item nav-link"><i class=" bi bi-collection-fill"></i>filiere</a>
                    <a href="../views/promotion.php" class="nav-item nav-link"><i class=" bi bi-collection-fill"></i>promotion</a>
                    <a href="../views/cours.php" class="nav-item nav-link"><i class=" bi bi-collection-fill"></i>cours</a>
                    <a href="../views/etudiant.php" class="nav-item nav-link"><i class=" bi bi-collection-fill"></i>etudiant</a>
                    <a href="../views/enseignant.php" class="nav-item nav-link"><i class=" bi bi-collection-fill"></i>enseignant</a>
                    <a href="../views/inscription.php" class="nav-item nav-link"><i class=" bi bi-collection-fill"></i>inscription</a>
                    <a href="../views/attribution.php" class="nav-item nav-link"><i class=" bi bi-collection-fill"></i>attribution</a>
                    <a href="../views/affectation.php" class="nav-item nav-link"><i class=" bi bi-collection-fill"></i>affectation</a>
                <?php }else if($_SESSION['fonction']=="enseignant"){ ?>
                    <a href="../views/mesattribution.php" class="nav-item nav-link"><i class=" bi bi-collection-fill"></i>mes attribution</a>
                    <a href="../views/coter.php" class="nav-item nav-link"><i class=" bi bi-collection-fill"></i>coter</a>
             
                 <?php }else if($_SESSION['fonction']=="etudiant"){ ?>
                     <a href="../views/mescours.php" class="nav-item nav-link"><i class=" bi bi-collection-fill"></i>Mes cours</a>
                    <a href="../views/coter.php" class="nav-item nav-link"><i class=" bi bi-collection-fill"></i>Voir mes resultat</a>
                    
                <?php } ?>

                   
                    
                    
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->
