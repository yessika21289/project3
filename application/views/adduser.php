<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Tambah User</h3>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Tambah User</h2>
          <div class="clearfix"></div>
        </div>
        <?php echo $this->session->flashdata('error');?>
        <form class="form-horizontal" id="form-user" method="POST" action="<?php echo base_url(); ?>user/addedit_process">
        <?php if(isset($user_id)):?>
          <input type="hidden" name="user_id" id="user-id" value="<?php print_r($user_id);?>">
        <?php endif;?>
        <div class="notif-box bg-danger text-danger user-error" style="display:none">Username sudah terpakai.</div>
        <div class="notif-box bg-danger text-danger pwd-error" style="display:none">Password tidak sama.</div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Username:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="username" pattern='[\w\.]+' id="username" value="<?php print_r((isset($user_id)) ? $row[0]->username : '');?>" placeholder="Hanya huruf, angka, dan titik, contoh: gani.marble2016" required/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Password:</label>
            <div class="col-sm-10"> 
              <input type="password" class="form-control" name="pwd" id="pwd" <?php print_r((isset($user_id)) ? '' : 'required minlength="6"');?> />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Konfimasi Password:</label>
            <div class="col-sm-10"> 
              <input type="password" class="form-control" name="conf-pwd" id="conf-pwd" <?php print_r((isset($user_id)) ? '' : 'required minlength="6"');?> />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Nama Lengkap:</label>
            <div class="col-sm-10"> 
              <input type="text" class="form-control" name="nama" id="nama" value="<?php print_r((isset($user_id)) ? $row[0]->fullname : '');?>" required/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Area:</label>
            <div class="col-sm-10"> 
              <input type="text" class="form-control area-form" data-provide="typeahead" autocomplete="off" name="area" id="area" value="<?php print_r((isset($user_id)) ? $row[0]->area : '');?>" required/>
            </div>
          </div>
          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
            <?php if(isset($user_id)):?>
              <button type="submit" class="btn btn-success" onclick="check_pwd(event);">Edit</button>
            <?php else:?>
              <button type="submit" class="btn btn-success" onclick="check_pwd(event);check_duplicate_user(event,$('#username').val());">Submit</button>
            <?php endif;?>
              <button type="button" class="btn btn-default" onclick="window.location.href='<?php echo base_url(); ?>user';">Batal</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>