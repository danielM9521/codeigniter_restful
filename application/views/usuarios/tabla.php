<?php
foreach ($usuarios as $usuario) : ?>
  <tr>
    <td><?php echo $usuario->id ?></td>
    <td><?php echo $usuario->nombre ?></td>
    <td><?php echo $usuario->apellido ?></td>
    <!-- Se pone clase porque son muchos y si se pueden repetir en js -->
    <td><button class="btnEditar" value="<?php echo $usuario->id ?>">Editar</button></td>
    <td><button class="btnEliminar" value="<?php echo $usuario->id ?>">Eliminar</button></td>
  </tr>
<?php
endforeach;
?>