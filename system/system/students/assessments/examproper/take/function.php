<?php
function product_exists($q_id,$answer,$q){
    // $q_id=intval($q_id); 
    $max=count($_SESSION['gcCart']);
    $flag=0;
    for($i=0;$i<$max;$i++){
      if($q_id==$_SESSION['gcCart'][$i]['q_id']){
          if($q>0  && $q<=999){
            # code...
            $flag=1;
             $_SESSION['gcCart'][$i]['answer']= $answer; 
              break;
          }
        // $flag=1;
        // message("Item is already in the cart.","error");
        // break; 

          
      }
    }
    return $flag;
  }
 function addtocart($q_id,$answer,$q,$access_code){
    // if($q_id<1 or $q<1) return;
    // if($q<1) return;
    if (!empty($_SESSION['gcCart'])){

    if(is_array($_SESSION['gcCart'])){
      if(product_exists($q_id,$answer,$q)) return;
      $max=count($_SESSION['gcCart']);
      $_SESSION['gcCart'][$max]['q_id']=$q_id;
      $_SESSION['gcCart'][$max]['answer']=$answer;
      $_SESSION['gcCart'][$max]['qty']=$q; 
      $_SESSION['gcCart'][$max]['access_code']=$access_code; 
    }
    else{
     $_SESSION['gcCart']=array();
      $_SESSION['gcCart'][0]['q_id']=$q_id;
      $_SESSION['gcCart'][0]['answer']=$answer;
      $_SESSION['gcCart'][0]['qty']=$q; 
      $_SESSION['gcCart'][0]['access_code']=$access_code; 
    }
}else{
     $_SESSION['gcCart']=array();
      $_SESSION['gcCart'][0]['q_id']=$q_id;
      $_SESSION['gcCart'][0]['answer']=$answer;
      $_SESSION['gcCart'][0]['qty']=$q; 
      $_SESSION['gcCart'][0]['access_code']=$access_code; 
}
	 
}
function removetocart($q_id){
	// $q_id=intval($q_id);
	$max=count($_SESSION['gcCart']);
	for($i=0;$i<$max;$i++){
		if($q_id==$_SESSION['gcCart'][$i]['q_id']){
			unset($_SESSION['gcCart'][$i]);
			break;
		}
	}
	$_SESSION['gcCart']=array_values($_SESSION['gcCart']);
}


 function editproduct($q_id,$answer,$q){
    // $q_id=intval($q_id); 
  // if($q<1) return;
    if (!empty($_SESSION['gcCart'])){
       if(is_array($_SESSION['gcCart'])){
          $max=count($_SESSION['gcCart']);
          $flag=0;
          for($i=0;$i<$max;$i++){
            if($q_id==$_SESSION['gcCart'][$i]['q_id']){
                if($q>0  && $q<=999){
                  # code...
                  $flag=1;
                   $_SESSION['gcCart'][$i]['answer']= $answer; 
                    break;

                    echo  $_SESSION['gcCart'][$i]['answer'];
                }
              // $flag=1;
              // message("Item is already in the cart.","error");
              // break;
            }
          }
          return $flag;
        }
      }
    }
 


?>
