import $, { event } from 'jquery';

window.$ = window.jQuery = $;

$(function(){
    var chatbot_messages = $('#chatbot_messages'); 
    $('#chatbot-form').on('submit', function (event) {
        event.preventDefault(); 
        
        var div = $('<div></div>'),
            message = $('#message').val(); 

        div.append('<span>Bot :</span>');
        div.append('<div>' + message + '</div>'); 

        chatbot_messages.append(div); 

        $.ajax({
            url: '{{ route("send_message")}}',
            method: 'POST',
            data: { message: message},
            headers: { 'X-SCRF-TOKEN': $(' meta[name="csrf-token] ').attr('content')}, 
            success: function(response){
            }
        }); 
    }); 
}); 
