$(document).ready(function(){
    var phoneInput = $('#phone');

    phoneInput.mask('(00) 00000-0000');

    // Ajusta automaticamente se for número fixo (8 dígitos)
    phoneInput.on('blur', function() {
        var phone = phoneInput.val().replace(/\D/g, '');
        if (phone.length === 10) {
            phoneInput.mask('(00) 0000-0000');
        } else {
            phoneInput.mask('(00) 00000-0000');
        }
    });
});
