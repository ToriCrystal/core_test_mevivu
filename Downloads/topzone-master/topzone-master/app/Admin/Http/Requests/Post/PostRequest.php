<?php

namespace App\Admin\Http\Requests\Post;

use App\Admin\Http\Requests\BaseRequest;
use App\Enums\Post\PostIsFeatured;
use App\Enums\Post\PostStatus;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rule;

class PostRequest extends BaseRequest
{
/**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'title' => ['required', 'string', 'min:6', 'max:100'],
            'slug' => ['required', 'string', 'min:6', 'max:100', 'unique:App\Models\Post,slug'],
            'is_featured' => ['required', new Enum(PostIsFeatured::class)],
            'status' => ['required', new Enum(PostStatus::class)],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'excerpt' => ['required', 'string', 'min:6'],
            'content' => ['required', 'string', 'min:6'],
            'posted_at' => ['required', 'date'],
        ];

    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\Post,id'],
            'title' => ['required', 'string', 'min:6', 'max:100'],
            'slug' => ['required', 'string', 'min:6', 'max:100', 'unique:App\Models\Post,slug,'.$this->id],
            'is_featured' => ['required', new Enum(PostIsFeatured::class)],
            'status' => ['required', new Enum(PostStatus::class)],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'excerpt' => ['required', 'string', 'min:6'],
            'content' => ['required', 'string', 'min:6'],
            'posted_at' => ['required', 'date'],
        ];
    }
}
