<?php

namespace App\Admin\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Bạn có thể thay đổi điều kiện kiểm tra quyền truy cập tại đây nếu cần
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Dựa vào HTTP method của request để chọn các quy tắc validation phù hợp
        if ($this->isMethod('post')) {
            return $this->methodPost();
        } elseif ($this->isMethod('put')) {
            return $this->methodPut();
        }

        return [];
    }

    protected function methodPost()
    {
        return [
            'title' => 'required|string',
            'slug' => 'required|string',
            'is_featured' => 'required|in:0,1',
            'status' => 'required|in:0,1',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|image',
        ];
    }


    protected function methodPut()
    {
        return [
            'id' => ['required', 'integer'],
            'title' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'is_featured' => ['required', 'integer', 'in:0,1'],
            'status' => ['required', 'integer', 'in:0,1'],
            'excerpt' => ['required', 'string'],
            'content' => ['required', 'string'],
            'image' => ['required', 'image'],
        ];
    }
}
