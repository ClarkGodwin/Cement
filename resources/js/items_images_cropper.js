import 'bootstrap'; 
import $, { event } from 'jquery';
import Cropper from 'cropperjs';
import 'cropperjs/dist/cropper.css';

window.$ = window.jQuery = $;

$(function () {
	var cropperInstances = [];
	
	$('#images').on('change', function (event) {
		$('#image-preview-container').empty(); 
		cropperInstances = [];
	
		const files = event.target.files;
	
		$.each(files, function(index, file) {
			const reader = new FileReader();
	
			reader.onload = function(event) {
				const $previewWrapper = document.createElement('div'); 
				$previewWrapper.className = ' tw-w-full md:tw-w-[600px]'; 
	
				let img = document.createElement('img');
				img.src = event.target.result;
				img.id = 'image-' + index;
				img.className = ' tw-w-full md:tw-w-[600px] tw-mb-4';
				img.style.display = 'block';
	
				$previewWrapper.appendChild(img);
				$('#image-preview-container').append($previewWrapper);
	
				let cropper = new Cropper(img, {
					aspectRatio: 1,
					viewMode: 1,
					autoCropArea: 1,
					background: false,
				});
				cropperInstances.push(cropper); 
			};
			reader.readAsDataURL(file);
		}); 
	
	}); 
	
	$('#sell-form').on('submit', function(event) {
		event.preventDefault();

		const dataTransfer = new DataTransfer(); 
		let prossedCount = 0;

		cropperInstances.forEach((cropper, index) => {
			cropper.getCroppedCanvas().toBlob(function(blob){
				const file = new File([blob], 'cropped_image_'+index+'.jpeg', {type: 'image/jpeg', lastModified: Date.now()});
				dataTransfer.items.add(file);
				prossedCount++;

				if(prossedCount == cropperInstances.length){
					document.getElementById('croppedImagesInput').files = dataTransfer.files;
					document.getElementById('sell-form').submit();
				}
			}, 'image/jpeg'); 
		}); 
	
	
	});

}); 
