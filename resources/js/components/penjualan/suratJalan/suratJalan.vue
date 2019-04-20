<template>
    <div class="container">
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Surat Jalan</h1>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>

        <div class="card">
            <div class="card-header">
              <h2>SJ-150700005</h2>
                <form @submit.prevent="readData()">
                <!-- <button class="btn btn-success">
                    <i class="fas fa-plus">&nbsp;&nbsp;Tambah Data P.O</i>
                </button> -->

                <!-- Contents -->
                <br>
                <div class="form-row">
                    <!-- column 1 -->
                    <div class="form-group col-md-3">
                      <div class="form-group">
                        <label for="inputSO">Nomor S.O.</label>
                        <select class="form-control" id="inputSO">
                          <option>SO-150700005</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="inputDate">Tanggal</label>
                        <input type="date" class="form-control" id="inputDate1" value="2015-11-07">
                      </div>
                      <div class="form-group">
                        <label for="inputSopir">Sopir</label>
                        <input type="text" class="form-control" id="inputSopir" placeholder="Nama sopir">
                      </div>
                      <div class="form-group">
                        <label for="inputNoPolisi">No Polisi</label>
                        <input type="text" class="form-control" id="inputNoPolisi" placeholder="No polisi">
                      </div>
                    </div>
                    <!-- pembatas -->
                    <div class="form-group col-md-1"></div>
                    <!-- column 2 -->
                    <div class="form-group col-md-4">
                      <div class="form-group">
                        <label for="inputGudang">Gudang</label>
                        <select class="form-control" id="inputGudang">
                          <option>Toko Widodo</option>
                          <option>Toko Dennis</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="inputCustomer">Customer</label>
                        <select class="form-control" id="inputCustomer">
                          <option>Musdalifah</option>
                          <option>Sumarni</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="inputAlamat">Alamat</label>
                        <select class="form-control" id="inputAlamat">
                          <option>Talok</option>
                        </select>
                      </div>
                    </div>
                    <!-- pembatas -->
                    <div class="form-group col-md-1"></div>
                    <!-- column 3 -->
                    <div class="form-group col-md-3">
                      <label for="inputKeterangan">Keterangan</label>
                      <textarea class="form-control" id="inputKeterangan" rows="5"></textarea>
                    </div>
                </div>
                <hr class="style1">
                <div class="form-row">
                  <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <td>Besi</td>
                            <td>10</td>
                            <td></td>

                        </tr>
                        <tr>
                            <th>2</th>
                            <td>Baja</td>
                            <td>20</td>
                            <td> </td>

                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Kayu</td>
                            <td>30</td>
                            <td> </td>

                        </tr>
                    </tbody>
                </table>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-1"></div>
                  <div class="form-group col-md-3">
                    <br>
                    <button type="button" class="btn btn-success">&nbsp;&nbsp;Simpan&nbsp;&nbsp;</button>
                  </div>
                  <div class="form-group col-md-4"></div>
                  <div class="form-group col-md-3">
                    <div class="form-group">
                      <br>
                    <button type="button" class="btn btn-success">&nbsp;&nbsp;Cetak&nbsp;&nbsp;</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            filter: '',
            pemesananpembelian : {},
            form : new Form({

            }),
        }
    },
    methods : {
        openModal() {
            $('#modalOpen').modal('show')
        },
        readData() {
            // axios.get('api/pemesananpembelian').then(({ data }) => (this.pemesananpembelian = data))
        },
    },
    created() {
        this.readData()
        
        Custom.$on('refresh', () => {
            this.readData()
        })
    }
}
</script>