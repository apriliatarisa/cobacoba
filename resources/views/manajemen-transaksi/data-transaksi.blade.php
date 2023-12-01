@extends('layout')
@section('content')

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Manajemen transaksi
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
                  <a href="{{ route('manajemen-transaksi.create-transaksi') }}" class="btn btn-primary">Tambah transaksi</a> <br></br>
                
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>Tanggal</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Tunai</th>
                        <th>Kembali</th>
                        <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($dtTransaksi as $index => $transaksi)
                    <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $transaksi->tgl_transaksi}}</td>
                    <td>{{ $transaksi->total_barang }}</td>
                    <td>{{ $transaksi->total }}</td>
                    <td>{{ $transaksi->tunai }}</td>
                    <td>{{ $transaksi->kembali }}</td>
                   
                          <td>
                           
                          {{-- <a href="{{ route('manajemen-transaksi.edit-transaksi',$transaksi->id_transaksi) }}" class="btn btn-success">Edit</a>
                          <a href="{{ route('manajemen-transaksi.delete-transaksi',$transaksi->id_transaksi) }}" class="btn btn-danger" onclick="return confirm('Mau hapus transaksi {{ $transaksi->transaksi}}?')">Hapus</a> --}}
                              
                          </td>
                       
                     @endforeach
                  
                  </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
              {{-- <div class='card-footer'>
                {{ $dttransaksi->links() }}
              </div> --}}
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
      </section>
      <!-- /.content -->
@endsection

