<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Usuario;

class MostrarAdmin extends Component
{
    public $usuarioId;
    public $esAdmin;

    public function mount($usuarioId)
    {
        $this->usuarioId = $usuarioId;
    }

    public function render()
    {
        $usuario = Usuario::find($this->usuarioId);
        $this->esAdmin = $usuario->esAdmin;

        return view('livewire.mostrar-admin', ['esAdmin' => $this->esAdmin]);
    }
}


?>
