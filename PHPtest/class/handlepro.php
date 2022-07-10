
<?php
include("uploadproduct.php") ;

class tmdt extends myfile {
    private function connect(){
        $con = mysql_connect("localhost", "thuctap", "123456");
        if(!$con ){
                echo " Khong co ket noi csdl" ;
                exit();
                    
        }
        else
        {	
            mysql_select_db("dbthicuoiky");
            mysql_query("SET NAME UTF8");
            return $con;	
                1 ; 
        }		
        
    }
    // them xoa sua
    
    public function themxoasua($sql)
		{
			$link=$this->connect();
			if (mysql_query($sql,$link))
				{
					return 1 ;
						
				}
			else
				{
					
					return 0 ;
				}
			
		}
    public function load_ds_sanpham($sql)
		{
			$link= $this-> connect() ;
			$ketqua = mysql_query($sql,$link);
			mysql_close($link);
			$i=mysql_num_rows($ketqua);
			if($i>0)
			{	echo '';
			$dem=1;
				while ($row=mysql_fetch_array($ketqua))
				{
					$id = $row['id'];
					$tensp= $row ['ten_sp'];

					$hinh= $row ['hinh'];
				
				echo'<tr>
					<td>'.$dem.'</a></td>
				<td><a href="?id='.$id.'">'.$tensp.'</a></td>
				<td><a href="?id='.$id.'">'.$gia.'</a></td>
				<td>  <img src="'.$hinh.'" width="200px" alt="">
        </td>

				
				  </tr>';
				  $dem++ ;
				}	
				echo '</table>';
				
			}
			else {
				
				echo 'khong co du lieu ';
				}
					
		}
    // load san pham 
    public function loadsanpham($sql)
    {
        $link= $this-> connect() ;
        $ketqua = mysql_query($sql,$link);
        mysql_close($link);
        $i=mysql_num_rows($ketqua);
        if($i>0)
        {	
            echo '
            <table class="table">
            <thead>
              <tr>
                <th scope="col">IMAGE</th>
                <th scope="col">PRODUCCT NAME</th>
                <th scope="col">CATEGORY</th>
                <th scope="col">OPRATIONS</th>

               
              </tr>
            </thead>' ; 
            while ($row=mysql_fetch_array($ketqua))
            {
                $id = $row['id'];
                $tensp= $row ['ten_sp'];
                $gia = $row['gia'];
                $mota = $row['mota'];
                $hinh = $row['hinh'];
                echo '
               
                <tbody>
                  <tr>
                  <td><img src="'.$hinh.'" width="150" height="150" /></td>
                    <th scope="row">1</th>
                    <td>'.$mota.'</td>
                    <td>
                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal1">
                    <a href="><ion-icon class="sss" data-target="#exampleModal"  name="create-outline"></ion-icon>
                  </a>
                    </button>
                  <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                    <ion-icon class="sss" name="trash-outline"></ion-icon> </a>
                  </button>
                  <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal3">
                  <a href=> <ion-icon class="sss" name="add-outline"></ion-icon> </a>
                  </button>
               
                    </td>
                
  

              
                </tbody>
              
                ' ; 
            }	
            echo '
            
            </table>  ';

        }
        else {
            
            echo 'khong co du lieu ';
            }
                
    }
    public function loadcombox_congty($sql,$idchon)
		{
			$link= $this-> connect() ;
			$ketqua = mysql_query($sql,$link);
			mysql_close($link);
			$i=mysql_num_rows($ketqua);
			if($i>0)
			{	
				echo  ' <select name="congty" id="congty">';
				echo '  <option>Moi choon</option>';
				
				while ($row=mysql_fetch_array($ketqua))
				{
					$id = $row['id'];
					$tencty= $row ['tencty'];
					if($id==$idchon)
					{
						
						echo '<option> value"'.$id.'" selected="selected">'.$tencty
						.'</option>';	
					}
					else{echo ' <option value="'.$id.'">'.$tencty.'</option>';};
					
				}	
			echo '</select>';
			}
					
		}
}
?>