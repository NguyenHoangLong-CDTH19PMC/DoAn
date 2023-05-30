{{-- @foreach ($products as $k => $item)
    <div class="photoUpload-zone">
        <div class="photoUpload-detail" id="photoUpload-preview">
            <img class="rounded" onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
                src="{{ asset('upload/product/' . $item ->photo) }}" alt="Alt Photo" style="" />
        </div>
        <label class="photoUpload-file" id="photo-zone" for="file-zone">
            <input type="file" name="file" id="file-zone">
            <i class="fas fa-cloud-upload-alt"></i>
            <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
            <p class="photoUpload-or">hoặc</p>
            <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
        </label>
        <div class="photoUpload-dimension">Width: 270px - Height: 270px (.jpg|.gif|.png|.jpeg)</div>
    </div>
@endforeach --}}


<div class="photoUpload-zone">
    <div class="photoUpload-detail" id="photoUpload-preview">
        <img class="rounded" onerror="src='{{ asset('assets/admin/images/noimage.png') }}'"
            src="" alt="Alt Photo" style="" />
    </div>
    <label class="photoUpload-file" id="photo-zone" for="file-zone">
        <input type="file" name="file" id="file-zone">
        <i class="fas fa-cloud-upload-alt"></i>
        <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
        <p class="photoUpload-or">hoặc</p>
        <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
    </label>
    <div class="photoUpload-dimension">Width: 270px - Height: 270px (.jpg|.gif|.png|.jpeg)</div>
</div>