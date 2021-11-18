<!-- component -->
<div class="another-modal fixed w-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">
    <div class="border border-blue-500 shadow-lg modal-container bg-white w-4/12 md:max-w-11/12 mx-auto rounded-xl shadow-lg z-50 overflow-y-auto">
      <div class="modal-content py-4 pb-1 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold text-gray-500">Datos de Insumos</p>
        </div>
        <!--Body-->
        <div class="my-5 mr-5 ml-5 flex justify-center">
                    <form method="POST" id=""  class="w-full">
                        <div class="">
                          <!--Nombre-->
                          <div class="">
                            <label for="nombre" class="text-md text-gray-600">Nombre insumo</label>
                          </div>
                          <div class="">
                            <input type="text" id="nombre" wire:model="nombre" autocomplete="off" name="nombre" class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md" placeholder="Ejemplo. Arroz">
                          </div>
  
                          <!--cantidad-->
                          <div class="">
                            <label for="cantidad" class="text-md text-gray-600">Cantidad</label>
                          </div>
                          <div class="">
                            <input type="text" id="cantidad" wire:model="cantidad" autocomplete="off" name="cantidad" class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md" placeholder="Ejemplo. 100">
                          </div>
  
                          <!--Unidad de Medida-->
                          <div class="">
                            <label for="medida" class="text-md text-gray-600">Unidad de Medida</label>
                          </div>
                          <div class="">
                            <input type="text" id="medida" wire:model="medida" autocomplete="off" name="medida" class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md" placeholder="Ejemplo. Kg">
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