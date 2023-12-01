@extends('layout')
@section('content')
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Manajemen User
         
        </h1>
       
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                {{-- <div class="box-header">
                  <h3 class="box-title">Data user</h3>
                </div> --}}
                <!-- /.box-header -->
                <div class="box-body">
                  
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name User</th>
                            <th>Email User</th>
                            <th>Terdaftar Sejak</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            
                        @endforeach
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