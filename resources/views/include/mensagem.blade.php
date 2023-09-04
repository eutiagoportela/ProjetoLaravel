@if ($mensagem = session('sucesso'))
    <div class="card green fixed-bottom" id="mensagem-card"> 
        <div class="card-content white-text"> 
            <span class="card-title">{{ $mensagem }}</span> 
        </div> 
    </div> 
    <script> 
        setTimeout(function() { 
            document.getElementById('mensagem-card').style.display = 'none'; 
        }, 3000); 
    </script> 
@endif

@if ($mensagem = session('erro'))
    <div class="card red fixed-bottom" id="mensagem-card"> 
        <div class="card-content white-text"> 
            <span class="card-title">{{ $mensagem }}</span> 
        </div> 
    </div> 
    <script> 
        setTimeout(function() { 
            document.getElementById('mensagem-card').style.display = 'none'; 
        }, 3000); 
    </script> 
@endif