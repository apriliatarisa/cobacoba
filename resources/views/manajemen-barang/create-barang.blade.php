@extends('layout')
@section('content')
      
      <!-- Main content -->
      <section class="content">
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  
                    <thead>
                       <h3>Tambah Data Barang</h3>
                    </thead>
                    <tbody>
                      <form action='{{ route('manajemen-barang.simpan-barang') }}' method='post'>
                       {{ csrf_field() }}
                        <div class='form-group'>
                          <select class='form-control select2' name='id_supplier' id='id_supplier'>
                            <option disabled value >Pilih Supplier</option>
                            @foreach ($dtSupplier as $sup)
                            <option value='{{ $sup->id_supplier }}'>{{ $sup->supplier }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class='form-group'>
                            <input type='text'id='nama_barang' name='nama_barang'  class='form-control' placeholder='Nama Barang'>
                        </div>
                        <div class='form-group'>
                            <input type='number'id='jumlah' name='jumlah'  class='form-control' placeholder='Jumlah Barang'>
                        </div>
                        <div class='form-group'>
                            <input type='price' id='harga_beli' name='harga_beli'  class='form-control' placeholder='Harga Beli'>
                        </div>
                        <div class='form-group'>
                          <input type='price' id='harga_jual' name='harga_jual'  class='form-control' placeholder='Harga Jual'>
                      </div>
                        <div class='form-group'>
                            <button type='submit' class='btn btn-primary'>Simpan Data</button>
                        </div>
                    </form>
                        </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
      </section>
      <!-- /.content -->
@endsection