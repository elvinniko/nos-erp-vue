@extends('layouts.index')
@section('konten')
    <div class="container">
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Mata Uang</h1>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
            <div class="card">
              <div class="card-header">
                    <button class="btn btn-success" aria-labelledby="tambah" aria-hidden="true">
                        <i class="fas fa-plus-square">&nbsp;&nbsp;Tambah mata uang</i>
                    </button>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" class="form-control float-right" placeholder="Filter">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default" ><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody>
                  <tr>
                    <th>Kode Mata Uang</th>
                    <th>Nama Mata Uang</th>
                    <th>Nilai</th>
                    <th>Actions</th>
                  </tr>
                  <tr>
                      @foreach ($data as $datamatauang)
                          <td>{{ $datamatauang->KodeMataUang}}</td>
                          <td>{{ $datamatauang->NamaMataUang}}</td>
                          <td>{{ $datamatauang->Nilai}}</td>
                          <td>

                          </td>
                      @endforeach
                  </tr>
                </tbody>
                </table>
                {{ $data->links()}}
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
            </div>
            <!-- /.card -->
            <!-- Modal Create -->
            <!-- Belum selesai Modalnya -->
            <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Title</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Content</p>
                  </div>
                  <div class="modal-footer">
                    Footer
                  </div>
                </div>
              </div>
            </div>
            <!-- /.end Modal -->
        </div>
    </div>
@endsection