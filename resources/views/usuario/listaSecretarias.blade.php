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
      
        @foreach ($secretarias as $secretaria)
        <tr>
        <td>{{ $secretaria->us_cedula }}</td>
        <td>{{ $secretaria->us_apellidos }}</td>
        <td>{{ $secretaria->us_nombres }}</td>                                    
        <td>{{ $secretaria->us_correo }}</td>
        <td>{{ $secretaria->us_telefono }}</td>
         <td>
            @if ($secretaria->us_estado)
            <div class="custom-control custom-switch">
            <input type="checkbox" onclick="estadoSecretaria({{ $secretaria->us_cedula }})" class="custom-control-input" id="{{ $secretaria->us_cedula }}" checked>
            <label class="custom-control-label" for="{{ $secretaria->us_cedula }}">Activo</label>
            </div>
            @else
          <div class="custom-control custom-switch">
                <input type="checkbox" onclick="estadoSecretaria({{ $secretaria->us_cedula }})"  class="custom-control-input" id="{{ $secretaria->us_cedula }}" >
                <label class="custom-control-label" for="{{ $secretaria->us_cedula }}">Inactivo</label>
            </div>                              
            @endif
          </td>
          <td><button class="btn btn-outline-primary waves-effect btn-sm" onclick="editarUsuario({{ $secretaria->us_cedula }})" type="button"><ion-icon name="create"></ion-icon>Editar</button></td> 
        </tr>
          @endforeach                                    
      
    </tbody>
</table>