<?php
function product_exists($pid,$answer){
    // $pid=intval($pid); 
    $max=count($_SESSION['gcCart']);
    $flag=0;
    for($i=0;$i<$max;$i++){
      if($pid==$_SESSION['gcCart'][$i]['q_id']){
          if($q>0  && $q<=999){
            # code...
            $flag=1; 
            $_SESSION['gcCart'][$i]['answer']=$answer;  
              break;
          } 
          
      }
    }
    return $flag;
  }
 function addtocart($pid,$answer,$a,$b,$c,$d,$correct_answer,$attachment){
    // if($pid<1 or $q<1) return;
    if($q<1) return;
    if (!empty($_SESSION['gcCart'])){


    if(is_array($_SESSION['gcCart'])){
      if(product_exists($pid,$answer)) return;
      $max=count($_SESSION['gcCart']);
      $_SESSION['gcCart'][$max]['q_id']=$pid; 
      $_SESSION['gcCart'][$max]['answer']=$answer; 
      $_SESSION['gcCart'][$max]['ans_a']=$a;  
      $_SESSION['gcCart'][$max]['ans_b']=$b;  
      $_SESSION['gcCart'][$max]['ans_c']=$c;  
      $_SESSION['gcCart'][$max]['ans_d']=$d;   
      $_SESSION['gcCart'][$max]['correct_answer']=$correct_answer;  
      $_SESSION['gcCart'][$max]['$attachment']=$attachment;    
    }
    else{
     $_SESSION['gcCart']=array();
      $_SESSION['gcCart'][0]['q_id']=$pid; 
      $_SESSION['gcCart'][$max]['answer']=$answer; 
      $_SESSION['gcCart'][$max]['ans_a']=$a;  
      $_SESSION['gcCart'][$max]['ans_b']=$b;  
      $_SESSION['gcCart'][$max]['ans_c']=$c;  
      $_SESSION['gcCart'][$max]['ans_d']=$d;   
      $_SESSION['gcCart'][$max]['correct_answer']=$correct_answer;  
      $_SESSION['gcCart'][$max]['$attachment']=$attachment;   
    } 
}else{
     $_SESSION['gcCart']=array();
      $_SESSION['gcCart'][0]['q_id']=$pid;
      $_SESSION['gcCart'][$max]['answer']=$answer; 
      $_SESSION['gcCart'][$max]['ans_a']=$a;  
      $_SESSION['gcCart'][$max]['ans_b']=$b;  
      $_SESSION['gcCart'][$max]['ans_c']=$c;  
      $_SESSION['gcCart'][$max]['ans_d']=$d;   
      $_SESSION['gcCart'][$max]['correct_answer']=$correct_answer;  
      $_SESSION['gcCart'][$max]['$attachment']=$attachment;   
    }
}
	
 
function removetocart($pid){
	// $pid=intval($pid);
	$max=count($_SESSION['gcCart']);
	for($i=0;$i<$max;$i++){
		if($pid==$_SESSION['gcCart'][$i]['q_id']){
			unset($_SESSION['gcCart'][$i]);
			break;
		}
	}
	$_SESSION['gcCart']=array_values($_SESSION['gcCart']);
}


 function editproduct($pid,$answer){
    // $pid=intval($pid); 
  if($q<1) return;
    if (!empty($_SESSION['gcCart'])){
       if(is_array($_SESSION['gcCart'])){
          $max=count($_SESSION['gcCart']);
          $flag=0;
          for($i=0;$i<$max;$i++){
            if($pid==$_SESSION['gcCart'][$i]['q_id']){
                if($q>0  && $q<=999){
                  # code...
                  $flag=1;
                  $_SESSION['gcCart'][$max]['answer']=$answer;  
                    break;
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