import $, { event } from 'jquery';

window.$ = window.jQuery = $;

function activeLink(){
    let activeLink = localStorage.getItem('activeLink');
    if(activeLink){
        $('.lien').children('button').removeClass('tw-bg-black dark:tw-bg-white tw-text-white dark:tw-text-purple_blue');
        $(`.lien[href="${activeLink}"]`).children('button').addClass('tw-bg-black dark:tw-bg-white tw-text-white dark:tw-text-purple_blue');
        $(`.lien[href="${activeLink}"]`)[0].scrollIntoView({behavior: "smooth", block: "center", inline: "center"});
        
    }
}

$(function(){
    $('#dashboard').on('click', function(e){
        e.preventDefault();
        localStorage.setItem('activeLink', $(this).attr('href'));
        window.location.href = $(this).attr('href'); 
    }); 
    activeLink(); 

    $('.lien').on('click', function(e){
        e.preventDefault();

        $('.lien button').removeClass('tw-bg-black dark:tw-bg-white tw-text-white dark:tw-text-purple_blue');

        let href = $(this).attr('href');
        localStorage.setItem('activeLink', href);

        window.location.href = href; 
    }); 
}); 

console.log(localStorage.getItem('activeLink'))