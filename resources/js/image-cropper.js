import Cropper from "cropperjs";

$(function () {
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
					crop: function(event) {
						let canvas = cropper.getCroppedCanvas();
						let dataURL = canvas.toDataURL();
						$('#image-preview').attr('src', dataURL);
					}
				});
	
			//     cropperInstances.push({
			//         cropper: cropper,
			//         file: file.name
			//     });
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
	
		// let formData = new FormData(this); 
		// formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
	
		// let processedImages = 0;
		
		// // $.each(cropperInstances, function(index, cropper){
		// cropperInstances.forEach(function(instance, index){
		// 	instance.getCroppedCanvas().toBlob(function(blob) {
		// 		formData.append('cropped_images_'+index, blob, 'cropped_image_'+index+'.jpeg');
	
		// 		processedImages++;
		// 		if(processedImages === cropperInstances.length) {
		// 			// $('#sell-form').trigger('submit'); 
		// 			$.ajax({
		// 				url: '/sell',
		// 				method: 'POST',
		// 				headers:{
		// 					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
		// 					'Content-Type': 'multipart/form-data',
		// 					'X-Requested-With': 'XMLHttpRequest', 
		// 					'Accept': 'application/json'
		// 				},
		// 				data: formData,
		// 				processData: false,
		// 				contentType: false,
		// 				success: function(response) {
		// 					console.log(response);
		// 				},
		// 				error: function(xhr, status, error) {
		// 					console.error(xhr.responseText);
		// 				}
		// 			});
		// 		}
		// 	// }, 'image/jpeg', 0.8);
		// 	});
		// });
	
	});

});
