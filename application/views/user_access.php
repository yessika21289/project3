<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>User</h3>
    </div>
  </div>

  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Akses User</h2>
          <div class="clearfix"></div>
        </div>
        
        <table id="table-user-access" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th class="text-center" rowspan="2">Hak Akses</th>
              <th class="text-center" colspan="4">Role</th>
            </tr>
            <tr>
              <th class="text-center">Administrator</th>
              <th class="text-center">Sales</th>
              <th class="text-center">Gudang</th>
              <th class="text-center">Kasir</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($row as $key => $permission) {?>
            <tr>
              <td><?php echo $permission->permission;?></td>
              <td class="text-center">
                <?php
                  $id = $permission->id.'-Administrator';
                  $checked = ($permission->administrator) ? 'checked' : '';
                ?>
                <input type="checkbox" class="permission" id="<?php echo $id;?>" <?php echo $checked;?> />
              </td>
              <td class="text-center">
                <?php
                  $id = $permission->id.'-Sales';
                  $checked = ($permission->sales) ? 'checked' : '';
                ?>
                <input type="checkbox" class="permission" id="<?php echo $id;?>" <?php echo $checked;?> />
              </td>
              <td class="text-center">
                <?php
                  $id = $permission->id.'-Warehouse';
                  $checked = ($permission->warehouse) ? 'checked' : '';
                ?>
                <input type="checkbox" class="permission" id="<?php echo $id;?>" <?php echo $checked;?> />
              </td>
              <td class="text-center">
                <?php
                  $id = $permission->id.'-Cashier';
                  $checked = ($permission->cashier) ? 'checked' : '';
                ?>
                <input type="checkbox" class="permission" id="<?php echo $id;?>" <?php echo $checked;?> />
              </td>
            </tr>
          <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>