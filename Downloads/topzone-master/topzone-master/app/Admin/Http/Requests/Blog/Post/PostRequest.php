<?php

namespace App\Admin\Http\Requests\Blog\Post;

use App\Admin\Http\Requests\BaseRequest;
use App\Enums\DefaultStatus;
use Illuminate\Validation\Rules\Enum;

class PostRequest extends BaseRequest
{
    protected function methodPost()
    {
        return [
            'categories_id' => ['required', 'array'],
            'categories_id.*' => ['required', 'exists:App\Models\Category,id'],
            'title' => ['required', 'string'],
            'feature_image' => ['required'],
            'status' => ['required', new Enum(DefaultStatus::class)],
            'excerpt' => ['nullable'],
            'content' => ['nullable']
        ];
    }
    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\Post,id'],
            'categories_id' => ['required', 'array'],
            'categories_id.*' => ['required', 'exists:App\Models\Category,id'],
            'title' => ['required', 'string'],
            'slug' => ['required', 'string', 'unique:App\Models\Post,slug,' . $this->id],
            'feature_image' => ['required'],
            'status' => ['required', new Enum(DefaultStatus::class)],
            'excerpt' => ['nullable'],
            'content' => ['nullable']
        ];
    }
}
