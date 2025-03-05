import 'bootstrap'; 
import $, { event } from 'jquery';
import Cropper from 'cropperjs';
import 'cropperjs/dist/cropper.css';
import './items_images_cropper';
import './profile_photo'; 
import './item_add';
import './chatbot'; 
import './admin'; 
import './search'; 

window.$ = window.jQuery = $;

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

	var $ul = $('#scroll_list'),
		$lis = $ul.find('li');

	for(let i =0; i < 20; i++){
		$ul.append($lis.clone())
	}

}); 

