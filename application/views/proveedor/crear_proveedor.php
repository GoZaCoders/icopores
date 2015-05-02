
<form action="<?=base_url()?>proveedor/insertar_proveedor" method="post">
                      <td></td>
                      <td><input type="text" value="<?= set_value('nombre_proveedor',$dato['nombre_proveedor']);?>" name="nombre_proveedor" /></td>
                      <td><input type="text" value="<?= set_value('direccion',$dato['direccion']);?>" name="direccion" /></td>
                      <td><input type="text" value="<?= set_value('telefono',$dato['telefono']);?>" name="telefono" /> </td>
                      <td><input type="text" value="<?= set_value('correo',$dato['correo']);?>" name="correo" /></td>
                      <td> <input type="submit" name="guardar" value="Guardar" class="btn btn-primary"/></td>
</form>