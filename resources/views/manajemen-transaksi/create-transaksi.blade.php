@extends('layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manajemen transaksi
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <a href="#" data-toggle="modal" data-target="#modal-barang-data"
                            class="btn btn-info btn-flat">Pilih Barang
                            <i class="m-r2 fa fa-arrow-right"></i></a>

                        <form action="{{ route('manajemen-transaksi.simpan-transaksi') }}"  method="post">
                            @csrf
                            @method('POST')
                            <table id="tabeltransaksi" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Barang</th>
                                        <th>Stok</th>
                                        <th>Harga Jual</th>
                                        <th>Harga Beli</th>
                                        <th>Jumlah</th>
                                        <th>Total harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
    
                            <div class="row">
                                <div class="col-md-7">
                                    <div style="background-color: #007BFF; color: #fff; padding: 1rem;">
                                        <div id="tampil-terbilang" class="alert alert-primary text-center display-4">
                                            Total:
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-5">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>
                                                    <label for="diterima"
                                                        class="col-form-label col-form-label-lg">DITERIMA</label>
                                                </th>
                                                <td>
                                                    <input type="text" id="diterima" name="diterima"
                                                        class="form-control form-control-lg" value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Total Penjualan:</th>
                                                <td>
                                                    <input type="text" id="total_penjualan" class="form-control"
                                                        name="total_penjualan" value="" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Total Item:</th>
                                                <td>
                                                    <input type="text" id="total_item" class="form-control" name="total_item"
                                                        value="" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Kembalian:</th>
                                                <td>
                                                    <input type="text" id="kembalian" class="form-control" name="kembalian"
                                                        value="" readonly>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <input name="id_transaksi" type="text" value="{{ $transaksi->id_transaksi }}" readonly >
                                    <input name="id_user" type="text" value="{{ auth()->id() }}" readonly >
                                    <button type="submit" class="btn btn-primary float-right">
                                        <i class="fas fa-download"></i> Generate PDF
                                    </button>
                                </div>
                               
                                
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->

    @includeIf('manajemen-transaksi.barang')
@endsection
@push('script')
    <script>
         function formatUang(angka) {
            return 'Rp' + angka.toLocaleString('id-ID');
        }
        $(document).ready(function() {
            var table = $('#tabeltransaksi').DataTable();
            function updatetotal_harga(row) {
                var hargaJual = parseFloat($(row).find('input[name="harga_jual[]"]').val());
                var jumlah = parseInt($(row).find('input[name="jumlah[]"]').val());
                var total_harga = hargaJual * jumlah;
                $(row).find('input[name="total_harga[]"]').val(total_harga);
                hitungTotal();
            }

            function updateKembalian() {
                var diterima = parseFloat($('#diterima').val());
                var totalPenjualan = parseFloat($('#total_penjualan').val());
                var kembalian = diterima - totalPenjualan;
                $('#kembalian').val(kembalian);
            }
            $(document).on('click', '.tambah-penjualan', function() {
                var id_barang = $(this).data("id_barang");
                var nama_barang = $(this).data("nama_barang");
                var stok = $(this).data("jumlah");
                var harga_beli = $(this).data("harga_beli");
                var harga_jual = $(this).data("harga_jual");
                var jumlah_barang = 0;
                var data = [
                    ['<input type="text" class="form-control" name="nama_barang[]" value="' +
                        nama_barang + '" readonly>', stok,

                        '<input type="text" class="form-control" name="harga_jual[]" value="' +
                        harga_jual + '" readonly>',
                        '<input type="text" class="form-control" name="harga_beli[]" value="' +
                        harga_beli + '" readonly>',
                        '<input type="number" class="form-control qty" name="jumlah[]" min="1" max="' +
                        stok + '" value="' +
                        jumlah_barang + '" id="jumlah_barang">',
                        '<input type="text" class="form-control total_harga" name="total_harga[]" value="0" readonly>',
                        '<input type="text" class="form-control"  name="id_barang[]" value="' +
                        id_barang +
                        '" readonly hidden> <button class="btn btn-sm btn-danger text-white hapus-baris">Remove</button>'
                    ]
                ];
                var tableRow = table.rows.add(data).draw().node();
            });
            $(document).on('click', '.hapus-baris', function() {
                var row = $(this).closest('tr');
                table.row(row).remove().draw();
                hitungTotal();
    
            });
            $(document).on('input', 'input.qty', function() {
                var maxQty = parseInt($(this).attr('max'));
                var inputQty = parseInt($(this).val());
                if (inputQty > maxQty) {
                    $(this).val(maxQty);
                }
                updatetotal_harga($(this).closest('tr'));
                updateKembalian();
            });
            $('#diterima').on('input', function() {
                updateKembalian();
            });

            function hitungTotal() {
                var total = 0;
                var totalItem = 0;
                $('input[name="total_harga[]"]').each(function() {
                    total += parseFloat($(this).val());
                });
                $('input[name="jumlah[]"]').each(function() {
                    totalItem += parseInt($(this).val());
                });
                $('#total_penjualan').val(total);
                $('#tampil-terbilang').text(`Total: ${formatUang(total)}`)
                $('#total_item').val(totalItem);
                updateKembalian();
            }
        })
    </script>
@endpush
