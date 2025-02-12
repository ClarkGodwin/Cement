import Cropper from "cropperjs";

$(function () {
    let cropperInstances = [];

    $('#images').on('change', function () {
        $('#image-preview-container').empty(); 
        cropperInstances = [];

        let files = e.target.files;

        $.each(files, function(index, file) {
            let reader = new FileReader();

            reader.onload = function(event) {
                let img = document.createElement('img');
                img.src = event.target.result;
                img.id = 'image-' + index;
                img.className = ' tw-w-full md:tw-w-[600px] tw-mb-4';
                img.style.display = 'block';

                let container = document.createElement('div');
                container.appendChild(img);
                $('#image-preview-container').append(container);

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

                cropperInstances.push({
                    cropper: cropper,
                    file: file.name
                });
            };
            reader.readAsDataURL(file);
        }); 

    }); 

    $('#sell-form').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(); 
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

        let processedImages = 0;

        cropperInstances.forEach(function(instance, index){
            instance.cropper.getCroppedCanvas().toBlob(function(blob) {
                formData.append('images[]', blob, instance.fileName);

                processedImages++;
                if(processedImages === cropperInstances.length) {
                    $.ajax({
                        url: $(this).attr('action'),
                        method: $(this).attr('method'),
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
            // }, 'image/jpeg', 0.8);
            }, 'image/jpeg');
        });

    });

    function displayUploadedImages(imagePaths){
        let uploadedContainer = $('#uploaded-images-container'); 
        uploadedContainer.empty();
        imagePaths.forEach(function(imagePath){
            let img = document.createElement('img');
            img.src = '/storage/' + imagePath;
            img.className = 'tw-w-1/2 tw-h-auto tw-mb-4';
            uploadedContainer.append(img);
        });
    }

});
