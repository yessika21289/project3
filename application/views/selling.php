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
        <form class="form-horizontal" method="post" action="<?php echo base_url();?>selling/saveSelling">
          <fieldset>
            <legend>Info Faktur</legend>
            <div class="form-group">
              <label class="control-label col-sm-1" for="sell-date">Tanggal:</label>
              <div class="col-sm-3">
                <input type="date" class="form-control" name="sell-date" id="sell-date" required/>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-1" for="faktur-no">No. Faktur:</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="faktur-no" id="faktur-no" required />
              </div>
              <label class="control-label col-sm-1" for="spj-no">No. SPJ:</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="spj-no" id="spj-no" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-1" for="top">T.O.P:</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="top" id="top" />
              </div>
              <label class="control-label col-sm-1" for="jt-date">Tgl. J.T:</label>
              <div class="col-sm-3">
                <input type="date" class="form-control" name="jt-date" id="jt-date" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-1" for="sales">Sales:</label>
              <div class="col-sm-3">
                <select class="form-control" name="sales" id="sales" required>
                  <option></option>
                  <option>adsfaas</option>
                </select>
              </div>
              <label class="control-label col-sm-1" for="inventory">Gudang:</label>
              <div class="col-sm-3">
                <select class="form-control" name="inventory" id="inventory" required>
                  <option></option>
                  <option>adsfaas</option>
                </select>
              </div>            
            </div>
            <div class="form-group">
              <label class="control-label col-sm-1" for="sales">Pelanggan:</label>
              <div class="col-sm-3"> 
                <input type="text" class="form-control" name="sales" id="sales" placeholder="">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-1" for="inventory">Alamat:</label>
              <div class="col-sm-11">
                <input type="text" class="form-control" name="inventory" id="inventory" placeholder="">
              </div>            
            </div>
          </fieldset>
          <br/><br/>
          <fieldset>
            <legend>Detail Barang</legend>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false"><strong>+</strong> Tambah Barang</button>
            <table class="table table-hover table-striped">
              <thead>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Ukuran</th>
                <th>Qty</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th></th>
                <th></th>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Keramik</td>
                  <td>60 x 90</td>
                  <td>10</td>
                  <td>dos</td>
                  <td><?php echo number_format(1000000,2,',','.');?></td>
                  <td><?php echo number_format(10000000,2,',','.');?></td>
                  <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                  <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Keramik</td>
                  <td>60 x 90</td>
                  <td>10</td>
                  <td>dos</td>
                  <td><?php echo number_format(1000000,2,',','.');?></td>
                  <td><?php echo number_format(10000000,2,',','.');?></td>
                  <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                  <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Keramik</td>
                  <td>60 x 90</td>
                  <td>10</td>
                  <td>dos</td>
                  <td><?php echo number_format(1000000,2,',','.');?></td>
                  <td><?php echo number_format(10000000,2,',','.');?></td>
                  <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                  <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                </tr>
              </tbody>
            </table>
          </fieldset>
          <br/><br/>
          <fieldset>
            <legend>Total</legend>
            <div class="form-group">
              <label class="control-label col-sm-1" for="grand-total">Total:</label>
              <div class="col-sm-3">
                <div class="form-control" id="grand-total">2000000</div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-1" for="grand-discount">Potongan (Rp):</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="grand-discount" id="grand-discount" placeholder="">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-1" for="grand-total-nett">Netto:</label>
              <div class="col-sm-3">
                <div class="form-control" id="grand-total-nett"></div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-1" for="dp">D.P.:</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="dp" id="dp" placeholder="">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-1" for="debt">Kurang:</label>
              <div class="col-sm-3">
                <div class="form-control" id="debt"></div>
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
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-lg">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Barang</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="form-group">
            <label class="control-label col-sm-2" for="item-name">Nama Barang:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="item-name" placeholder="">
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" data-backdrop="static" data-keyboard="false">+</button>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="qty">Qty:</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="qty" placeholder="">
            </div>
            <label class="control-label col-sm-1" for="unit">Satuan:</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" id="unit" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="sell-price">Harga Jual:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="sell-price" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="discount-1">D.1.(%):</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" id="discount-1" placeholder="">
            </div>
            <label class="control-label col-sm-1" for="discount-2">D.2.(%):</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" id="discount-2" placeholder="">
            </div>
            <label class="control-label col-sm-1" for="discount-3">Potongan (Rp):</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" id="discount-3" placeholder="">
            </div>
            <label class="control-label col-sm-2" for="ppn">PPn (%):</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" id="ppn" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="price-nett">Harga Nett:</label>
            <div class="col-sm-4">
              <div class="form-control" id="price-nett"></div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="price-total">Harga Total:</label>
            <div class="col-sm-4">
              <div class="form-control" id="price-total"></div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Tambah</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
      </div>
    </div>
    
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal2" role="dialog">
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