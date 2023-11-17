<?php

namespace App\Livewire;

use App\Models\Tarea;
use Livewire\Component;

class ListaTareas extends Component
{
    public $tareas = [];
    public $nuevaTarea = '';

    public function agregarTarea()
    {
        if (!empty($this->nuevaTarea)) {
            Tarea::create(['tarea' => $this->nuevaTarea, 'estatus' => false]);
            $this->nuevaTarea = '';
        }
    }

    public function marcarComoCompletada($id)
    {
        $tarea = Tarea::find($id);
        if ($tarea)
            $tarea->update(['estatus' => !$tarea->estatus]);
    }

    public function eliminarTarea($id)
    {
        $tarea = Tarea::find($id);

        if ($tarea) {
            $tarea->delete();
        }
    }

    public function render()
    {
        $this->tareas = \App\Models\Tarea::orderBy('estatus', 'asc')->get();
        return view('livewire.lista-tareas');
    }
}
