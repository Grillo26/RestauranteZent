<x-slot name="header">
    <h1 class="text-gray-900">Lista de Ventas Realizados</h1>
</x-slot>
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

        <button wire:click="crear()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
        >Nuevo</button> <br><br>

        @if ($modal)
            @include('livewire.crearVenta')
        @endif
            <table class="table-fixed w-full">
                <thead>
                    <!--Head of table-->
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2">Id Pedido</th>
                        <th class="px-4 py-2">Nro Documento</th>
                        <th class="px-4 py-2">Tipo Docum</th>
                        <th class="px-4 py-2">Sub total</th>
                        <th class="px-4 py-2">Iva</th>
                        <th class="px-4 py-2">Propina</th>
                        <th class="px-4 py-2">total</th>
                        <th class="px-4 py-2">Fecha Pedido</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach ($ventas as $venta) 
                    <!--Body of table-->
                    <tr>
                        @foreach ($pedidos as $pedido)
                        @if ($venta->id_pedido == $pedido->id)
                        <td class="border px-4 py-2">{{$pedido->id}}</td>  
                        @endif
                        @endforeach

                        <td class="border px-4 py-2">{{$venta->nro_doc}}</td>
                        <td class="border px-4 py-2">{{$venta->tipo_doc}}</td>
                        <td class="border px-4 py-2">{{$venta->sub_totla}}</td>
                        <td class="border px-4 py-2">{{$venta->iva}}</td>
                        <td class="border px-4 py-2">{{$venta->propina}}</td>
                        <td class="border px-4 py-2">{{$venta->total}}</td>
                        <td class="border px-4 py-2">{{$venta->fecha_pedido}}</td>
                        <td class="border px-4 py-2 text-center"> 
                            <button wire:click="editar({{$personal->id}})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</button>
                            <button wire:click="borrar({{$personal->id}})" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Borrar</button>
                        </td>
                    </tr>
                        
                    @endforeach


                </tbody>
            
            </table>
            
        </div>
        {{$ventas->links()}}
    </div>
    
</div>



    

