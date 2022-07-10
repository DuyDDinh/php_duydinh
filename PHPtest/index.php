
<?php
require "condb.php" ; 
if( isset($_GET["id"])){
  $id =$_GET["id"] ;
 }
 include("class/handlepro.php");
 $p = new tmdt;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <h1>Dinh Van Duy!</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
  <?php 
  ?>

      
     <form  method="POST">
     <div class="input-group rounded">
          <input type="text" name="tukhoa" placeholder="Nhập từ tìm kiếm ">
          <input type="submit" name="timkiem" value="Tìm">     
        </div>  
     </form>
    <?php
      switch ($_POST['timkiem']) {
        case 'Tìm':{
          $idtim =$_REQUEST['tukhoa'];
          $p->load_ds_sanpham("select *from thick  where ten_sp= '$idtim' ");
        }
      }      
     ?>
<table class="table">
            <thead>
              <tr>
                <th scope="col">Tên sản ph</th>
                <th scope="col">IMAGE</th>
                <th scope="col">Thể loại</th>
                <th scope="col">EDIT</th>
                <th scope="col">OPRATIONS</th>
               

              </tr>
            </thead>
        <?php
          $sql = "SELECT * FROM thick" ; 
          $qr = mysql_query($sql) ;
          while($rows= mysql_fetch_array($qr)){

              
   
        ?>


      <tr>
        <td> <?php echo  $rows['ten_sp']?></td>

        <td> <img src="<?php echo $rows['hinh']?>" width="100px" alt=""></td>
        <td> <?php echo  $rows['phanloai']?></td>

        <td > <A href="edit.php?id=<?php  echo $rows['id']?>"><ion-icon class="sss" data-target="#exampleModal"  name="create-outline"></ion-icon> </td>
        <td>
          <!-- THEM san pham -->
        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal3">
        
          <ion-icon class="sss" name="add-outline"></ion-icon>
          </button> 

        <!-- Xoa -->
           
          <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
          <a href="xoa.php?id=<?php  echo $rows['id']?>">
          <ion-icon class="sss" name="trash-outline"></ion-icon> 
          </a></button>
       


      </tr>


      <?php } ?>
    </table>
    <?php
    include("phantrang.php");
    ?>

 
    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form method="POST" action="">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">THÊM SẢN PHẨM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <form>
                  <div class="form-group">
                  <label for="exampleInputPassword1">NAME PRODUCT</label>
                  
                  <input type="text" class="form-control" name="txtname" id="txtname" placeholder="Dinh Van Duy">
                  <small id="emailHelp" class="form-text text-muted">* tên không được để trống </small>

                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Phân Loại</label>
                  <input type="txthinh" name="txtphanloai" class="form-control" id="txtphanloai" aria-describedby="emailHelp" placeholder=" Sách Tham Khảo">
                </div>
                <div class="form-group">
                  <!-- Lấy ảnh bằng link image adrress  vd: https://cdn0.fahasa.com/media/catalog/product/c/o/combo-1_2_3.jpg -->
                  <label for="exampleInputEmail1">Hình Ảnh </label>
                  <input type="txthinh" name="txthinh" class="form-control" id="txthinh" aria-describedby="emailHelp" placeholder="vd: anbc.jpg">
                  <small id="emailHelp" class="form-text text-muted"> </small>
                </div>
             
        
                <input type="submit" name="nut" id="nut" value="ADD" /> 
                  </form>
                  </div>
                  
                </div>
              </div>
</form> 
       </div>



              <?php
  	switch ($_POST['nut'])
	{
			case "ADD" :{
				
				$ten =$_REQUEST['txtname'];
				$hinh =$_REQUEST['txthinh'];
				$phanloai =$_REQUEST['txtphanloai'];

    
          if($p->themxoasua("INSERT INTO thick(ten_sp,hinh,phanloai)
           VALUES ('$ten', '$hinh','$phanloai')")==1)
                {
                    echo '' ; 
                }
                  else{
                 
                  
                    }
                  }
     
            
      
  }
	
  ?>

<form method="POST" action="">

      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <?php 

                          $sql = "SELECT * FROM thick WHERE id = $id" ;
                          $qr = mysql_query($sql);
                          $rows = mysql_fetch_array($qr);
                          ?>
                          <form method="POST" action="">
                          <table class="table">
                                      <thead>
                                        <tr>
                                         

                                        
                                        </tr>
                                      </thead>

                          <label for=""> NAME </label> <input type="text" value="<?php echo $rows['ten_sp']?>"> </br>
                          <label for=""> HINH </label> <input type="text" value="<?php echo $rows['hinh']?>"> </br>

                          </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger"> Xóa</button>
                  </div>
                </div>
              </div>
            </div>

</form>
</body>
</html>

<style>
      .sss{
        padding-left : 10px ;
        width : 50px ;
        height: 30px ;
        color: blue ;

      }
    </style>