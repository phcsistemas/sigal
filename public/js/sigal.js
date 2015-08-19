$.getScript('jquery.mask.min.js');

//Dialog show event handler
$('#confirmDelete').on('show.bs.modal', function (e) {
    $message = $(e.relatedTarget).attr('data-message');
    $(this).find('.modal-body p').text($message);
    $title = $(e.relatedTarget).attr('data-title');
    $(this).find('.modal-title').text($title);

    // Pass form reference to modal for submission on yes/ok
    var form = $(e.relatedTarget).closest('form');
    $(this).find('.modal-footer #confirm').data('form', form);
});

//Form confirm (yes/ok) handler, submits form
$('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
    $(this).data('form').submit();
});

//Mask
$(document).ready(function(){
    $("input[name='fone']").mask('(00) 0000-0000');
    $('.fone').mask('0000-0000');
    $("#fone").append(" - TESTE");
});