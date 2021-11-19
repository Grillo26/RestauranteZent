<!-- component -->
<div class="another-modal fixed w-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">
    <div class="border border-blue-500 shadow-lg modal-container bg-white w-4/12 md:max-w-11/12 mx-auto rounded-xl shadow-lg z-50 overflow-y-auto">
      <div class="modal-content py-4 pb-1 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold text-gray-500">Datos del Cliente</p>
        </div>
        <!--Body-->
        <div class="my-5 mr-5 ml-5 flex justify-center">
                    <form method="POST" id=""  class="w-full">
                        <div class="">
                          <!--Nombre-->
                          <div class="">
                            <label for="nombre" class="text-md text-gray-600">Nombre completo</label>
                          </div>
                          <div class="">
                            <input type="text" id="nombre" wire:model="nombre" autocomplete="off" name="nombre" class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md" placeholder="Ejemplo. Carlos Mamani">
                          </div>

                          <!--Telefono-->
                          <div class="">
                            <label for="telefono" class="text-md text-gray-600">Telefono</label>
                          </div>
                          <div class="">
                            <input type="text" id="telefono" wire:model="telefono" autocomplete="off" name="telefono" class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md" placeholder="Ejemplo. 61989575">
                          </div>
  
                          <!--Direccion-->
                          <div class="">
                            <label for="direccion" class="text-md text-gray-600">Dirección Domicilio</label>
                          </div>
                          <div class="">
                            <input type="text" id="direccion" wire:model="direccion" autocomplete="off" name="direccion" class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md" placeholder="Ejemplo. Av. San Martín">
                          </div>
  
                          <!--Tipo--> 
                          <div class="">
                            <label for="tipo" class="text-md text-gray-600">Tipo de Personal</label>
                          </div>
                          <div class="">
                              <select name="tipo" id="tipo">
                                  @foreach ($personals as $item)
                                    <option value="{{$item->id}}">{{$item->nombre_personal}}</option>  
                                  @endforeach  
                              </select>
                          </div>
                        </div>
  
                        <!--Turno-->
                        <div class="">
                          <label for="turno" class="text-md text-gray-600">turno</label>
                        </div>
                        <div class="">
                          <input type="text" id="turno" wire:model="turno" autocomplete="off" name="turno" class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md" placeholder="Ejemplo. Noche">
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