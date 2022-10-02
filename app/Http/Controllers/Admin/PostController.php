<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Http\Requests\PostCreateRequest;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Post::query()
                    ->orderBy('updated_at', 'desc')
                    ->paginate(config('const.pagination.default'));

        return view('admin.post.index', compact('items'));
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $item = new Post;
        $postStatus = \PostStatus::toArray();

        return view('admin.post.add', compact('item', 'postStatus'));
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PostCreateRequest $request)
    {
        try {

            $this->toTable($request);

            return redirect()->route('admin.post.index')->with('message', 'お知らせを登録しました。');
        } catch (\Exception $e) {
            report($e);
            return redirect()->route('admin.post.index')->with('error', 'お知らせを登録処理でエラーが発生しました。');
        }
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Post::findOrFail($id);
        $postStatus = \PostStatus::toArray();

        return view('admin.post.edit', compact('item', 'postStatus'));
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PostCreateRequest $request)
    {
        try {

            $this->toTable($request);

            return redirect()->route('admin.post.index')->with('message', 'お知らせを登録しました。');
        } catch (\Exception $e) {
            report($e);
            return redirect()->route('admin.post.index')->with('error', 'お知らせを登録処理でエラーが発生しました。');
        }
    }


    protected function toTable($request)
    {
        if ($request->input('id')) {
            $post = Post::findOrFail($request->input('id'));
        } else {
            $post = new Post;
            $post->created_at = date('Y-m-d H:i:s');
        }
        $post->title    = $request->input('title');
        $post->description = $request->input('description');
        $post->status   = $request->input('status');

        $file = $request->file('image');
        if ($file && $file->isValid()) {
            $disk = \Storage::disk('public');
            $post->image = $disk->putFile('uploads', $file, 'public');
        }

        $post->save();
    }


}
