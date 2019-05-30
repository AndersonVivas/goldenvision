<table class="table table-sm table-responsive-sm">
    <thead>
      <tr>
        <th scope="col">Cédula</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Nombres</th>                                    
        <th scope="col">Correo</th>
        <th scope="col">Celular/Telefono</th>
        <th scope="col">Estado</th>
        <th scope="col"><ion-icon name="options"></ion-icon>Opciones</th>
      </tr>
    </thead>
    <tbody>
      
        @foreach ($administradores as $administrador)
        <tr>
        <td>{{ $administrador->us_cedula }}</td>
        <td>{{ $administrador->us_apellidos }}</td>
        <td>{{ $administrador->us_nombres }}</td>                                    
        <td>{{ $administrador->us_correo }}</td>
        <td>{{ $administrador->us_telefono }}</td>
        <td>
        @if ($administrador->us_estado)
        <div class="custom-control custom-switch">
        <input type="checkbox" onclick="estadoAdministrador({{ $administrador->us_cedula }})" class="custom-control-input" id="{{ $administrador->us_cedula }}" checked>
        <label class="custom-control-label" for="{{ $administrador->us_cedula }}">Activo</label>
        </div>
        @else
      <div class="custom-control custom-switch">
            <input type="checkbox" onclick="estadoAdministrador({{ $administrador->us_cedula }})" class="custom-control-input" id="{{ $administrador->us_cedula }}" >
            <label class="custom-control-label" for="{{ $administrador->us_cedula }}">Inactivo</label>
        </div>                              
        @endif
      </td>  
      <td><button class="btn btn-outline-primary waves-effect btn-sm" onclick="editarUsuario({{ $administrador->us_cedula }})" type="button"><ion-icon name="create"></ion-icon>Editar</button></td>
    </tr>
      @endforeach                                    
      
    </tbody>
</table>