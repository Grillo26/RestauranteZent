
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
            <h1 class="text-3xl text-gray-600">Lista de Pedidos</h1>
            <button wire:click="crear()" class="bg-blue-300 hover:bg-blue-700 text-white font-bold p-2 rounded"
                >+</button> <br><br>
        </div>

        @if ($modal)
            @include('livewire.crearPedido')
        @endif
            <table class="table-fixed w-full">
                <thead>
                    <!--Head of table-->
                    <tr class="bg-blue-600 text-white">
                        <th class="px-4 py-2">Cliente</th>
                        <th class="px-4 py-2">Pedido</th>
                        <th class="px-4 py-2">Mesa</th>
                        <th class="px-4 py-2">Personal Turno</th>
                        <th class="px-4 py-2">Fecha Pedido</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach ($pedidos as $pedido) 
                    <!--Body of table-->
                    <tr>
                        @foreach ($clientes as $cliente)
                        @if ($pedido->id_cliente == $cliente->id)
                        <td class="border px-4 py-2">{{$cliente->nombre_cliente}}</td>  
                        @endif
                        @endforeach

                        <td class="border px-4 py-2">{{$pedido->tipo_pedido}}</td>

                        @foreach ($mesas as $mesa)
                        @if ($pedido->id_mesa == $mesa->id)
                        <td class="border px-4 py-2 text-center">{{$mesa->Ubicacion}}</td>  
                        @endif
                        @endforeach

                        @foreach ($personals as $personal)
                        @if ($pedido->id_personal == $personal->id)
                        <td class="border px-4 py-2">{{$personal->nombre_personal}}</td>  
                        @endif
                        @endforeach

                        <td class="border px-4 py-2">{{$pedido->fecha_pedido}}</td>

                        <td class="border px-4 py-2 text-center"> 
                            <button wire:click="editar({{$pedido->id}})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</button>
                            <button wire:click="borrar({{$pedido->id}})" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Borrar</button>
                        </td>
                    </tr>
                        
                    @endforeach


                </tbody>
            
            </table>
            
        </div>
        {{$pedidos->links()}}
    </div>
    
</div>



    

