<?php

namespace App\Services;

use App\Repositories\PostRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getAll()
    {
        return $this->postRepository->getAllPost();
    }

    public function getById($id)
    {
        return $this->postRepository->getById($id);
    }

    public function editById($id)
    {
        return $this->postRepository->getById($id);
    }

    public function savePostData($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
        $result = $this->postRepository->save($data);

        return $result;
    }

    public function updateById($data, $id)
    {
        //dd($data);
        $validator = Validator::make($data, [
            'title' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
        DB::beginTransaction();
        
        try {
            $post = $this->postRepository->update($data, $id);
        } catch(Exception $e){
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to update post data');
        }
        DB::commit();

        return $post;
    }

    public function destroyById($id)
    {
        return $this->postRepository->destroy($id);
    }

    
}