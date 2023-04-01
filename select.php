<?php
    $id=$_POST['id'];

    $con=mysqli_connect("localhost","root","","planetdb");
    $query="SELECT * FROM plants WHERE id=$id";
    $result=mysqli_query($con,$query);
    
    while ($k=mysqli_fetch_array($result)) {
        ?>
        <h2 class="text-uppercase"><?= $k['names'];?></h2><br>
        <img src = img/<?= $k['image'];?> class="img-fluid d-block mx-auto" width="400" height="400"/>
        <p><?= $k['discription'];?></p>
        <ul class="list-inline">
          <li class= "li">
            <strong>ชนิดของต้นไม้ :</strong>
              <?= $k['type'];?> 
          </li>
          <li class= "li">
            <strong>ราคา :</strong>
              <?= $k['price'];?> บาท
          </li>
        </ul>
        <?php } ?>
        <button class="btn btn-info" data-bs-dismiss="modal" type="button">
                              <i class="fas fa-times me-1"></i>
                              ปิด
                            </button>

