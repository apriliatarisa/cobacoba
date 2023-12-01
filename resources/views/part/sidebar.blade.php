<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        {{-- <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div> --}}
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
       <ul class="sidebar-menu" data-widget="tree">
        
         <li class="header">Menu Utama</li>

         <li>
             <a href="{{ route('manajemen-user.index') }}">
                 <i class="fa fa-users"></i> <span>Manajemen User</span> <!-- /.tulisan nama menu -->
             </a>
         </li>

         <li>
          <a href="{{ route('manajemen-transaksi.data-transaksi') }}">
              <i class="fa fa-laptop"></i> <span>Manajemen Transaksi</span> <!-- /.tulisan nama menu -->
          </a>
      </li>

         <li>
            <a href="{{ route('manajemen-barang.data-barang') }}">
                <i class="fa fa-laptop"></i> <span>Manajemen Barang</span> <!-- /.tulisan nama menu -->
            </a>
        </li>

        <li>
          <a href="{{ route('manajemen-supplier.data-supplier') }}">
              <i class="fa fa-laptop"></i> <span>Manajemen Supplier</span> <!-- /.tulisan nama menu -->
          </a>
      </li>
        
     </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  
    <!-- Tab panes -->
    {{-- <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
      </div>
      </div>
   
  </aside> --}}
  