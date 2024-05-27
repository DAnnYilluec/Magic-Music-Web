<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Usuario;

class CambiarAdmin extends Component
{
    public $usuarioId;


    public function cambiarAdmin()
    {
        $usuario = Usuario::find($this->usuarioId);
        $usuario->esAdmin = !$usuario->esAdmin;
        $usuario->save();

        session()->flash('message', 'El estado de administrador ha sido cambiado.');
    }

    public function render()
    {
        return view('livewire.cambiar-admin');
    }
}

?>
