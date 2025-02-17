import 'bootstrap'; 
import $, { event } from 'jquery';
import Cropper from 'cropperjs';
import 'cropperjs/dist/cropper.css';

window.$ = $;
window.jQuery = $;

function newsletter_change(){
        //Calcule des proprietes que vous voyez dans la reference dans header.blade.php et les applique a l'id newsletter
        
        var width = $('#ref').css('width'),
        left = $('#ref').css('margin-left'); 
        
        $('#newsletter').css({
                'width': width,
                'left': left
        });
}
$(window).on('load', newsletter_change);

$(function(){
	if(localStorage.getItem('theme') == 'dark'){
			$('html').addClass('tw-dark');
	}
	
	$('#dark_mode').on('click', function(){
			$('html').toggleClass('tw-dark');
			if($('html').hasClass('tw-dark')){
					localStorage.setItem('theme', 'dark');
			}else{
					localStorage.setItem('theme', 'light');
			}
	});
	
	$('#light_mode').on('click', function(){
			$('html').toggleClass('tw-dark');
			if($('html').hasClass('tw-dark')){
					localStorage.setItem('theme', 'dark');
			}else{
					localStorage.setItem('theme', 'light');
			}
	});
	
	$(window).on('resize', newsletter_change);
	
	/* Test de rognage d'images */
	
	
	let cropperInstances = [];
	
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










	let cropperInstance = [];
	
	$('#profile_photo').on('change', function (event) {
		$('#profile-preview-container').empty(); 
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
				$('#profile-preview-container').append($previewWrapper);
	
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
	
		$('#profile-form').on('submit', function(event) {
			event.preventDefault();
	
			const dataTransfer = new DataTransfer(); 
			let prossedCount = 0;
	
			cropperInstances.forEach((cropper, index) => {
				cropper.getCroppedCanvas().toBlob(function(blob){
					const file = new File([blob], 'cropped_image_'+index+'.jpeg', {type: 'image/jpeg', lastModified: Date.now()});
					dataTransfer.items.add(file);
					prossedCount++;
	
					if(prossedCount == cropperInstances.length){
						document.getElementById('croppedProfileInput').files = dataTransfer.files;
						document.getElementById('profile-form').submit();
					}
				}, 'image/jpeg'); 
			}); 
	}); 
	
	
	
	});

}); 

// import './image-cropper'; 
