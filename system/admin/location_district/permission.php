<?php
	$get_action_permission = $connect->query("SELECT * FROM tbl_permission WHERE p_position=".$_SESSION['user']->user_position." AND p_module='$left_menu'");
	$row_action_permission = mysqli_fetch_object($get_action_permission);


    function button_add($p){
    	global $row_action_permission;
    	if($row_action_permission->p_add){
    		return '<br><div class=""> <div class="caption font-dark">'.(($p)?('<a onclick="window.close()" class="btn red"> Close <i class="fa fa-times"></i> </a>'):('')).'
            <a href="add.php?parent_id='.$p.'" id="sample_editable_1_new" class="btn green"> Add New <i class="fa fa-plus"></i> </a> </div> </div><br>';
    	}
    }
    function button_edit($id,$p){
    	global $row_action_permission;
    	if($row_action_permission->p_edit){
	        return '<a href="edit.php?edit_id='.$id.'&parent_id='.$p.'" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i></a> ';
	    }else{
	    	return '<a class="btn btn-xs btn-warning disabled" title="edit"><i class="fa fa-edit"></i></a> ';
	    }
    }
    function button_delete($id,$p){
    	global $row_action_permission;
    	if($row_action_permission->p_delete){
        	return '<a href="delete.php?del_id='.$id.'&parent_id='.$p.'" onclick="return confirm(\'Are you sure to delete this?\')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-trash"></i></a> ';
        }else{
        	return '<a class="btn btn-xs btn-danger disabled" title="delete"><i class="fa fa-trash"></i></a> ';
        }
    }
    function allow_view(){
    	global $row_action_permission;
    	if(!$row_action_permission->p_view){
    		exit();
    	}
    }
    allow_view();
?>