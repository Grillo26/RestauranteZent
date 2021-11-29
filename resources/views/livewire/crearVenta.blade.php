<!-- component -->
<div class="another-modal fixed w-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">
    <div class="border border-blue-500 shadow-lg modal-container bg-white w-4/12 md:max-w-11/12 mx-auto rounded-xl shadow-lg z-50 overflow-y-auto">
      <div class="modal-content py-4 pb-1 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold text-gray-500">Datos de Venta</p>
        </div>
        <!--Body-->
        <div class="my-5 mr-5 ml-5 flex justify-center">
                    <form method="POST" id=""  class="w-full">
                        <div class="">
                            <!--Pedido--> 
                            <div class="">
                                <label for="cliente class="text-md text-gray-600">Pedido</label>
                            </div>
                            <div class="block text-left">
                              <select wire:model="id_pedido" class="w-full p-3 text-base border-gray-300 placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                                @foreach ($pedidos as $pedido)
                                <option  value="{{$pedido->id}}">{{$pedido->tipo_pedido}}</option>  
                                @endforeach     
                              </select></br></br>
                            </div>

                            <!--NroDoc-->
                            <div class="">
                                <label for="doc" class="text-md text-gray-600">Numero de Documento</label>
                            </div>
                            <div class="">
                                <input type="text" id="doc" wire:model="doc" autocomplete="off" name="doc" class="h-3 p-6  border-2 border-gray-300 mb-5 rounded-md" placeholder="Ejemplo. 10624926 tja">
                            </div>

                            <!--tipoDoc-->
                            <div class="">
                                <label for="tipo_doc" class="text-md text-gray-600">tipoDoc</label>
                            </div>
                            <div class="">
                                <input type="text" id="doc" wire:model="tipo_doc" name="tipo_doc" class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md" placeholder="Ejemplo. Cédula de Identidad">
                            </div>

                            <!--subTotal-->
                            <div class="">
                                <label for="sub_to" class="text-md text-gray-600">Sub Total</label>
                            </div>
                            <div class="">
                                <input type="text" id="sub_to" wire:model="sub_to" name="sub_to" class="h-3 p-6 border-2 border-gray-300 mb-5 rounded-md" placeholder="Ejemplo. 100">
                            </div>

                            <!--Iva-->
                            <div class="">
                                <label for="iva" class="text-md text-gray-600">Iva</label>
                            </div>
                            <div class="">
                                <input type="text" id="iva" wire:model="iva" name="iva" class="h-3 p-6 border-2 border-gray-300 mb-5 rounded-md" placeholder="Ejemplo. 13%">
                            </div>

                            <!--Propina-->
                            <div class="">
                                <label for="propina" class="text-md text-gray-600">Propina</label>
                            </div>
                            <div class="">
                                <input type="text" id="propina" wire:model="propina" name="propina" class="h-3 p-6 border-2 border-gray-300 mb-5 rounded-md" placeholder="Ejemplo. 10bs">
                            </div>

                            <!--subTotal-->
                            <div class="">
                                <label for="total" class="text-md text-gray-600">Total</label>
                            </div>
                            <div class="">
                                <input type="text" id="total" wire:model="total" name="total" class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md" placeholder="Ejemplo. 1000bs">
                            </div>

                            <!--Fecha-->
                            <div class="">
                                <label for="fecha" class="text-md text-gray-600">Telefono</label>
                            </div>
                            <div class="">
                                <input type="text" id="fecha" wire:model="fecha" autocomplete="off" name="fecha" class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md" placeholder="Ejemplo. 11/10/2021">
                            </div>

                        </div>
                    </form>
        </div>
        <!--Footer-->
        <div class="flex justify-center pt-1 pb-6 space-x-13">
          <button
            wire:click="cerrarModal()" type="button" class="px-4 bg-gray-200 p-3 rounded text-black hover:bg-gray-300 font-semibold">Cancelar</button>
          <button
            wire:click.prevent="guardar()" type="button" class="px-4 bg-blue-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400" >Guardar</button>
        </div>
      </div>
    </div>
  </div>