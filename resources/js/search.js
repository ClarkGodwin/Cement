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
                    $.each(data, function(index, item){
                    });
                    for(let i=0; i < data.length; i++){
                        var li = $('<li></li>'),
                            a = $('<a></a>'),
                            id =  data[i].id,
                            name = '';  
                        if(data[i].standard !== null ){
                            name = data[i].name + ' de standard ' + data[i].standard; 
                        }
                        else{
                            name = data[i].name; 
                        }
                        a.append(name); 
                        a.attr('href',
                            '/details/'+btoa(id.toString())
                        ); 
                        li.append(a); 
                        $('#search_results').append(li); 
                        li[0].scrollIntoView({behavior: "smooth", block: "center", inline: "center"});
                        
                    }
                }
                    
            },
            error: function(error){
                console.log('Error: ', error); 
            }
        });
    });

}); 
