<div class="col-12 col-md-3">
    <div class="card">
        <div class="card-header">
            {{ __('Đăng') }}
        </div>
        <div class="card-body p-2">
            <div class="mb-3">
                <label class="control-label">{{ __('Hình ảnh') }}:</label>
                <input type="file" name="image" class="form-control" id="imageInput">
            </div>
            <div class="mb-3" id="imagePreviewContainer" style="display: none;">
                <label class="control-label">{{ __('Xem trước') }}:</label>
                <img id="imagePreview" class="img-thumbnail">
            </div>
            <x-button.submit :title="__('Đăng bài')" />
        </div>
    </div>
</div>

<script>
    document.getElementById('imageInput').addEventListener('change', function(event) {
        var input = event.target;
        var reader = new FileReader();

        reader.onload = function() {
            var imagePreview = document.getElementById('imagePreview');
            imagePreview.src = reader.result;
            document.getElementById('imagePreviewContainer').style.display = 'block';
        };

        reader.readAsDataURL(input.files[0]);
    });
</script>
