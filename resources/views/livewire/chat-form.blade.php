<div>
<div>
    <div class="form-group">
        <label for="usuario"><h2>Escribe aqui</h2></label>
        <input class="form-control" type="text" id="nombre" wire:model.live="texto">
        <input type="hidden" id="idDiscusion" value="{{ $idDisc}}">
    </div>
    <div class="text-center mb-5">
         <button href="" class="btn btn-primary tm-btn-big" wire:click="enviarMensaje({{$idDisc}})">Publicar</button>
    </div>
</div>
<hr>
<div>
    @foreach($comentarios as $comentario)
    <h3>{{$comentario->autor->nombre}}</h3>
        <p>{{ $comentario->texto }}</p>
        
    @endforeach
    
</div>
</div>
