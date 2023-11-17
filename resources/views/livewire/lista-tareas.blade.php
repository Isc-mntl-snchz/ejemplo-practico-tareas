<div class="mx-auto bg-gray-800 text-white p-3">
    <div class="mb-4 w-full text-center">
        <h1 class="text-2xl font-bold  text-center">Lista de Tareas con </h1>
        <div class="flex justify-center">@include('components.icon-livewire')</div>

    </div>
    <div class="mb-4 flex justify-center">
        <input type="text" wire:model="nuevaTarea" class="border p-2 mr-2 bg-gray-700 outline-none"
            wire:keydown.enter="agregarTarea">
        <button wire:click="agregarTarea" class="bg-blue-900  p-2">Agregar Tarea</button>
    </div>

    <ul>
        @foreach ($tareas as $index => $tarea)
            <li class="group flex w-8/12 mx-auto justify-between hover:bg-gray-700 p-1 {{ $tarea->estatus ? 'line-through' : '' }}"
                wire:click="marcarComoCompletada({{ $tarea->id }})">
                <div class="flex">
                    <span style="width:12px">
                        @if ($tarea->estatus)
                            <i class="fas fa-check"></i> <!-- Ícono para completada -->
                        @endif
                    </span>
                    <p class="pl-2 {{ $tarea->estatus ? 'line-through' : '' }}">
                        {{ $tarea->tarea }}
                    </p>
                </div>
                <div class="opacity-0 group-hover:opacity-100">
                    <button wire:click.stop="eliminarTarea({{ $tarea->id }})"
                        class="ml-2 text-red-600 w-11 rounded-full hover:bg-black">
                        <i class="fas fa-trash-alt"></i> <!-- Ícono para eliminar -->
                    </button>
                </div>
            </li>
        @endforeach
    </ul>
</div>
