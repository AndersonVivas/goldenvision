
<table id="__tablaprueba" class="table table-striped table-bordered table-sm " cellspacing="0">
    <thead>
      <tr>
        <th style="color:#2E519f"><strong><ion-icon style="color:#b49b3e;font-size: 15px" name="calendar"></ion-icon> Fecha de Consulta</strong></th>
        <th style="color:#2E519f"><strong><ion-icon style="color:#b49b3e;font-size: 15px" name="help"></ion-icon> Motivo de Consulta</strong></th>
        <th style="color:#2E519f"><strong><ion-icon style="color:#b49b3e;font-size: 15px" name="medical"></ion-icon> Op/Oft</strong></th>
        <th style="color:#2E519f"><strong><ion-icon style="color:#b49b3e;font-size: 15px" name="help"></ion-icon> Sucursal</strong></th>
        <th style="color:#2E519f"><strong><ion-icon style="color:#b49b3e;font-size: 15px" name="more"></ion-icon> Opciones</strong></th>
        <th style="color:#2E519f"><strong><ion-icon style="color:#b49b3e;font-size: 15px" name="document"></ion-icon> Certificado</strong></th>
      </tr>
    </thead>
    <tbody> 
        @foreach ($consultas as $consulta)
        <tr>
        <td>{{ date("d/m/Y",strtotime($consulta->co_fecha )) }} </td>
        <td>{{ $consulta->co_motivo }}</td>
        <td>{{ $consulta->usuario->us_apellidos }} {{ $consulta->usuario->us_nombres }}</td>
        <td>{{ $consulta->sucursal->su_ciudad  }} </td>
        <td><a href='obtenerConsulta?co_id={{ $consulta->co_id }}' class='btn btn-sm' style="background: #b49b3e;color:white"><ion-icon name='eye'/>Ver</a>
        <td><a  class='btn  btn-sm' style="background: #9aa0a6;color: white;" onclick='generar({{ $consulta->co_id }})'><ion-icon name='print'></ion-icon>Generar Certificado</a></td>
        <td><a onclick="CargarSecreConsulta( {{ $consulta->co_id }})" class='btn btn-sm' style="background: #2E519f;color:white"><ion-icon name='attach'/>Generar Pedido</a>
      </tr>
            
        @endforeach         
    </tbody>
  </table>