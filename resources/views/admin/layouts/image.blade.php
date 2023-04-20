<div class="photoUpload-zone">
	<div class="photoUpload-detail" id="photoUpload-preview2">
		
		<img class="rounded" src="{{ asset('assets/admin/images/poduct-1.jpg') }}" onerror="src='{{ asset('assets/admin/images/noimage.png') }}'" alt="Alt Photo" style=""/>
	</div>
	<label class="photoUpload-file" id="photo-zone2" for="file-zone2">
		<input type="file" name="file2" id="file-zone2">
		<i class="fas fa-cloud-upload-alt"></i>
		<p class="photoUpload-drop">Kéo và thả hình vào đây</p>
		<p class="photoUpload-or">hoặc</p>
		<p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
	</label>
	<div class="photoUpload-dimension">Width: 270px - Height:  270px (.jpg|.gif|.png|.jpeg)</div>
</div>