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
                       <h3>Edit Data Barang</h3>
                    </thead>
                    <tbody>
                      <form action='{{ route('manajemen-barang.update-barang',$dtBarang->id_barang) }}' method='post'>
                       {{ csrf_field() }}
                       <div class='form-group'>
                        <select class='form-control select2' name='id_supplier' id='id_supplier'>
                          <option disabled value >Pilih Supplier</option>
                          <option value='{{ $dtBarang->id_supplier }}'>{{ $dtBarang->suppliers->supplier }}</option>
                          
                          @foreach ($dtSupplier as $sup)
                          <option value='{{ $sup->id_supplier }}'>{{ $sup->supplier }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class='form-group'>
                        <input type='text'id='nama_barang' name='nama_barang'  class='form-control' placeholder='Nama Barang' value='{{ $dtBarang->nama_barang }}'>
                      </div>
                      <div class='form-group'>
                        <input type='number'id='jumlah' name='jumlah'  class='form-control' placeholder='Jumlah Barang' value='{{ $dtBarang->jumlah }}'>
                      </div>
                      <div class='form-group'>
                        <input type='price' id='harga_beli' name='harga_beli'  class='form-control' placeholder='Harga Beli' value='{{ $dtBarang->harga_beli }}'>
                      </div>
                      <div class='form-group'>
                      <input type='price' id='harga_jual' name='harga_jual'  class='form-control' placeholder='Harga Jual' value='{{ $dtBarang->harga_jual }}'>
                      </div>
                        <div class='form-group'>
                            <button type='submit' class='btn btn-primary'>Edit Data</button>
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