$(function(){
    $('#pokazFormularz').click(function(){
            $('#wyslij').slideToggle(750);
    });

    $('#form').submit(function() {
        var wiek = $('input[name="wiek"]').val();
        var plec = $('input[name="plec"]:checked').val();
        var placa = $('input[name="placa"]').val();
        var daneJS = 'wiek=' + wiek + '&plec=' + plec + '&placa=' + placa;
        $.ajax({
            type: "post",
            data: daneJS,
            url: "admin.php?op=send",
            success: function(odpPHP){
                if(odpPHP){
                    $('#wyslij').slideUp(500);
                    setTimeout(function() {
                        $('#wyslij').delay(350).slideDown(500);
                        $("#wyslij").html("Przeslano pomyślnie!").delay(1000).slideUp(500)
                    }, 1000);
                }
                else
                    $("#wyslij").html("Wystąpił bląd! Spróbuj ponownie później").delay(3000).fadeOut();
            }
        })
        return false;
    });

    $('#anDetailedSalary').click(function() {
        $.ajax({
            url: "admin.php?op=anDetailedSalary",
            success: function(odpPHP){
                $('#wyniki').slideUp(250);
                $('#wyniki').delay(350).slideDown(500);
                setTimeout(function() {
                    $('#wyniki').html(odpPHP);  
                }, 300);
            }
         })
    });

    $('#anAge').click(function() {
        $.ajax({
            url: "admin.php?op=anAge",
            success: function(odpPHP){
                $('#wyniki').slideUp(250);
                $('#wyniki').delay(350).slideDown(500);
                setTimeout(function() {
                    $('#wyniki').html(odpPHP);  
                }, 300);
            }
         })
    });

    $('#anGender').click(function() {
        $.ajax({
            url: "admin.php?op=anGender",
            success: function(odpPHP){
                $('#wyniki').slideUp(250);
                $('#wyniki').delay(350).slideDown(500);
                setTimeout(function() {
                    $('#wyniki').html(odpPHP);  
                }, 300);
            }
         })
    });

    $('#anSalary').click(function() {
        $.ajax({
            url: "admin.php?op=anSalary",
            success: function(odpPHP){
                $('#wyniki').slideUp(250);
                $('#wyniki').delay(350).slideDown(500);
                setTimeout(function() {
                    $('#wyniki').html(odpPHP);  
                }, 300);
            }
         })
    });
});