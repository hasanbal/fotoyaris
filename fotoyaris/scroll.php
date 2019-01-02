<?php
include('connect.php');

 if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
$actionfunction = $_REQUEST['actionfunction'];
  
   call_user_func($actionfunction,$_REQUEST,$conn,$limit);
}
function showData($data,$conn,$limit){
  $page = $data['page'];
   if($page==1){
   $start = 0;  
  }
  else{
  $start = ($page-1)*$limit;
  }
  
  $sql = "select * from fotolar WHERE onay=1 order by id desc  limit $start,$limit ";
  $str='';
  $data = $conn->query($sql);
  if($data!=null && $data->num_rows>0){
   while( $row = $data->fetch_array(MYSQLI_ASSOC)){
      $str.="
	  <a href='foto.php?id=".$row['id']."'><div class='col-sm-3 col-lg-3 col-md-3'>
				<div class='thumbnail'>
				<img src='".$row['foto_link']."' id='resim' alt='fotoyaris'><br>
				<div class='pull-right' id='sag' style='margin-top:3px; color:red'><span class='glyphicon glyphicon-heart'></span></div>
				<p class='pull-right' id='sag' style='margin-right:3px'>".$row['begeni']."</p>
					
					<a href='profil.php?user=".$row['username']."' class='user'><p style='text-align:left;'>".$row['username']."</p></a>
				</div>
				</div></a>
	  ";
   }
   $str.="<input type='hidden' class='nextpage' value='".($page+1)."'><input type='hidden' class='isload' value='true'>";
   }
  
   
echo $str; 

}

?>