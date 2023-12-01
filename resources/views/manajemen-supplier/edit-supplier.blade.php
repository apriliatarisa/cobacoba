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
                       <h3>Edit Data Supplier</h3>
                    </thead>
                    <tbody>
                      <form action='{{ route('manajemen-supplier.update-supplier',$dtSupplier->id_supplier) }}' method='post'>
                       {{ csrf_field() }}
                       <div class='form-group'>
                        <input type='text'id='supplier' name='supplier'  class='form-control' placeholder='Supplier' value='{{ $dtSupplier->supplier }}'>
                        </div>
                        <div class='form-group'>
                        <input type='text'id='telp' name='telp'  class='form-control' placeholder='Telp' value='{{ $dtSupplier->telp }}'>
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