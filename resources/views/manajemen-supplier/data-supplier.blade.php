@extends('layout')
@section('content')

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Manajemen supplier
        </h1>
        {{-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Examples</a></li>
          <li class="active">Manajemen User</li>
        </ol> --}}
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                {{-- <div class="box-header">
                  <h3 class="box-title">Data Table With Full Features</h3>
                </div> --}}
                <!-- /.box-header -->
                <div class="box-body">
                  <a href="{{ route('manajemen-supplier.create-supplier') }}" class="btn btn-primary">Tambah supplier</a> <br></br>
                
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Supplier</th>
                          <th>Telp</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($dtSupplier as $index => $supplier)
                    <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $supplier->supplier}}</td>
                    <td>{{ $supplier->telp }}</td>
                   
                          <td>
                           
                          <a href="{{ route('manajemen-supplier.edit-supplier',$supplier->id_supplier) }}" class="btn btn-success">Edit</a>
                          <a href="{{ route('manajemen-supplier.delete-supplier',$supplier->id_supplier) }}" class="btn btn-danger" onclick="return confirm('Mau hapus supplier {{ $supplier->supplier}}?')">Hapus</a>
                              
                          </td>
                       
                     @endforeach
                  
                  </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
              {{-- <div class='card-footer'>
                {{ $dtsupplier->links() }}
              </div> --}}
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
      </section>
      <!-- /.content -->
@endsection

