<div class="col-12 col-md-3">
    <div class="card">
        <div class="card-header">
            {{ __('Đăng') }}
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="mb-6">
                <label class="control-label">{{ __('Hình ảnh') }}:</label>
                <input type="file" name="image" id="imageInput" class="form-control" onchange="previewImage(event)">
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="mb-6">
                <img id="preview" src="#" alt="Ảnh xem trước" style="display: none; max-width: 100%; max-height: 200px;">
            </div>
        </div>
        
        <div class="card-body p-2 d-flex justify-content-between">            
            <x-button.submit :title="__('Cập nhật')" />
            <x-button.modal-delete data-route="{{ route('admin.post.delete', $post->id) }}" :title="__('Xóa')" />
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        var input = event.target;
        var preview = document.getElementById('preview');
        
        var reader = new FileReader();
        reader.onload = function(){
            preview.src = reader.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>
