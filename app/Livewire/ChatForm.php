<?php
namespace App\Livewire;

use App\Models\Comentario;
use App\Models\Discusiones;
use Auth;
use Livewire\Component;

class ChatForm extends Component
{
    public $texto;
    public $idDisc;

    public function mount($idDisc){
        $this->texto = "";
        $this->idDisc = $idDisc;
    }

    public function enviarMensaje(){

        $validatedData = $this->validate([
            'texto' => 'required',
        ]);
    
        $discusiones = Discusiones::find($this->idDisc);
        if (!$discusiones) {
            return;
        }
    
        // Guardamos el mensaje en la BBDD
        $comentario = new Comentario();
        $comentario->texto = $this->texto;
        $comentario->discusiones()->associate($discusiones->id); // Aquí pasamos el ID de la discusión
        $comentario->autor()->associate(Auth::user());
        $comentario->save();
        
    }
    
    

    public function render()
    {
        $comentarios = Comentario::where('id_discusion', $this->idDisc)->get();

        // Pasamos los comentarios a la vista
        return view('livewire.chat-form', ['comentarios' => $comentarios]);
    }
}
?>