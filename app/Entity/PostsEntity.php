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
    	$obj = new ParentModel($data);
    	auth()->user()->posts()->save($obj);
    	return $obj->title;
    }
}
