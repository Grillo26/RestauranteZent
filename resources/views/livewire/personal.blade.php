
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
        <!--Ed-->

        <div class="flex space-x-5 px-4 pb-5">
            <h1 class="text-3xl text-gray-600">Lista del Personal</h1>
            <button wire:click="crear()" class="bg-blue-300 hover:bg-blue-700 text-white font-bold p-2 rounded"
                >+</button> <br><br>
        </div>

        @if ($modal)
            @include('livewire.crearPersonal')
        @endif
            <table class="table-fixed w-full">
                <thead>
                    <!--Head of table-->
                    <tr class="bg-blue-600 text-white">
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Teléfono</th>
                        <th class="px-4 py-2">Dirección</th>
                        <th class="px-4 py-2">Tipo</th>
                        <th class="px-4 py-2">Turno</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach ($personals as $personal)
                        
                            
                        
                    <!--Body of table-->
                    <tr>
                        <td class="border px-4 py-2">{{$personal->nombre_personal}}</td>
                        <td class="border px-4 py-2">{{$personal->telefono_personal}}</td>
                        <td class="border px-4 py-2">{{$personal->direccion_personal}}</td>

                        @foreach ($tipo_personals as $tipo)
                        @if ($personal->id_tipo == $tipo->id)
                        <td class="border px-4 py-2">{{$tipo->descripcion}}</td>  
                        @endif
                        @endforeach
            
                        @foreach ($turnos as $turno)
                        @if ($personal->id_turno == $turno->id)
                        <td class="border px-4 py-2">{{$turno->descripcion}}</td>
                        @endif
                        @endforeach
                        
                        <td class="border px-4 py-2 text-center"> 
                            <button wire:click="editar({{$personal->id}})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</button>
                            <button wire:click="borrar({{$personal->id}})" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Borrar</button>
                        </td>
                    </tr>
                        
                    @endforeach


                </tbody>
            
            </table>
            
        </div>
        {{$personals->links()}}
    </div>
    
</div>



    

