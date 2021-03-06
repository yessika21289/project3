<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Daftar Stok Barang<small> di seluruh gudang</small></h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <!-- Large modal -->
    <a href="<?php echo site_url('stocks/add'); ?>" id="add-stock-btn" class="btn btn-success" data-toggle="modal">Tambah Stok</a>

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
