<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-header justify-content-center">
            <h2 class="mb-0">{{ __('Thông tin Bài viết') }}</h2>
        </div>
        <div class="row card-body">
            <!-- Tiêu đề -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Tiêu đề') }}:</label>
                    <x-input name="title" id="titleInput" :value="old('title')" :required="true" />
                </div>
            </div>
            <!-- Slug -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Slug') }}:</label>
                    <x-input name="slug" id="slugInput" :value="old('slug')" :required="true" placeholder="{{ __('Slug') }}" />
                </div>
            </div>
            
        
            <!-- Đặc sắc -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Đặc sắc') }}:</label>
                    <x-select name="is_featured" :required="true">
                        <x-option value="1" :title="__('Có')" />
                        <x-option value="0" :title="__('Không')" />
                    </x-select>
                </div>
            </div>
            <!-- Trạng thái -->
            <div class="col-md-6 col-sm-12">
                <div class="col-md-6 col-sm-12">
                    <div class="mb-6">
                        <label class="control-label">{{ __('Trạng thái') }}:</label>
                        <x-select name="status" :required="true">
                            <x-option value="0" :title="__('Ẩn')" />
                            <x-option value="1" :title="__('Hiện')" />
                        </x-select>
                    </div>
                </div>
            </div>
            <!-- Đoạn trích -->
            <div class="col-md-12 col-sm-12">
                <div class="mb-6">
                    <label class="control-label">{{ __('Đoạn trích') }}:</label>
                    <x-input name="excerpt" :value="old('excerpt')" :required="true"
                        placeholder="{{ __('Đoạn trích') }}" />
                </div>
            </div>
            <!-- Nội dung -->
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Nội dung') }}:</label>
                    <textarea name="content" class="form-control">{{ old('content') }}</textarea>
                </div>
            </div>
            <!-- Ngày đăng -->
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Ngày đăng') }}:</label>
                    <x-input name="posted_at" type="date" :value="old('posted_at')" :required="true"
                        placeholder="{{ __('Ngày đăng') }}" />
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('titleInput').addEventListener('input', function(event) {
        var title = event.target.value;
        var slug = title.toLowerCase().replace(/[^\w\s-]/g, '').trim().replace(/\s+/g, '-');
        document.getElementById('slugInput').value = slug;
    });
</script>
