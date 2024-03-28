<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-header justify-content-center">
            <h2 class="mb-0">{{ __('Thông tin bài viết') }}</h2>
        </div>
        <div class="row card-body">
            <!-- Tiêu đề -->
            <input type="hidden" name="id" value="{{ $post->id }}">

            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Tiêu đề') }}:</label>
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control" required>
                </div>
            </div>
            <!-- Slug -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Slug') }}:</label>
                    <input type="text" name="slug" value="{{ $post->slug }}" class="form-control" required>
                </div>
            </div>
            <!-- Đặc sắc -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Đặc sắc') }}:</label>
                    <select name="is_featured" class="form-control" required>
                        <option value="1" {{ $post->is_featured == 1 ? 'selected' : '' }}>Có</option>
                        <option value="0" {{ $post->is_featured == 0 ? 'selected' : '' }}>Không</option>
                    </select>
                </div>
            </div>
            <!-- Trạng thái -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Trạng thái') }}:</label>
                    <select name="status" class="form-control" required>
                        <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Có</option>
                        <option value="0" {{ $post->status == 0 ? 'selected' : '' }}>Không</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Tóm tắt') }}:</label>
                    <textarea name="excerpt" class="form-control">{{ $post->excerpt }}</textarea>
                </div>
            </div>
            <!-- Nội dung -->
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Nội dung') }}:</label>
                    <textarea name="content" class="form-control">{{ $post->content }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
