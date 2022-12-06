<div>
    @if ($interfaz)
        <div class="row pt-3">
            <div class="col-12">
                <div class="card m-2 p-2">
                    <div class="mb-3">
                        @if (!$showEncript)
                            <label for="search" class="form-label"><strong> ID</strong></label>
                            <input wire:model='search' type="text" class="form-control form-control-sm" id="search" placeholder="Digite un Id">
                        @endif
                    </div>
                    @if ($showEncript)
                        Data
                        <ul>
                            <li>{{$nombre_apellido}}</li>
                            <li>{{$codigo}}</li>
                            <li>{{$numero_tarjeta}}</li>
                            <li>{{$vencimiento}}</li>
                        </ul>
                    @else
                        <div class="row pt-3">
                            <div class="col-12">
                                Buscar Dato
                            </div>
                        </div>                               
                    @endif

                    <div class="col-12">
                        @if ($showEncript)
                            @if ($enc)
                                <button wire:click='DessencriptarBusqueda' class="btn btn-sm btn-danger">Desencriptar</button>
                            @else
                                <button wire:click='EncriptarBusqueda' class="btn btn-sm btn-info">Encriptar</button>
                            @endif
                        @else
                            <button wire:click='searchData' class="btn btn-sm btn-info">Buscar</button>                
                        @endif
                    </div>
                </div>
            </div>
           
        </div>



    @else
        @if ($form)
            <div class="row pt-3">
                <div class="col-12">
                    <div class="card m-2 p-2">
                        <div class="mb-3">
                            <label for="numero_tarjeta" class="form-label"><strong> Nùmero Tarjeta</strong></label>
                            <input wire:model='numero_tarjeta' type="text" class="form-control form-control-sm" id="numero_tarjeta" placeholder="xx xx xx">
                        </div>

                        <div class="mb-3">
                            <label for="nombre_apellido" class="form-label"><strong> Nombre y Apellido</strong></label>
                            <input wire:model='nombre_apellido' type="text" class="form-control form-control-sm" id="nombre_apellido" placeholder="Nombre y Apellidos">
                        </div>

                        <div class="mb-3">
                            <label for="vencimiento" class="form-label"><strong> Vencimiento</strong></label>
                            <input wire:model='vencimiento' type="text" class="form-control form-control-sm" id="vencimiento" placeholder="xx xx">
                        </div>

                        <div class="mb-3">
                            <label for="codigo" class="form-label"><strong> Codigo</strong></label>
                            <input wire:model='codigo' type="email" class="form-control form-control-sm" id="codigo" placeholder="xxxx xxxx">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button wire:click='saveEncriptation' class="btn btn-sm btn-primary">Enviar</button>
                    <button wire:click='showSearch' class="btn btn-sm btn-info">Ver Search</button>
                </div>
            </div>
        @else
            <div class="card p-2 m-2">
                Tarjeta  : {{$numero_tarjeta }} <br>
                Apellido : {{$nombre_apellido }} <br>
                Vencimiento : {{$vencimiento }} <br>
                Codigo : {{$codigo }} <br>

                <div>
                    <button wire:click='desencriptarData' class="btn btn-sm btn-success">Desencriptar</button>
                    <button wire:click='cerrarForm' class="btn btn-sm btn-danger">Cerrar</button>
                </div>

            </div>        
        @endif
    @endif
</div>
