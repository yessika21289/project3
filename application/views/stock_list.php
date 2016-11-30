<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Daftar Stok Barang<small> di seluruh gudang</small></h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <!-- Large modal -->
    <button type="button" id="add-stock-btn" class="btn btn-success" data-toggle="modal">Tambah Stok</button>

    <div class="modal fade add-stock-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Stok</h4>
                </div>
                <div class="modal-body">
                    <form id="add-stock-form" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url(); ?>stocks/add-data" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="category_name" name="category_name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ukuran</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="length" placeholder="panjang">
                                        <span class="input-group-addon">cm</span>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="wide" placeholder="lebar">
                                        <span class="input-group-addon">cm</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Stok</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="box" placeholder="total">
                                        <span class="input-group-addon">box</span>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">@</span>
                                        <input class="form-control" type="text" name="qty" placeholder="isi">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga Jual
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">Rp</span>
                                    <input type="text" name="selling_price" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                        </div>

                        <!--<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Gudang
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="false">
                                    Default <span class="caret"></span>
                                </button>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#">Action</a>
                                    </li>
                                    <li><a href="#">Another action</a>
                                    </li>
                                    <li><a href="#">Something else here</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a>
                                    </li>
                                </ul>
                            </div>
                        </div>-->

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Stok Barang</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="stocks-table" class="table table-hover table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th>Nama</th>
                                <th>Ukuran</th>
                                <th>Isi @dos</th>
                                <th>Total Stok <small>(dos)</small></th>
                                <th>Total Stok <small>(pcs)</small></th>
                                <th>Total Luas <small>(m<sup>2</sup>)</small></th>
                                <th>Harga Jual</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
