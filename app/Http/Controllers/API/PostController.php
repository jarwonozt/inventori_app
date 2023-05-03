<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post\PostArticles;
use App\Models\Post\PostComment;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(){
        $data = array();

        $posts = PostArticles::where('status', true)->orderByDesc('comment_count')->get();

        $data['counter'] = $posts->count();

        foreach($posts as $k=>$post){
            $data['article'][$k]['id']             = $post->id;
            $data['article'][$k]['title']          = $post->title;
            $data['article'][$k]['slug']           = $post->slug;
            $data['article'][$k]['content']        = $post->content;
            $data['article'][$k]['image']          = $post->image;
            $data['article'][$k]['status']         = $post->status;
            $data['article'][$k]['type']           = $post->type;
            $data['article'][$k]['like_count']     = $post->like_count;
            $data['article'][$k]['comment_count']  = $post->comment_count;
            $data['article'][$k]['counter']        = $post->counter;
            $data['article'][$k]['created_at']     = $post->created_at;
            $data['article'][$k]['updated_at']     = $post->updated_at;
            $data['article'][$k]['author']         = $post->getUser->name;
            $data['article'][$k]['category']       = $post->getCategory->name;
            // $data['article'][$k]['comment']        = PostComment::where('article_id', $post->id)->orderByDesc('created_at')->get();
        }

        return response([
            'success' => true,
            'message' => 'Data Komentar Artikel',
            'data' => $data
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($slug)
    {
        $data = array();

        try {
            $post = PostArticles::where('slug', $slug)->where('status', true)->first();

            $data['article']['id']             = $post->id;
            $data['article']['title']          = $post->title;
            $data['article']['slug']           = $post->slug;
            $data['article']['content']        = $post->content;
            $data['article']['image']          = $post->image;
            $data['article']['status']         = $post->status;
            $data['article']['type']           = $post->type;
            $data['article']['like_count']     = $post->like_count;
            $data['article']['comment_count']  = $post->comment_count;
            $data['article']['counter']        = $post->counter;
            $data['article']['created_at']     = $post->created_at;
            $data['article']['updated_at']     = $post->updated_at;
            $data['article']['author']         = $post->getUser->name;
            $data['article']['category']       = $post->getCategory->name;

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Detail Artikel.',
                    'data'    => $data
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Artikel Tidak Ditemukan.',
                    'data'    => ''
                ], 401);
            }
        } catch (Exception $error) {
            return response()->json([
                'success' => false,
                'message' => 'Artikel Tidak Ditemukan.',
                'data'    => ''
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
