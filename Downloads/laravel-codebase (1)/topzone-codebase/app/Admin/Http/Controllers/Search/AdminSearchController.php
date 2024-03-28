<?php

namespace App\Admin\Http\Controllers\Search;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Post\PostRequest;
use App\Admin\Repositories\Post\PostRepositoryInterface;
use App\Admin\Services\Post\PostServiceInterface;
use App\Admin\DataTables\Post\PostDataTable;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminSearchController extends Controller
{
    public function selectSearch(Request $request)
    {
        $keyword = $request->input('q');

        if ($keyword) {
            // Thực hiện truy vấn tìm kiếm trong bảng Post
            $posts = Post::where('title', 'like', "%{$keyword}%")
                ->orWhere('content', 'like', "%{$keyword}%")
                ->get();

            return view('admin.posts.search', ['posts' => $posts, 'keyword' => $keyword]);
        } else {
            // Nếu không có từ khóa tìm kiếm, trả về trang tìm kiếm trống
            dd('lỗi');
        }
    }
}
