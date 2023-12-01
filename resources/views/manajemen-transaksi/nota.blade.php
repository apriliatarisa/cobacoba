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
              <button type="button" class="btn btn-warning btn-flat"
                            onclick="notaPenjualan('{{ route('manajemen-transaksi.nota-transaksi') }}')">Cetak Nota</button>
                        <a class="btn btn-primary" href="{{ route('manajemen-transaksi.data-transaksi') }}">Tambah penjualan</a>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
      </section>
      <!-- /.content -->
@endsection
@push('script')
    <script>
        document.cookie = "innerHeight=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

        function notaPenjualan(url, title) {
            popupCenter(url, title, 625, 500);
        }

        function popupCenter(url, title, w, h) {
            const dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : window.screenX;
            const dualScreenTop = window.screenTop !== undefined ? window.screenTop : window.screenY;
            const width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document
                .documentElement.clientWidth : screen.width;
            const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document
                .documentElement.clientHeight : screen.height;
            const systemZoom = width / window.screen.availWidth;
            const left = (width - w) / 2 / systemZoom + dualScreenLeft
            const top = (height - h) / 2 / systemZoom + dualScreenTop
            const newWindow = window.open(url, title,
                `
            scrollbars=yes,
            width  = ${w / systemZoom}, 
            height = ${h / systemZoom}, 
            top    = ${top}, 
            left   = ${left}
        `
            );
            if (window.focus) newWindow.focus();
        }
    </script>
@endpush
