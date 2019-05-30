<table class="table table-sm table-responsive-sm">
    <thead>
      <tr>
        <th scope="col">Cédula</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Nombres</th>                                    
        <th scope="col">Correo</th>
        <th scope="col">Celular/Telefono</th>
        <th scope="col">Estado</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
      
        @foreach ($optometristas as $optometrista)
        <tr>
        <td>{{ $optometrista->us_cedula }}</td>
        <td>{{ $optometrista->us_apellidos }}</td>
        <td>{{ $optometrista->us_nombres }}</td>                                    
        <td>{{ $optometrista->us_correo }}</td>
        <td>{{ $optometrista->us_telefono }}</td>
        <td>
            @if ($optometrista->us_estado)
            <div class="custom-control custom-switch">
            <input type="checkbox" onclick="estadoOptometrista({{ $optometrista->us_cedula }})" class="custom-control-input" id="{{ $optometrista->us_cedula }}" checked>
            <label class="custom-control-label" for="{{ $optometrista->us_cedula }}">Activo</label>
            </div>
            @else
          <div class="custom-control custom-switch">
                <input type="checkbox" onclick="estadoOptometrista({{ $optometrista->us_cedula }})" class="custom-control-input" id="{{ $optometrista->us_cedula }}" >
                <label class="custom-control-label" for="{{ $optometrista->us_cedula }}">Inactivo</label>
            </div>                              
            @endif
          </td>
          <td><button class="btn btn-outline-primary waves-effect btn-sm" onclick="editarUsuario({{ $optometrista->us_cedula }})" type="button"><ion-icon name="create"></ion-icon>Editar</button></td> 
        </tr>
          @endforeach                                    
      
    </tbody>
</table>