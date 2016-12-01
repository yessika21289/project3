<?php echo time(); ?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tambah Stok</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form data-parsley-validate class="add-stock-form form-horizontal form-label-left" action="<?php echo base_url(); ?>stocks/add-data" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gudang</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control">
                                <option>Choose option</option>
                                <option>Option one</option>
                                <option>Option two</option>
                                <option>Option three</option>
                                <option>Option four</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input autocomplete="off" type="text" name="category_name" data-provide="typeahead" required class="category form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input autocomplete="off" type="text" name="name" data-provide="typeahead" required="required" class="name form-control col-md-7 col-xs-12">
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
                                <input type="text" name="selling_price" class="form-control col-md-7 col-xs-12 amount" data-a-sep="." data-a-dec=",">
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
                            <a href="<?php echo site_url('stocks'); ?>" class="btn btn-primary" data-dismiss="modal">Batal</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>