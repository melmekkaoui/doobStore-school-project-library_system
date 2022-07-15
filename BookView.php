<?php 

  include "inc/header.php";
  include "inc/navbar.php";
  include "controller/bookLib.php";
  $bookOption = new BookLib();
  ?>
    <div class="bookViewPage">
      <div class="container ">

        <?php 
            $view = $_GET['view'];

            if($_GET['view'] == 'afficher'){ // si le client visit la page qui present les livre 
                 // extraire la categorie du livres
                
                if(isset($_GET['categorie'])){ // si le client a choisi une categorie specifique
                    $booksByCategorie = $bookOption->get_book_by_categories($_GET['categorie']); 
                    $bookList = $booksByCategorie;

                }
                else{
                  $allbooks = $bookOption->get_All_books();
                  $bookList = $allbooks;
                }
                if($bookList){ // faire un traitement s'il ya les données demmandee
                    ?>
                       
                            <div class="row p-5">
                                <?php 
                                    foreach($bookList as $item){
                                        ?>
                                          <div class="col-md-3">
                                            <div class="card" style="margin-bottom:30px">
                                              <img class="card-img-top" src="<?php echo $item['book_img']; ?>" style="height:400px;width:90%" alt="Card image cap">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $item['book_title']; ?></h5>
                                                    <p class="card-text"><?php echo $item['book_desc']; ?></p>
                                                    <div class="btn-row">
                                                        <a href="#" class="btn rounded-pill main-btn">Voire</a>
                                                        <a href="<?php echo 'BookView.php?view=reserver&bookid='.$item['id'].''; ?>" class="btn btn-warning rounded-pill">Demander</a>
                                                    </div>
                                                </div>
                                            </div>
                                          </div>
                                      <?php
                                    }
                                ?>
                            </div>
                              
                       </div>
                  </div>

                  <?php
                }
                else{
                  ?>
                  <div class="row p-5">
                                <?php 
                                    foreach($allbooks as $item){
                                        ?>
                                          <div class="col-md-3">
                                            <div class="card" style="margin-bottom:30px">
                                              <img class="card-img-top" src="<?php echo $item['book_img']; ?>" style="height:400px;width:90%" alt="Card image cap">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $item['book_title']; ?></h5>
                                                    <p class="card-text"><?php echo $item['book_desc']; ?></p>
                                                    <a href="#" class="btn rounded-pill main-btn">Voire</a>
                                                    <a href="<?php echo 'BookView.php?view=reserver&bookid='.$item['id'].''; ?>" class="btn btn-warning rounded-pill">Demander</a>
                                                </div>
                                            </div>
                                          </div>
                                      <?php
                                    }
                                ?>
                            </div>
                              
                       </div>
                  </div>
                  <?php
                }







            }
            elseif($_GET['view'] == 'reserver'){
                $bookId = $_GET['bookid'];
                if(isset($bookId)){
                      $bookById = $bookOption->get_book_by_id($bookId);

                     





                    ?>
                          <div class="row p-5">

                                <div class="col col-md-6 col-sm-10">
                                   <?php 
                                     foreach($bookById as $item){
                                      ?>
                                      <div class="card" style="margin-bottom:30px">
                                              <img class="card-img-top" src="<?php echo $item['book_img']; ?>" style="height:400px;width:90%" alt="Card image cap">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $item['book_title']; ?></h5>
                                                    <p class="card-text"><?php echo $item['book_desc']; ?></p>
                                                    
                                                </div>
                                        </div>
                                        <?php
                                        $redirection = "?view=postreservation&id=".$item['id']."&title=".$item['book_title'];
                                     }
                                  ?>                                        
                                </div>

                                <div class="col col-md-6 col-sm-10">
                                  
                                  <form method="POST" action="<?php echo $redirection; ?>">
                                          
                                        <div class="row">
                                            <div class="col">
                                              <input type="text" class="form-control" placeholder="Entrer Le nom complet" name="name">
                                            </div>
                                            <div class="col">
                                              <input type="text" class="form-control" placeholder="Entrer Votre Numero Id" name="Idnumber">
                                            </div>
                                         </div>

                                          <div class="mb-3 mt-3">
                                            <label for="email" class="form-label">Email:</label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                          </div>
                                          <div class="row">
                                            <div class="col">
                                            <label for="date_debut" class="form-label">la date de debut:</label>
                                              <input type="date" class="form-control" name="date_debut">
                                            </div>
                                            <div class="col">
                                             <label for="email" class="form-label">la date de fin:</label>
                                              <input type="date" class="form-control" name="date_fin">
                                            </div>
                                         </div>
                                         
                                          <button type="submit" class="btn btn-primary mt-2" name="reserver">Demander le livre</button>
                                        </form> 

                                </div>


                          </div>





                  <?php









                }
            }
            elseif($_GET['view'] == 'postreservation'){
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                      $name= $_POST['name'];
                      $id  = $_POST['Idnumber'];
                      $email = $_POST['email'];
                      $dateDebut=$_POST['date_debut'];
                      $dateFin  =$_POST['date_fin'];
                      $bookid   = $_GET['id'];
                      $booktitle = $_GET['title'];
                      
                      $inData = array(
                        'client_f_name'=>"'".$name."'",
                        'client_id'    =>"'".$id."'",
                        'client_email' =>"'".$email."'",
                        'date_debut'   =>"'".$dateDebut."'",
                        'date_fin'     =>"'".$dateFin."'",
                        'book_id'      =>$bookid,
                        'book_title'   =>"'".$booktitle."'"
                      );

                 
                     $reservation = $bookOption->reserve($inData);
                      if($reservation = 1){
                          ?>
                              <div class="alert alert-success alert-dismissable">
                                    <a href="index.php" class="btn-close"></a>
                                    <strong>Votre demande sera traiter et vous recevrez un message dans votre boite email</strong>

                              </div>


                          <?php



                      }
                      else{
                        ?>
                            <div class="alert alert-danger alert-dismissable">
                                    <a href="index.php" class="btn-close"></a>
                                    <strong>Il y a un erreur s'il vous plait repetez l'action</strong>

                              </div>

                        <?php
                      }










                }
            }
            elseif($_GET['view']=='single'){
              if(isset($_GET['bookid'])){
                $bookid = $bookOption->get_book_by_id($_GET['bookid']);
                ?>
                  <div class="single__book">
                      <div class="row p-5 book_section">
                          <?php foreach($bookid as $item){ ?>
                              <div class="col-md-6">
                                <img src="<?php echo $item['book_img'] ?>"/>
                              </div>
                              <div class="col-md-6 book_info">
                                    <h2><span>Titre de Livre: </span><?php echo $item['book_title'];?></h2>
                                    <h2><span>L'auteur: </span><?php echo $item['book_author'];?></h2>
                                    <h3><span>La description: </span></h3><p>
                                      <?php echo $item['book_desc'];?>
                                    </p>
                              </div>
                        
                          <?php
                        }
                  ?>
                      </div>
                </div>





                <?php

              }
            }
        ?>


        </div>
    </div>

  






  <?php
    include 'inc/footer.php';
  ?>