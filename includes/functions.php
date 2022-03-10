<?php include ('includes/config.php');?>
<?php

function getCategory($conn,$id){
   $query="SELECT * FROM categories WHERE id=$id";
   $run=mysqli_query($conn,$query);
   $data = mysqli_fetch_assoc($run);
   return $data['category'];
}
function get_safe_value($conn,$str){
   if($str!=''){
      $str=trim($str);
      return mysqli_real_escape_string($conn,$str);
   }
}

function get_product($conn,$type='',$limit=''){
   $sql ="SELECT * FROM product";
   if($type=='latest'){
      $sql .=" ORDER BY id DESC";
   }
   if($limit!=''){
      $sql .=" limit $limit";
   }
   $res = mysqli_query($conn,$sql);
   while($row=mysqli_fetch_assoc($res)){
      $data[]=$row;
   }
   return $data;
}

?>