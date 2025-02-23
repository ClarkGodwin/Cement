import $, { event } from 'jquery';

window.$ = window.jQuery = $;

$(function(){
    var chatbot_messages = $('#chatbot_messages'); 
    $('#chatbot-form').on('submit', function (event) {
        event.preventDefault(); 
        
        var div = $('<div>'),
            message = $('#message').val(), 
            name = $('#name').val(); 

        div.append('<span>'+name+' :</span>');
        div.append('<div>' + message + '</div>'); 

        chatbot_messages.append(div); 

        $.ajax({
            url: '/send_message',
            method: 'POST',
            data: JSON.stringify('message', message),
            contentType: 'application/json', 
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, 
            success: function(response){
                response = response.response; 
                div = $('<div>');
                div.append('<span>Bot :</span>');
                div.append('<div>'+response+'</div>'); 

                chatbot_messages.append(div); 
            },
            error: function(error){
                console.log('Error: ', error); 
            }
        }); 
    }); 
}); 
