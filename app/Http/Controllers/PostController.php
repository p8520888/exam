<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Post;
use Exception;

class PostController extends Controller
{
    public function view($id)
    {
        $post = Post::where('id', $id)->first();
        if (!$post) {
            throw new Exception('找不到該貼文');
        }

        return [
            'status' => 'ok',
            'message' => '查詢成功',
            'post' => $post->toArray(),
        ];
    }

    public function store(CreateRequest $request)
    {
        $post = Post::create(['content' => $request->content]);

        return [
            'status' => 'ok',
            'message' => '新增成功',
            'post' => $post->toArray(),
        ];
    }

    public function update(UpdateRequest $request, $id)
    {
        $post = Post::where('id', $id)->first();
        if (!$post) {
            throw new Exception('找不到該貼文');
        }
        $post->update(['content' => $request->content]);

        return [
            'status' => 'ok',
            'message' => '修改成功',
            'post' => $post->toArray(),
        ];
    }

    public function delete($id)
    {
        $post = Post::where('id', $id)->first();
        if (!$post) {
            throw new Exception('找不到該貼文');
        }
        $post->delete();

        return [
            'status' => 'ok',
            'message' => '刪除成功',
        ];
    }
}
