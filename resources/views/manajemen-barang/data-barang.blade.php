@extends('layout')
@section('content')

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Manajemen Barang
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
                  <a href="{{ route('manajemen-barang.create-barang') }}" class="btn btn-primary">Tambah Barang</a> <br></br>
                 <center> @if (session()->has('success'))
                    <div style="color:blue">

                      {{ session()->get('success') }}
                    </div>
                  @endif</center>
                
                  <table id="example1" class="table table-bordered table-striped">
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
                                                 {{ $barang->suppliers->supplier}}
                                             @endif
                                         </td>
                   <td>{{ $barang->nama_barang}}</td>
                   <td>{{ $barang->jumlah }}</td>
                   <td>{{ $barang->harga_beli }}</td> 
                   <td>{{ $barang->harga_jual }}</td> 
                     
                          <td>
                           
                          <a href="{{ route('manajemen-barang.edit-barang',$barang->id_barang) }}" class="btn btn-success">Edit</a>
                          <a href="{{ route('manajemen-barang.delete-barang',$barang->id_barang) }}" class="btn btn-danger" onclick="return confirm('Mau hapus barang {{ $barang->merk}}?')">Hapus</a>
                              
                          </td>
                       
                     @endforeach
                  
                  </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
              {{-- <div class='card-footer'>
                {{ $dtBarang->links() }}
              </div> --}}
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
      </section>
      <!-- /.content -->
@endsection

