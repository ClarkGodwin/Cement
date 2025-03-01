import $, { event } from 'jquery';

window.$ = window.jQuery = $;

$(function(){
    $('#search_form').on('submit', function (event) {
        event.preventDefault(); 
        let query = $('#query').val(); 

        $.ajax({
            url: '/search',
            method: 'POST',
            data: JSON.stringify({
                query: query
            }),
            contentType: 'application/json', 
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, 
            success: function (data) {
                $('#search_results').empty(); 
                if(Array.isArray(data) && data.length === 0){
                    let li = $('<li></li>'); 
                    li.html('Aucun resultat'); 
                    $('#search_results').append(li); 
                    li[0].scrollIntoView({behavior: "smooth", block: "center", inline: "center"});
                }
                else{
                    data.forEach(item => {
                        let li = $('<li></li>'); 
                        li.append('<a href="/items/' + item.id + '>'+item.name+'</a>'); 
                        $('#search_results').append(li); 
                        li[0].scrollIntoView({behavior: "smooth", block: "center", inline: "center"});
                        
                    });
                }
                    
            },
            error: function(error){
                console.log('Error: ', error); 
            }
        });
    });

}); 
