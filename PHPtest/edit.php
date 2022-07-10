<?php
	require "condb.php";
?>
<?php
	if( isset($_GET["id"])){
	 $id =$_GET["id"] ;
	}
  include("class/handlepro.php");
  $p = new tmdt;
 

?>
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
    <h2>Sửa Sản Phẩm</h2>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


<?php 

$sql = "SELECT * FROM thick WHERE id = $id" ;
$qr = mysql_query($sql);
$rows = mysql_fetch_array($qr);
?>


<?php
  if(isset ($_POST["sua"])){
    $ten = $_POST["txtten"] ;
    $hinh = $_POST["txthinh"] ;
    $phanloai = $_POST["phanloai"] ;
    $mota = $_POST["mota"] ;

    if( $ten == ""){echo " ten Khong Duoc de trong ! </br?>";}
    if( $hinh == ""){echo " hinh  Khong Duoc de trong ! </br?>";}
    
    if ( $ten !="" && $hinh !=""){
      $sql = " UPDATE thick SET ten_sp = '$ten' ,  hinh= '$hinh' ,phanloai='$phanloai' , mota='$mota'  where id = $id" ; 
      $qr = mysql_query($sql);
      header("location: index.php") ;
    }

  }

?>
<div class="container">
  <div class="row">
    <div class="col">
     
<form method="POST" >
 <label for="">Tên Sản Phẩm</label> <input class="form-control" type="text" name="txtten" value="<?php echo $rows['ten_sp'] ?>"></br>
  <label for="">Hình Ảnh</label></br><input class="form-control"  type="text" name="txthinh" value="<?php echo $rows['hinh'] ?>"> 
  <label for="">Phân Loại</label> </br><input class="form-control"  type="text" name="phanloai" value="<?php echo $rows['phanloai'] ?>"> 
  <label for="">Mô Tả</label> </br><input class="form-control"  type="text" name="mota" value="<?php echo $rows['mota'] ?>"> 
  </br></br>



  <input class="adwd" type="submit" name="sua" value="Sửa"> 
</form>
    </div>
    <div class="col">
      <img src="<?php echo $rows['hinh'] ?>" alt="">
    </div>
  </div>
  </div>
</div>




<style>

</style>



























 <style>
      .sss{
        padding-left : 10px ;
        width : 50px ;
        height: 30px ;
        color: blue ;

      }
    </style>