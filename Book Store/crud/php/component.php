<?php

function inputElement($icon,$placeholder,$name,$value){

    echo '
    <div class="input-group mb-2">
    <div class="input-group-prepend">
         <div class="input-group-text bg-warning"><i class="' .$icon. ' fa-lg"></i></div>
    </div>
    <input type="text" name="' .$name. '" value="' .$value. '" class="form-control" id="inlineFormInputGroup" placeholder=" '.$placeholder.'" autocomplete="off">
</div>
    ';
    

}


function buttonComponent($id,$name,$class,$text,$attr){

    echo '
    
    <button id="'.$id.'" name="'.$name.'" class="btn '.$class.'" '.$attr.'  > '.$text.' </button>
    
    ';

}

// function tableRowComponent($id,$name,$publisher,$price){
//     echo '
//     <tr>
//     <th scope="row">'.$id.'</th>
//     <td>'.$name.'</td>
//     <td>'.$publisher.'</td>
//     <td><i class=" fas fa-dollar-sign"> '.$price.'</i></td>
//     <td ><i class="btnEdit fas fa-edit" name="edit"></i></td>
//     </tr>
    
    
//     ';
// }
?>