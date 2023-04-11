<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"
    defer></script>
    <link rel="stylesheet" href="home.css">

    <title>home</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Reservatin</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control" type="search" placeholder="Search" aria-label="Search">
              <button class="btn Reservebtn text-white" type="submit">Search</button>
            </form>
            <button type="button"  class="btn btn-warning mlistbtn ms-3 text-white" data-bs-target="#addModalL" data-bs-toggle="modal">Add Book</button>
<!-- Modal add -->
<div class="modal fade" id="addModalL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content h-25">
        <div class="modal-body bgmodal">
          <form action="add.php" method="post" id="addform" class="addform" enctype="multipart/form-data">
            <h2>Ajouter l'anonce</h2>
            <div class=" form-controll secondary-image-wrapper file-input d-md-flex flex-column justify-content-center align-items-center mb-3 w-25 h-25 d-flex">
              <img id="addicon1" class="addicon1" src="../imgs/cloud-upload.svg" alt="Upload Icon" />
              <input type="file" name="images[]" class="addfileUpload addprimaryUpload" id="addfileUpload" />
              <img class="previewImage addpreviewImage1" id="addpreviewImage1" src="#" alt="Image Preview" />
              <i class="fas fa-check-circle"></i>
              <i class="fas fa-exclamation-circle"></i>
              <small>Error message</small>
            </div>
            <div class="d-flex flex-wrap gap-3">
              <div class="form-controll ">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" name="title" class="form-control addtitle " id="addtitle">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>

              </div>
              <div class="form-controll">
                <label for="exampleFormControlInput1" class="form-label">Author Name</label>
                <input type="text" name="authorname" class="form-control addauthorname" id="addauthorname">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
              </div>
              <div class="form-controll">
                <label for="exampleFormControlInput1" class="form-label">Type</label>
                <select class="form-select addtype" name="type" id="addtype" onchange="showTypeFields()">
                  <option selected disabled>Type</option>
                  <option value="Book">Book</option>
                  <option value="Novel">Novel</option>
                  <option value="DVD">DVD</option>
                  <option value="Research paper/thesis">Research paper/thesis</option>
                  <option value="Magazine">Magazine</option>
                </select>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
              </div>
              <div class="form-controll" id="addpagesField" style="display:none">
                <label for="pages">Nombre de pages:</label>
                <input type="number" class="addpages" id="addpages" name="pages"><br><br>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
              </div>

              <div class="form-controll" id="adddurationField" style="display:none">
                <label for="duration">Durée (en minutes):</label>
                <input type="number" class="addduration" id="addduration" name="duration"><br><br>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
              </div>
              <div class="form-controll">
                <label for="exampleFormControlInput1" class="form-label">Edition Date</label>
                <input type="date" name="editiondate" class="form-control addeditiondate" id="addeditiondate">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>

              </div>
              <div class="form-controll">
                <label for="exampleFormControlInput1" class="form-label">Buy Date</label>
                <input type="date" name="buydate" class="form-control addbuydate" id="addbuydate">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>

              </div>
              <div class="form-controll">
                <label for="exampleFormControlInput1" class="form-label">State</label>
                <select class="form-select addstate" name="state" id="addstate">
                  <option selected disabled>Choose</option>
                  <option value="New">New</option>
                  <option value="Good condition">Good condition</option>
                  <option value="Acceptable">Acceptable</option>
                  <option value="Quite worn">Quite worn</option>
                  <option value="Torn ">Torn </option>
                </select>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
              </div>
            </div>
            <div class="justify-content-center d-flex">
              <button name="addBtn" value="submit" type="submit" class="btn buttons" id="addBtn">Ajouter</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="d-flex flex-wrap gap-3">
  
 
          </div>
        </div>
      </nav> 
      <div class="featurebook">
        <h2>NEW <span class="c1">PRODUCTS</span></h2>
        <p>On sait depuis longtemps que travailler avec du texte 
          lisible et contenant du</p>

       <div class="card">
         <div class="card-image">
           <img class="" src="https://img.freepik.com/vecteurs-libre/portrait-abstrait-design-plat-dans-style-artistique_23-2149123797.jpg?t=st=1659428436~exp=1659429036~hmac=3b06ab791fa57b831cae6318b7000247f282249652290cc19df86e6953f232d4" alt="">
         </div>
         <div class="card-content">
           <div class="card-text">
             <div class="card-title">
               Card title
             </div>
             <div class="card-subtitle">
               Card subtitle
             </div>
             <div class="card-sentence">
               Card sentence<br>
               You can write something...
             </div>
             <div class="card-buttons">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deletee">delete</button>      
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit">update</button>       
</div>
           </div>
         </div>
       </div>
                 </div>
    
        <!-- Modal delete -->
      <div class="modal" id="deletee"tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content h-25">
            <div class="modal-body texte-white bgmodal">
              <h3>étes vous sure de vouloir supprimer</h3>
              <form method="post" action="delete.php">
                <input type="hidden" name="btndelete" value="<?php echo $card->getId(); ?>" id="delete_id">
                <button type="submit" name="delete">Supprimer</button>
                <button type="button" class="btn btn-secondary buttons" data-bs-dismiss="modal">Annuler</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- edit modal -->
      <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content h-25">
            <div class="modal-body bgmodal">
              <form action="update.php" method="POST" id="editform" enctype="multipart/form-data">
                <h2>Ajouter l'anonce</h2>
                <div class=" form-controll secondary-image-wrapper file-input d-md-flex flex-column justify-content-center align-items-center mb-3 w-25 h-25 d-flex">
                  <img id="editicon1" src="../imgs/cloud-upload.svg" alt="Upload Icon" />
                  <input type="file" name="images[]" id="editfileUpload" value="<?php echo $card->getImage(); ?>"/>
                  <input type="hidden" name="collection_code" value="<?php echo $card->getId(); ?>">
                  <input type="hidden" name="old_image" value="<?php echo $card->getImage(); ?>">
                  <img class="previewImage" id="editpreviewImage1" src="<?php echo $card->getImage(); ?>" alt="Image Preview" width="100" style="display: block;" />
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <small>Error message</small>
                </div>
                <div class="d-flex flex-wrap gap-3">
                  <div class="form-controll ">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="edittitle" value="<?php echo $card->getTitle(); ?>">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>

                  </div>
                  <div class="form-controll">
                    <label for="exampleFormControlInput1" class="form-label">Author Name</label>
                    <input type="text" name="authorname" class="form-control" id="editauthorname" value="<?php echo $card->getAuthorname(); ?>">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                  </div>
                  <div class="form-controll">
                    <label for="exampleFormControlInput1" class="form-label">Type</label>
                    <select class="form-select" name="type" id="edittype">
                      <option selected disabled>Type</option>
                      <option value="Book" <?php if ($card->getType() == 'Book') {echo 'selected';} ?>>Book</option>
                      <option value="Novel" <?php if ($card->getType() == 'Novel') {echo 'selected';} ?>>Novel</option>
                      <option value="DVD" <?php if ($card->getType() == 'DVD') {echo 'selected';} ?>>DVD</option>
                      <option value="Research paper/thesis" <?php if ($card->getType() == 'Research paper/thesis') {echo 'selected';} ?>>Research paper/thesis</option>
                      <option value="Magazine" <?php if ($card->getType() == 'Magazine') {echo 'selected';} ?>>Magazine</option>
                    </select>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                  </div>
                  <div class="form-controll" id="editpagesField" style="display:none">
                    <label for="pages">Nombre de pages:</label>
                    <input type="number" id="editpages" name="pages" value="<?php echo $card->getPagesOrDuration(); ?>"><br><br>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                  </div>

                  <div class="form-controll" id="editdurationField" style="display:none">
                    <label for="duration">Durée (en minutes):</label>
                    <input type="number" id="editduration" name="duration" value="<?php echo $card->getPagesOrDuration(); ?>" ><br><br>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                  </div>
                  <div class="form-controll">
                    <label for="exampleFormControlInput1" class="form-label">Edition Date</label>
                    <input type="date" name="editiondate" class="form-control" id="editeditiondate" value="<?php echo $card->getEditionDate(); ?>">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>

                  </div>
                  <div class="form-controll">
                    <label for="exampleFormControlInput1" class="form-label">Buy Date</label>
                    <input type="date" name="buydate" class="form-control" id="editbuydate" value="<?php echo $card->getBuyDate(); ?>">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>

                  </div>
                  <div class="form-controll">
                    <label for="exampleFormControlInput1" class="form-label">State</label>
                    <select class="form-select" name="state" id="editstate">
                      <option selected disabled>Choose</option>
                      <option value="New" <?php if ($card->getState() == 'New') {echo 'selected';} ?>>New</option>
                      <option value="Good condition" <?php if ($card->getState() == 'Good condition') {echo 'selected';} ?>>Good condition</option>
                      <option value="Acceptable" <?php if ($card->getState() == 'Acceptable') {echo 'selected';} ?>>Acceptable</option>
                      <option value="Quite worn" <?php if ($card->getState() == 'Quite worn') {echo 'selected';} ?>>Quite worn</option>
                      <option value="Torn" <?php if ($card->getState() == 'Torn') {echo 'selected';} ?>>Torn </option>
                    </select>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                  </div>
                </div>
                <div class="justify-content-center d-flex">
                  <button name="addBtn" value="submit" type="submit" class="btn buttons" id="addBtn">update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- add modal -->
    <div class="modal fade" id="addModalL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content h-25">
          <div class="modal-body bgmodal">
            <form action="add.php" method="post" id="addform" enctype="multipart/form-data">
              <h2>Ajouter l'anonce</h2>
              <div class=" form-controll secondary-image-wrapper file-input d-md-flex flex-column justify-content-center align-items-center mb-3 w-25 h-25 d-flex">
                <img id="addicon1" src="../images/cloud-upload.svg" alt="Upload Icon" />
                <input type="file" name="images[]" id="addfileUpload" />
                <img class="previewImage" id="addpreviewImage1" src="#" alt="Image Preview" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
              </div>
              <div class="d-flex flex-wrap gap-3">
                <div class="form-controll ">
                  <label for="exampleFormControlInput1" class="form-label">Title</label>
                  <input type="text" name="title" class="form-control" id="addtitle">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <small>Error message</small>
  
                </div>
                <div class="form-controll">
                  <label for="exampleFormControlInput1" class="form-label">Author Name</label>
                  <input type="text" name="authorname" class="form-control" id="addauthorname">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <small>Error message</small>
                </div>
                <div class="form-controll">
                  <label for="exampleFormControlInput1" class="form-label">Type</label>
                  <select class="form-select" name="type" id="addtype" onchange="showTypeFields()">
                    <option selected disabled>Type</option>
                    <option value="Book">Book</option>
                    <option value="Novel">Novel</option>
                    <option value="DVD">DVD</option>
                    <option value="Research paper/thesis">Research paper/thesis</option>
                    <option value="Magazine">Magazine</option>
                  </select>
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <small>Error message</small>
                </div>
                <div class="form-controll" id="addpagesField" style="display:none">
                  <label for="pages">Nombre de pages:</label>
                  <input type="number" id="addpages" name="pages"><br><br>
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <small>Error message</small>
                </div>
  
                <div class="form-controll" id="adddurationField" style="display:none">
                  <label for="duration">Durée (en minutes):</label>
                  <input type="number" id="addduration" name="duration"><br><br>
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <small>Error message</small>
                </div>
                <div class="form-controll">
                  <label for="exampleFormControlInput1" class="form-label">Edition Date</label>
                  <input type="date" name="editiondate" class="form-control" id="addeditiondate">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <small>Error message</small>
  
                </div>
                <div class="form-controll">
                  <label for="exampleFormControlInput1" class="form-label">Buy Date</label>
                  <input type="date" name="buydate" class="form-control" id="addbuydate">
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <small>Error message</small>
  
                </div>
                <div class="form-controll">
                  <label for="exampleFormControlInput1" class="form-label">State</label>
                  <select class="form-select" name="state" id="addstate">
                    <option selected disabled>Choose</option>
                    <option value="New">New</option>
                    <option value="Good condition">Good condition</option>
                    <option value="Acceptable">Acceptable</option>
                    <option value="Quite worn">Quite worn</option>
                    <option value="Torn ">Torn </option>
                  </select>
                  <i class="fas fa-check-circle"></i>
                  <i class="fas fa-exclamation-circle"></i>
                  <small>Error message</small>
                </div>
              </div>
              <div class="justify-content-center d-flex">
                <button name="addBtn" value="submit" type="submit" class="btn buttons" id="addBtn">Ajouter</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex flex-wrap gap-3">
</body>
</html>