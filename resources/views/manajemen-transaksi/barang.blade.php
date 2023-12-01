<div class="modal fade" id="modal-barang-data">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
                                </div>
                                <div class="card-body">
                                    <table id="tabel-barang" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Supplier</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah</th>
                                                <th>Harga Beli</th>
                                                <th>Harga Jual</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dtBarang as $barang)
                                                <tr>

                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        @if ($barang->suppliers)
                                                            {{ $barang->suppliers->supplier }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $barang->nama_barang }}</td>
                                                    <td>{{ $barang->jumlah }}</td>
                                                    <td>{{ $barang->harga_beli }}</td>
                                                    <td>{{ $barang->harga_jual }}</td>

                                                    <td>
                                                        <a href="#" class="btn btn-primary tambah-penjualan"
                                                            data-id_barang="{{ $barang->id_barang }}"
                                                            data-nama_barang="{{ $barang->nama_barang }}"
                                                            data-harga_beli="{{ $barang->harga_beli }}"
                                                            data-harga_jual="{{ $barang->harga_jual }}"
                                                            data-jumlah="{{ $barang->jumlah }}">
                                                            Pilih
                                                        </a>
                                                    </td>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
