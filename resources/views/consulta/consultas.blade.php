
<table id="__tablaprueba" class="table table-striped table-bordered table-sm " cellspacing="0">
    <thead>
      <tr>
        <th><ion-icon name="calendar"></ion-icon>Fecha de Consulta</th>
        <th><ion-icon name="help"></ion-icon>Motivo de Consulta</th>
        <th><ion-icon name="medical"></ion-icon>Op/Oft</th>
        <th><ion-icon name="help"></ion-icon>Sucursal</th>
        <th><ion-icon name="more"></ion-icon>Opciones</th>
        <th><ion-icon name="document"></ion-icon>Certificado</th>
      </tr>
    </thead>
    <tbody> 
        @foreach ($consultas as $consulta)
        <tr>
        <td>{{ date("d/m/Y",strtotime($consulta->co_fecha )) }} </td>
        <td>{{ $consulta->co_motivo }}</td>
        <td>{{ $consulta->usuario->us_apellidos }} {{ $consulta->usuario->us_nombres }}</td>
        <td>{{ $consulta->sucursal->su_ciudad  }} </td>
        <td><a href='obtenerConsulta?co_id={{ $consulta->co_id }}' class='btn btn-info btn-sm'><ion-icon name='eye'/>Ver</a>
        <td><a  style='margin-left:5px;' class='btn btn-success btn-sm' onclick='generar({{ $consulta->co_id }})'><ion-icon name='print'></ion-icon>Generar Certificado</a></td>
        </tr>
            
        @endforeach         
    </tbody>
  </table>