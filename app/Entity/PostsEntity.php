<?php

namespace App\Entity;

use App\Models\Posts as ParentModel;
use DB;

class PostsEntity
{
    //
    public function create($data = array())
    {
    	# code...
    	$obj = ParentModel::create($data);
        // var_dump($obj->title); exit();
    	return $obj->title;
    }
}
