<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class Posts extends Component
{
    public $title, $content, $postId, $slug, $status, $updatePost = false, $addPost = false;

    protected $rules = [
        'title' => 'required',
        'content' => 'required',
        'status' => 'required'
    ];

    public function resetFields()
    {
        $this->title = '';
        $this->content = '';
        $this->status = 1;
    }

    public function render()
    {
        $posts = Posts::latest()->get();
        return view('livewire.posts', compact('posts'));
    }

    public function create()
    {
        $this->resetFields();
        $this->addPost = true;
        $this->updatePost = false;
    }

    public function store()
    {
        $this->validate();
        try {
            Posts::create([
                'title' => $this->title,
                'content' => $this->content,
                'status' => $this->status,
                'slug' => Str::slug($this->title)
            ]);

            session()->flash('success', 'Post Created Successfully!!');
            $this->resetFields();
            $this->addPost = false;
        } catch (\Exception $ex) {
            session()->flash('error', 'Something goes wrong!!');
        }
    }

    public function edit($id)
    {
        try {
            $post = Posts::findOrFail($id);
            if (!$post) {
                session()->flash('error', 'Post not found');
            } else {
                $this->title = $post->title;
                $this->content = $post->content;
                $this->status = $post->status;
                $this->postId = $post->id;
                $this->updatePost = true;
                $this->addPost = false;
            }
        } catch (\Exception $ex) {
            session()->flash('error', 'Something goes wrong!!');
        }
    }

    public function update()
    {
        $this->validate();
        try {
            Posts::whereId($this->postId)->update([
                'title' => $this->title,
                'content' => $this->content,
                'status' => $this->status,
                'slug' => Str::slug($this->title)
            ]);
            session()->flash('success', 'Post Updated Successfully!!');
            $this->resetFields();
            $this->updatePost = false;
        } catch (\Exception $ex) {
            session()->flash('error', 'Something goes wrong!!');
        }
    }

    public function cancel()
    {
        $this->addPost = false;
        $this->updatePost = false;
        $this->resetFields();
    }

    public function destroy($id)
    {
        try {
            Posts::find($id)->delete();
            session()->flash('success', "Post Deleted Successfully!!");
        } catch (\Exception $e) {
            session()->flash('error', "Something goes wrong!!");
        }
    }
}
