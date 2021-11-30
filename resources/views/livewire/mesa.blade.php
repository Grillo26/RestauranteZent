
<h1 class="text-gray-900">Lista de Mesas</h1>
<div class="py-12">
    <div class="max-w-7x1 mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-x1 sm:rounded-lg px-4 py-4">

        <!--Alerta Borrado Correctamente-->
        @if (session()->has('message'))
        <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-teal-500">
            <span class="inline-block align-middle mr-8">
                {{ session('message') }}
            </span>
            <button wire:click="cerrarModal()"  class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
              <span>×</span>
            </button>
        </div>
        @endif
        <!--En -->

        <button wire:click="crear()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
        >Nuevo</button> <br><br>

        @if ($modal)
            @include('livewire.crearMesa')
        @endif
            <table class="table-fixed w-full">
                <thead>
                    <!--Head of table-->
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2">Capacidad</th>
                        <th class="px-4 py-2">Ubicación</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach ($mesas as $mesa)
                    <!--Body of table-->
                    <tr>
                        <td class="border px-4 py-2">{{$mesa->CantMaxComensales}}</td>
                        <td class="border px-4 py-2">{{$mesa->Ubicacion}}</td>
                        <td class="border px-4 py-2 text-center"> 
                            <button wire:click="editar({{$mesa->id}})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</button>
                            <button wire:click="borrar({{$mesa->id}})" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Borrar</button>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            
            </table>
            
        </div>

    </div>
    
</div>


    

