(function($){
	$('.addpanier').click(function(event){
        event.preventDefault();
        location.href='panier1.php';
        location.href='index.php';
        $.get($(this).attr('href'), {}, function(data){
 
            console.log(data);
        }, 'json');
        return false;
    })
})(jQuery);