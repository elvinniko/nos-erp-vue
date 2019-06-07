<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>NOS-ERP</title>
  <link rel="stylesheet" href="{{ asset('css/app.css')}}">
     <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="./img/logo.png" alt="Laratest Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">NOS-ERP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <!-- MENU MASTER -->
            <li class="nav-item has-treeview menu-close">
              <a href="#" class="nav-link">
                <img src="./img/master.png">
                <p>
                  &nbsp;Master
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/dtKlasifikasi" class="nav-link">Data Klasifikasi</a>
                </li>
                <li class="nav-item">
                  <a href="/dtGudang" class="nav-link">Data Gudang</a>
                </li>
                <li class="nav-item">
                  <a href="/dtSatuan" class="nav-link">Data Satuan</a>
                </li>
                <li class="nav-item">
                  <a href="/dtItem" class="nav-link">Data Item</a>
                </li>
                <li class="nav-item">
                  <a href="/dtMataUang" class="nav-link">Data mata uang</a>
                </li>
                <li class="nav-item">
                  <a href="/dtPelanggan" class="nav-link">Data Pelanggan</a>
                </li>
                <li class="nav-item">
                  <a href="/dtSupplier" class="nav-link">Data Supplier</a>
                </li>
                <li class="nav-item">
                  <a href="/dtMataUang" class="nav-link"></a>
                </li>
                <li class="nav-item">
                  <a href="/dtUser" class="nav-link">Data User</a>
                </li>
              </ul>
            </li>

            <!-- MENU PEMBELIAN -->
            <li class="nav-item has-treeview menu-close">
              <a href="#" class="nav-link">
                <img src="./img/pembelian.png">
                <p>
                  &nbsp;Pembelian
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <!-- SUB MENU Pemesanan Pembelian -->
              <ul class="nav nav-treeview">
                <li class="nav-item has-treeview menu-close">
                  <a href="#" class="nav-link">
                    <p>
                      <i class="fas fa-bars"></i>
                      &nbsp;Pemesanan Pembelian
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <router-link to="/pesanPembelian" class="nav-link">
                        <p>P.O. Pembelian</p>
                      </router-link>
                    </li>
                    <li class="nav-item">
                      <router-link to="/konfirmasiPembelian" class="nav-link">
                        <p>P.O. Konfirmasi</p>
                      </router-link>
                    </li>
                    <li class="nav-item">
                      <router-link to="/diterimaPembelian" class="nav-link">
                        <p>P.O. Diterima</p>
                      </router-link>
                    </li>
                    <li class="nav-item">
                      <router-link to="/batalPembelian" class="nav-link">
                        <p>P.O. Batal</p>
                      </router-link>
                    </li>
                  </ul>
                </li>
              </ul>
              <!-- SUB MENU Penerimaan Barang -->
              <ul class="nav nav-treeview">
                <li class="nav-item has-treeview menu-close">
                  <a href="#" class="nav-link">
                    <p>
                      <i class="fas fa-bars"></i>
                      &nbsp;Penerimaan Barang
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <router-link to="/penerimaanBarang" class="nav-link">
                        <p>Penerimaan Barang</p>
                      </router-link>
                    </li>
                    <li class="nav-item">
                      <router-link to="/konfirmasiPenerimaan" class="nav-link">
                        <p>Konfirmasi Penerimaan Barang</p>
                      </router-link>
                    </li>
                  </ul>
                </li>
              </ul>
              <!-- SUB MENU Return Penerimaan Barang -->
              <ul class="nav nav-treeview">
                <li class="nav-item has-treeview menu-close">
                  <a href="#" class="nav-link">
                    <p>
                      <i class="fas fa-bars"></i>
                      &nbsp;Return Penerimaan Barang
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <router-link to="/returnPenerimaan" class="nav-link">
                        <p>Return Penerimaan Barang</p>
                      </router-link>
                    </li>
                    <li class="nav-item">
                      <router-link to="/konfirmasiReturnPenerimaan" class="nav-link">
                        <p>Konfirmasi Return Penerimaan</p>
                      </router-link>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>

            <!-- MENU PENJUALAN -->
            <li class="nav-item has-treeview menu-close">
              <a href="#" class="nav-link">
                <img src="./img/penjualan.png">
                <p>
                  &nbsp;Penjualan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <!-- SUB MENU Pemesanan Penjualan -->
              <ul class="nav nav-treeview">
                <li class="nav-item has-treeview menu-close">
                  <a href="#" class="nav-link">
                    <p>
                      <i class="fas fa-bars"></i>
                      &nbsp;Pemesanan Penjualan
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <router-link to="/pesanPenjualan" class="nav-link">
                        <p>S.O. Penjualan</p>
                      </router-link>
                    </li>
                    <li class="nav-item">
                      <router-link to="/konfirmasiPenjualan" class="nav-link">
                        <p>S.O. Konfirmasi</p>
                      </router-link>
                    </li>
                    <li class="nav-item">
                      <router-link to="/dikirimPenjualan" class="nav-link">
                        <p>S.O. Dikirim</p>
                      </router-link>
                    </li>
                    <li class="nav-item">
                      <router-link to="/batalPenjualan" class="nav-link">
                        <p>S.O. Batal</p>
                      </router-link>
                    </li>
                  </ul>
                </li>
              </ul>
              <!-- SUB MENU Surat Jalan -->
              <ul class="nav nav-treeview">
                <li class="nav-item has-treeview menu-close">
                  <a href="#" class="nav-link">
                    <p>
                      <i class="fas fa-bars"></i>
                      &nbsp;Surat Jalan
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <router-link to="/suratJalan" class="nav-link">
                        <p>Surat Jalan</p>
                      </router-link>
                    </li>
                    <li class="nav-item">
                      <router-link to="/konfirmasiSuratJalan" class="nav-link">
                        <p>Konfirmasi Surat Jalan</p>
                      </router-link>
                    </li>
                  </ul>
                </li>
              </ul>
              <!-- SUB MENU Return Surat Jalan -->
              <ul class="nav nav-treeview">
                <li class="nav-item has-treeview menu-close">
                  <a href="#" class="nav-link">
                    <p>
                      <i class="fas fa-bars"></i>
                      &nbsp;Return Surat Jalan
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <router-link to="/returnSuratJalan" class="nav-link">
                        <p>Return Surat Jalan</p>
                      </router-link>
                    </li>
                    <li class="nav-item">
                      <router-link to="/konfirmasiReturnSuratJalan" class="nav-link">
                        <p>Konfirmasi Return Surat Jalan</p>
                      </router-link>
                    </li>
                  </ul>
                </li>
              </ul>
              <!-- SUB MENU Penjualan Langsung -->
              <ul class="nav nav-treeview">
                <li class="nav-item has-treeview menu-close">
                  <a href="#" class="nav-link">
                    <p>
                      <i class="fas fa-bars"></i>
                      &nbsp;Penjualan Langsung
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <router-link to="/penjualanLangsung" class="nav-link">
                        <p>Penjualan Langsung</p>
                      </router-link>
                    </li>
                    <li class="nav-item">
                      <router-link to="/returnPenjualanLangsung" class="nav-link">
                        <p>Return Penjualan Langsung</p>
                      </router-link>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>

            <!-- MENU HUTANG -->
            <li class="nav-item has-treeview menu-close">
              <a href="#" class="nav-link">
                <img src="./img/hutang.png">
                <p>
                  &nbsp;Hutang
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
            </li>

            <!-- MENU PIUTANG -->
            <li class="nav-item has-treeview menu-close">
              <a href="#" class="nav-link">
                <img src="./img/piutang.png">
                <p>
                  &nbsp;Piutang
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
            </li>

            <!-- MENU KAS BANK -->
            <li class="nav-item has-treeview menu-close">
              <a href="#" class="nav-link">
                <img src="./img/bank.png">
                <p>
                  &nbsp;Kas Bank
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
            </li>

            <!-- MENU LAPORAN -->
            <li class="nav-item has-treeview menu-close">
              <a href="#" class="nav-link">
                <img src="./img/laporan.png">
                <p>
                  &nbsp;Laporan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
            </li>

            <!-- MENU TOOLS -->
            <li class="nav-item has-treeview menu-close">
              <a href="#" class="nav-link">
                <img src="./img/tools.png">
                <p>
                  &nbsp;Tools
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
            </li>

            <!-- MENU LOGOUT -->
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  <img src="./img/logout.png">
                  <p>&nbsp;{{ __('Logout') }}</p>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </li>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Starter Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div>
        </div>
      </div>
    </div> -->
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        @yield('konten')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="https://adminlte.io">DNIZ Techno</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="{{ asset('js/app.js')}}"></script>

@stack('scripts')
</body>
</html>`