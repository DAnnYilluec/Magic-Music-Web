<li><button wire:click="cambiarAdmin" class="cambiar-admin"><i class="fa fa-user"></i></button></li>
@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
