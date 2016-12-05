<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Penjualan</h3>
    </div>
  </div>

  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <!-- <div class="x_title">
          <h2>Form Penjualan</h2>
          <div class="clearfix"></div>
        </div> -->
        <?php echo $this->session->flashdata('save_faktur');?>
        <form class="form-horizontal" id="selling-header" method="post" action="<?php echo base_url();?>selling/saveSelling">
          <input type="hidden" name="selling-id" id="selling-id" value="<?php echo $selling_id;?>" />
          <fieldset>
            <legend>Info Faktur</legend>
            <div class="form-group">
              <label class="control-label col-sm-1" for="faktur-date">Tanggal:</label>
              <div class="col-sm-3">
                <input type="date" class="form-control" name="faktur-date" id="faktur-date" value="<?php echo date('Y-m-d',$selling[0]['date_faktur']);?>" required/>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-1" for="faktur-no">No. Faktur:</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="faktur-no" id="faktur-no" value="<?php echo $selling[0]['no_faktur'];?>" required />
              </div>
              <label class="control-label col-sm-1" for="spj-no">No. SPJ:</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="spj-no" id="spj-no" value="<?php echo $selling[0]['no_spj'];?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-1" for="top">T.O.P:</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="top" id="top" value="<?php echo $selling[0]['top'];?>" />
              </div>
              <label class="control-label col-sm-1" for="jt-date">Tgl. J.T:</label>
              <div class="col-sm-3">
                <input type="date" class="form-control" name="jt-date" id="jt-date" value="<?php echo ($selling[0]['date_jt']) ? date('Y-m-d',$selling[0]['date_jt']) : '';?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-1" for="sales">Sales:</label>
              <div class="col-sm-3">
                <select class="form-control" name="sales" id="sales" required>
                  <option></option>
                  <?php
                  print_r($sales);
                  foreach ($sales as $sl) {
                    $selected = ($selling[0]['sales_id'] != $sl['KODE']) ? '' : 'selected';
                    echo "<option value='".$sl['KODE']."' ".$selected.">".$sl['NAMA']."</option>";
                  }
                  ?>
                </select>
              </div>
              <label class="control-label col-sm-1" for="warehosue">Gudang:</label>
              <div class="col-sm-3">
                <select class="form-control" name="warehouse" id="warehouse" required>
                  <option></option>
                  <?php
                  foreach ($warehouse as $wh) {
                    $selected = ($selling[0]['warehouse_id'] != $wh['wid']) ? '' : 'selected';
                    echo "<option value='".$wh['wid']."' ".$selected.">".$wh['name']." - ".$wh['address']."</option>";
                  }
                  ?>
                </select>
              </div>            
            </div>
            <div class="form-group">
              <label class="control-label col-sm-1" for="cust-name">Pelanggan:</label>
              <div class="col-sm-3">
                <input type="hidden" name="cust-id" id="cust-id" value="<?php echo $selling[0]['cust_id'];?>" />
                <input type="text" class="form-control" name="cust-name" id="cust-name" value="<?php echo $selling[0]['NAMA'];?>" readonly />
              </div>
              <div class="col-sm-1">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#customer-modal" data-backdrop="static" data-keyboard="false">+</button>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-1" for="cust-address">Alamat:</label>
              <div class="col-sm-11">
                <input type="text" class="form-control" name="cust-address" id="cust-address" value="<?php echo $selling[0]['ALAMAT'];?>" readonly />
              </div>            
            </div>
          </fieldset>
          <br/><br/>
          <fieldset>
            <legend>Detail Barang</legend>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-product-selling-modal" data-backdrop="static" data-keyboard="false"><strong>+</strong> Tambah Barang</button>
            <table id="list-product-selling" class="table table-hover table-striped">
              <thead>
                <th>Product ID</th>
                <th>Qty</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Harga Total</th>
              </thead>
              <tbody>
              </tbody>
            </table>
          </fieldset>
          <br/><br/>
          <fieldset>
            <legend>Total</legend>
            <div class="form-group">
              <label class="control-label col-sm-1" for="grand-total">Total:</label>
              <div class="col-sm-3">
                <input class="form-control" name="grand-total" id="grand-total" readonly />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-1" for="grand-discount">Potongan (Rp):</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="grand-discount" id="grand-discount" value="<?php echo $selling[0]['discount'];?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-1" for="grand-total-nett">Netto:</label>
              <div class="col-sm-3">
                <input class="form-control" name="grand-total-nett" id="grand-total-nett" readonly />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-1" for="dp">D.P.:</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="dp" id="dp" value="<?php echo $selling[0]['dp'];?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-1" for="debt">Kurang:</label>
              <div class="col-sm-3">
                <input class="form-control" name="debt" id="debt" readonly />
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-1 col-sm-11">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="submit" class="btn btn-warning">Simpan &amp; Cetak</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="add-product-selling-modal" role="dialog">
  <div class="modal-dialog modal-lg">
    <form class="form-horizontal" id="add-product-selling">
      <input type="hidden" name="selling-id" id="selling-id" value="<?php echo $selling_id;?>" />
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Barang</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-sm-2" for="product-name">Nama Barang:</label>
            <div class="col-sm-9">
              <input type="hidden" name="product-id" id="product-id" value="1" />
              <input type="text" class="form-control" name="product-name" id="product-name" value="slfjhsadifjsaf" readonly required />
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#test" data-keyboard="false">+</button>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="qty">Qty:</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" name="qty" id="qty" required />
            </div>
            <label class="control-label col-sm-1" for="unit">Satuan:</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" name="unit" id="unit" required />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="sell-price">Harga Jual:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="sell-price" id="sell-price" autocomplete="off" required />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="discount-1">D.1.(%):</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" name="discount-1" id="discount-1" />
            </div>
            <label class="control-label col-sm-1" for="discount-2">D.2.(%):</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" name="discount-2" id="discount-2" />
            </div>
            <label class="control-label col-sm-1" for="discount-3">Potongan (Rp):</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" name="discount-3" id="discount-3" />
            </div>
            <label class="control-label col-sm-2" for="ppn">PPn (%):</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" name="ppn" id="ppn" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="price-nett">Harga Nett:</label>
            <div class="col-sm-4">
              <input class="form-control" name="price-nett" id="price-nett" readonly />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="price-total">Harga Total:</label>
            <div class="col-sm-4">
              <input class="form-control" name="price-total" id="price-total" readonly />
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Tambah</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="product-list-modal" role="dialog">
  <div class="modal-dialog modal-lg" style="background-color:yellow;">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Daftar Barang</h4>
      </div>
      <div class="modal-body">
        <table id="stocks-table-selling" class="table table-hover table-striped">
          <thead>
            <th>Kategori</th>
            <th>ID</th>
            <th>Nama</th>
            <th>Ukuran</th>
            <th>Isi @dos</th>
            <th>Total Stok <small>(dos)</small></th>
            <th>Total Stok <small>(pcs)</small></th>
            <th>Total Luas <small>(m<sup>2</sup>)</small></th>
            <th>Harga Jual</th>
            <th></th>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
      </div>
    </div>
    
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="customer-modal" role="dialog">
  <div class="modal-dialog modal-lg" style="background-color:yellow;">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Daftar Pelanggan</h4>
      </div>
      <div class="modal-body">
        <table id="customer-table" class="table table-hover table-striped" width="100%">
          <thead>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>Telp</th>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
      </div>
    </div>
    
  </div>
</div>

<div class="modal fade" id="test" role="dialog">

  <div class="modal-dialog modal-lg" style="background-color:yellow;">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Daftar Pelanggan</h4>
      </div>
      <div class="modal-body">
        <table id="customer-table" class="table table-hover table-striped" width="100%">
          <thead>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>Telp</th>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>