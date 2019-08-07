<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Redirect;

class PostModel extends Model
{
    public function createModel($data)
    {
    	$insert = DB::table('posts')->insert($data);
    	if(!empty($insert)){
    		
    		return redirect('viewPost/'.$data['user_id'])->with('sessia', 'post added successfully');
    		
    	}
    }

    public function storeModel($id)
    {
    	return DB::table('posts')->where('user_id', $id)->paginate(5);

    }

    public function editModel($id)
    {
       return DB::table('posts')->where('id', $id)->first();
    }

    public function updateModel($updateData, $id)
    {
        $update = DB::table('posts')->where('id', $id)->update($updateData);
        if(!empty($update)){
            return redirect('viewPost/'.$updateData['user_id'])->with('sessia', 'post updated successfully');
        }
    }

    public function destroyModel($id)
    {
        return DB::table('posts')->where('id', $id)->delete();
    }

    public function searchModel($search)
    {
        return  DB::table('posts')->where ( 'title', 'LIKE', '%' . $search . '%' )->orWhere ( 'description', 'LIKE', '%' . $search . '%' )->get ();
    }
}
