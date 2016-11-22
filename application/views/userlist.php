<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Daftar User</h3>
    </div>
  </div>

  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Daftar User</h2>
          <div class="clearfix"></div>
        </div>
        <button type="button" class="btn btn-primary" onclick="window.location.href='<?php echo base_url(); ?>user/add'">+ Tambah User</button>
        <?php echo $this->session->flashdata('action_user');?>
        <table id="datatable-fixed-header" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Username</th>
              <th class="text-center">Nama</th>
              <th class="text-center">Area</th>
              <th class="text-center"></th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($row as $key => $user) {?>
            <tr>
              <td><?php echo $user->uid;?></td>
              <td><?php echo $user->username;?></td>
              <td><?php echo $user->fullname;?></td>
              <td><?php echo $user->area;?></td>
              <td class="text-center">
                <button type="button" class="btn btn-default" onclick="window.location.href='user/edit/<?php echo $user->uid;?>'">Edit</button>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" onclick="$('#delete-user').text('<?php echo $user->username;?>'); $('#delete-id').val('<?php echo $user->uid;?>');">Delete</button>
              </td>
            </tr>
          <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete User</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="delete-id" value="#id"/>
        <p>Anda yakin ingin menghapus user <span id="delete-user">#id</span>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location.href='user/delete/'+$('#delete-id').val();">Hapus</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    
  </div>
</div>