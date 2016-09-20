<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use App\Tag;

class PostsAdminController extends Controller
{

    private $post;

    public function __construct(Post $post){
            $this->post = $post;
    }

    public function index(){
        $posts = $this->post->paginate(5);

        return view('admin.posts.index', compact('posts'));
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(PostRequest $postRequest){
        $post = $this->post->create($postRequest->all());
        $post->tags()->sync($this->getTagsIDs($postRequest->tags));

        return redirect()->route('admin.posts.index');
    }

    public function edit($id){
        $post = $this->post->find($id);

        return view('admin.posts.edit', compact('post'));
    }

    public function update($id, PostRequest $postRequest){
        $post = $this->post->find($id);
        $post->update($postRequest->all());
        $post->tags()->sync($this->getTagsIDs($postRequest->tags));

        return redirect()->route('admin.posts.index');
    }

    public function destroy($id){
        $this->post->find($id)->delete();

        return redirect()->route('admin.posts.index');
    }

    private function getTagsIDs($tags){
        $tagsList = array_map('trim', explode(',', $tags));
        $tagsIDs = [];
        foreach($tagsList as $tagName){
            $tagsIDs[] = Tag::firstOrCreate(['name' => $tagName])->id;
        }

        return $tagsIDs;
    }
}
