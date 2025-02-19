import 'bootstrap'; 
import $, { event } from 'jquery';
import Cropper from 'cropperjs';
import 'cropperjs/dist/cropper.css';

window.$ = window.jQuery = $;

$(function () {
	var cropperInstance = null;
	
	$('#profile_photo').on('change', function (event) {
		$('#profile-preview-container').empty(); 
	
		const file = event.target.files;
	
        const reader = new FileReader();

        reader.onload = function(event) {
            const $previewWrapper = document.createElement('div'); 
            $previewWrapper.className = ' tw-w-full md:tw-w-[600px]'; 

            let img = document.createElement('img');
            img.src = event.target.result;
            img.className = ' tw-w-full md:tw-w-[600px] tw-mb-4';
            img.style.display = 'block';

            $previewWrapper.appendChild(img);
            $('#profile-preview-container').append($previewWrapper);

            let cropper = new Cropper(img, {
                aspectRatio: 1,
                viewMode: 1,
                autoCropArea: 1,
                background: false,
            });
            cropperInstance = cropper;
        };
        reader.readAsDataURL(file[0]);
	
		$('#profile-form').on('submit', function(event) {
			event.preventDefault();
	
			const dataTransfer = new DataTransfer(); 
	
            cropperInstance.getCroppedCanvas().toBlob(function(blob){
                const file = new File([blob], 'cropped_image_profile.jpeg', {type: 'image/jpeg', lastModified: Date.now()});
                dataTransfer.items.add(file);
                document.getElementById('croppedProfileInput').files = dataTransfer.files;
                document.getElementById('profile-form').submit();

            }, 'image/jpeg'); 
		}); 
	
	});

})
