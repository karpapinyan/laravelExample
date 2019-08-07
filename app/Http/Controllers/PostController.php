<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostModel;
use DB;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $model;
    public function __construct()
    {
        $this->model = new PostModel();
    }

    public function index()
    {
        return view('post');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = array();
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['user_id'] = $request->user_id;

       return $this->model->createModel($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $show = $this->model->storeModel($id);
        return view('viewPost')->with('result',$show);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editPost = $this->model->editModel($id);
        return view('edit')->with('edit', $editPost);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = array();
        $updateData['title'] = $request->title;
        $updateData['description'] = $request->description;
        $updateData['user_id'] = $request->user_id;
        return $this->model->updateModel($updateData, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->model->destroyModel($id);
        return redirect('viewPost/'. Auth::user()->id)->with('session', 'post deleted successfully');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $user = $this->model->searchModel($search);
        return view('search')->with('search_result',$user);

    }
}
