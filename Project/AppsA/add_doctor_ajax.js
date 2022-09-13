$(document).ready(function(){
    
    // Intitial checks
    if($('#Sunday').is(':checked')){
        $('#Sunday').val(1);
    }
    else{
        $('#Sunday').val(0);
    }

    if($('#Monday').is(':checked')){
        $('#Monday').val(1);
    }
    else{
        $('#Monday').val(0);
    }

    if($('#Tuesday').is(':checked')){
        $('#Tuesday').val(1);
    }
    else{
        $('#Tuesday').val(0);
    }

    if($('#Wednesday').is(':checked')){
        $('#Wednesday').val(1);
    }
    else{
        $('#Wednesday').val(0);
    }

    if($('#Thursday').is(':checked')){
        $('#Thursday').val(1);
    }
    else{
        $('#Thursday').val(0);
    }

    if($('#Friday').is(':checked')){
        $('#Friday').val(1);
    }
    else{
        $('#Friday').val(0);
    }

    if($('#Saturday').is(':checked')){
        $('#Saturday').val(1);
    }
    else{
        $('#Saturday').val(0);
    }

    // For sunday checbox
    $('#Sunday').click(function(){
        
        if($('#Sunday').is(':checked')){
            $('#Sunday').val(1);
        }
        else{
            $('#Sunday').val(0);
        }
    });

    // For monday checbox
    $('#Monday').click(function(){
        
        if($('#Monday').is(':checked')){
            $('#Monday').val(1);
        }
        else{
            $('#Monday').val(0);
        }

    });

    // For tuesday checbox
    $('#Tuesday').click(function(){
        
        if($('#Tuesday').is(':checked')){
            $('#Tuesday').val(1);
        }
        else{
            $('#Tuesday').val(0);
        }

    });

    // For wednesday checbox
    $('#Wednesday').click(function(){
        
        if($('#Wednesday').is(':checked')){
            $('#Wednesday').val(1);
        }
        else{
            $('#Wednesday').val(0);
        }

    });

    // For thursday checbox
    $('#Thursday').click(function(){
        
        if($('#Thursday').is(':checked')){
            $('#Thursday').val(1);
        }
        else{
            $('#Thursday').val(0);
        }

    });

    // For friday checbox
    $('#Friday').click(function(){
        
        if($('#Friday').is(':checked')){
            $('#Friday').val(1);
        }
        else{
            $('#Friday').val(0);
        }

    });

    // For saturday checbox
    $('#Saturday').click(function(){
        
        if($('#Saturday').is(':checked')){
            $('#Saturday').val(1);
        }
        else{
            $('#Saturday').val(0);
        }

    });

    
    
});