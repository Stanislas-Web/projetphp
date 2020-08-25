(function(){
    var from = null, start = 0 , url='http://localhost:81/chatajax/index.php';
$(document).ready(function(){
    $('form').submit(function(e){
        $.post(url, {message: $('#message').val(),
        auteur:$('#auteur').val()
    })
    $('#message').val('');
    $('#auteur').val('')
        return false
    })
    
})
})()