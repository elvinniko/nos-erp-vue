<template>
    <div class="container">
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Pelanggan</h1>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
            <div class="card">
              <div class="card-header">
                    <button class="btn btn-success" @click="createModal">
                        <i class="fas fa-plus-square">&nbsp;&nbsp;Tambah pelanggan</i>
                    </button>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" v-model="filter" class="form-control float-right" @keydown="filterResult" placeholder="Filter">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default" @click="filterResult"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody>
                  <tr>
                    <th>Kode Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Kontak</th>
                    <th>Handphone</th>
                    <th>Email</th>
                  </tr>

                  <tr v-for='pelanggan in pelanggan.data' :key='pelanggan.KodePelanggan'>
                    <td>{{pelanggan.KodePelanggan}}</td>
                    <td>{{pelanggan.NamaPelanggan}}</td>
                    <td>{{pelanggan.Kontak}}</td>
                    <td>{{pelanggan.Handphone}}</td>
                    <td>{{pelanggan.Email}}</td>
                    <td>
                        <a href="#" @click="readModal(pelanggan)">
                        <!-- <a href="#" @click="readModal(pelanggan, pelanggan.KodePelanggan)"> -->
                            <i class="fas fa-eye green"></i>
                            Lihat
                        </a>    
                        &nbsp; - &nbsp;
                        <a href="#" @click="updateModal(pelanggan)">
                            <i class="fas fa-edit blue"></i>
                            Ubah
                        </a>    
                        &nbsp; - &nbsp;
                        <a href="#" @click="deleteData(pelanggan.KodePelanggan)">
                            <i class="fas fa-trash red"></i>
                            Hapus
                        </a>
                    </td>
                  </tr>
                </tbody></table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <pagination :data="pelanggan" @pagination-change-page="getResults"></pagination>
              </div>
            </div>
            <!-- /.card -->

            <!-- Read Modal -->
            <div class="modal fade" id="modalRead" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pelanggan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="readData()"> <!-- prevent will prevent page refresh -->
                    <div class="modal-body">
                        <div class="tabbable">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                <a
                                    class="nav-link active"
                                    id="pelanggan-tab"
                                    data-toggle="tab"
                                    href="#pelanggan"
                                    role="tab"
                                    aria-controls="pelanggan"
                                    aria-selected="true"
                                >Data Pelanggan</a>
                                </li>
                                <li class="nav-item">
                                <a
                                    class="nav-link"
                                    id="alamat-tab"
                                    data-toggle="tab"
                                    href="#alamat"
                                    role="tab"
                                    aria-controls="alamat"
                                    aria-selected="false"
                                >Alamat Pelanggan</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="pelanggan" role="tabpanel" aria-labelledby="pelanggan-tab">
                                    <div class="form-group-row">
                                        <div class="form-group">
                                            <label><br>Kode Pelanggan: </label>
                                            <h6>{{form.KodePelanggan}}</h6>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pelanggan: </label>
                                            <h6>{{form.NamaPelanggan}}</h6>
                                        </div>
                                        <div class="form-group">
                                            <label>Kontak: </label>
                                            <h6>{{form.Kontak}}</h6>
                                        </div>
                                        <div class="form-group">
                                            <label>Handphone: </label>
                                            <h6>{{form.Handphone}}</h6>
                                        </div>
                                        <div class="form-group">
                                            <label>Email: </label>
                                            <h6>{{form.Email}}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="alamat" role="tabpanel" aria-labelledby="alamat-tab">
                                    <div class="form-group-row">
                                        <div class="form-group">
                                            <label><br>Alamat: </label>
                                            <h6>{{form1.Alamat}}</h6>
                                        </div>
                                        <div class="form-group">
                                            <label>Kota: </label>
                                            <h6>{{form1.Kota}}</h6>
                                        </div>
                                        <div class="form-group">
                                            <label>Provinsi: </label>
                                            <h6>{{form1.Provinsi}}</h6>
                                        </div>
                                        <div class="form-group">
                                            <label>Faks: </label>
                                            <h6>{{form1.Faks}}</h6>
                                        </div>
                                        <div class="form-group">
                                            <label>Telepon: </label>
                                            <h6>{{form1.Telepon}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
                </div>
            </div>
            </div>

            <!-- Create & Update Modal -->
            <div class="modal fade" id="modalData" tabindex="-1" role="dialog" aria-labelledby="createDataTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 v-show="!modal_change" class="modal-title">Tambah Pelanggan</h5>
                    <h5 v-show="modal_change" class="modal-title">Ubah Pelanggan</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="modal_change ? updateData() : createData()"> <!-- prevent will prevent page refresh -->
                    <div class="modal-body">
                        <div class="tabbable">
                            <ul class="nav nav-tabs" id="myTab1" role="tablist">
                                <li class="nav-item">
                                <a
                                    class="nav-link active"
                                    id="pelanggan1-tab"
                                    data-toggle="tab"
                                    href="#pelanggan1"
                                    role="tab"
                                    aria-controls="pelanggan1"
                                    aria-selected="true"
                                >Data Pelanggan</a>
                                </li>
                                <li class="nav-item">
                                <a
                                    class="nav-link"
                                    id="alamat1-tab"
                                    data-toggle="tab"
                                    href="#alamat1"
                                    role="tab"
                                    aria-controls="alamat1"
                                    aria-selected="false"
                                >Alamat Pelanggan</a>
                                </li>
                            </ul>
                            <br>
                            <div class="tab-content" id="myTabContent1">
                                <div class="tab-pane fade show active" id="pelanggan1" role="tabpanel" aria-labelledby="pelanggan1-tab">
                                    <div class="form-group-row">
                                        <div class="form-group">
                                            <label v-show="modal_change">Kode Pelanggan: </label>
                                            <input v-model="form.KodePelanggan" type="text" name="KodePelanggan" placeholder="Kode Pelanggan" 
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('KodePelanggan') }">
                                            <has-error :form="form" field="KodePelanggan"></has-error>
                                        </div>
                                        <div class="form-group">
                                            <label v-show="modal_change">Nama Pelanggan: </label>
                                            <input v-model="form.NamaPelanggan" type="text" name="NamaPelanggan" placeholder="Nama Pelanggan" 
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('NamaPelanggan') }">
                                            <has-error :form="form" field="NamaPelanggan"></has-error>
                                        </div>
                                        <div class="form-group">
                                            <label v-show="modal_change">Kontak: </label>
                                            <input v-model="form.Kontak" type="text" name="Kontak" placeholder="Kontak" 
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('Kontak') }">
                                            <has-error :form="form" field="Kontak"></has-error>
                                        </div>
                                        <div class="form-group">
                                            <label v-show="modal_change">Handphone: </label>
                                            <input v-model="form.Handphone" type="text" name="Handphone" placeholder="Handphone"
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('Handphone') }">
                                            <has-error :form="form" field="Handphone"></has-error>
                                        </div>
                                        <div class="form-group">
                                            <label v-show="modal_change">Email: </label>
                                            <input v-model="form.Email" type="text" name="Email" placeholder="Email"
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('Email') }">
                                            <has-error :form="form" field="Email"></has-error>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="alamat1" role="tabpanel" aria-labelledby="alamat1-tab">
                                    <div class="form-group-row">
                                        <div class="form-group">
                                            <label v-show="modal_change">Kode Pelanggan: </label>
                                            <input v-model="form1.KodePelanggan" type="text" name="KodePelanggan" placeholder="Kode Pelanggan" 
                                                class="form-control" :class="{ 'is-invalid': form1.errors.has('KodePelanggan') }">
                                            <has-error :form="form1" field="KodePelanggan"></has-error>
                                        </div>
                                        <div class="form-group">
                                            <label v-show="modal_change">Alamat: </label>
                                            <input v-model="form1.Alamat" type="text" name="Alamat" placeholder="Alamat" 
                                                class="form-control" :class="{ 'is-invalid': form1.errors.has('Alamat') }">
                                            <has-error :form="form1" field="Alamat"></has-error>
                                        </div>
                                        <div class="form-group">
                                            <label v-show="modal_change">Kota: </label>
                                            <input v-model="form1.Kota" type="text" name="Kota" placeholder="Kota" 
                                                class="form-control" :class="{ 'is-invalid': form1.errors.has('Kota') }">
                                            <has-error :form="form1" field="Kota"></has-error>
                                        </div>
                                        <div class="form-group">
                                            <label v-show="modal_change">Provinsi: </label>
                                            <input v-model="form1.Provinsi" type="text" name="Provinsi" placeholder="Provinsi"
                                                class="form-control" :class="{ 'is-invalid': form1.errors.has('Provinsi') }">
                                            <has-error :form="form1" field="Provinsi"></has-error>
                                        </div>
                                        <div class="form-group">
                                            <label v-show="modal_change">Faks: </label>
                                            <input v-model="form1.Faks" type="text" name="Faks" placeholder="Faks"
                                                class="form-control" :class="{ 'is-invalid': form1.errors.has('Faks') }">
                                            <has-error :form="form1" field="Faks"></has-error>
                                        </div>
                                        <div class="form-group">
                                            <label v-show="modal_change">Telepon: </label>
                                            <input v-model="form1.Telepon" type="text" name="Telepon" placeholder="Telepon"
                                                class="form-control" :class="{ 'is-invalid': form1.errors.has('Telepon') }">
                                            <has-error :form="form1" field="Telepon"></has-error>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button v-show="!modal_change" type="submit" class="btn btn-primary">Save</button>
                        <button v-show="modal_change" type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return{
                modal_change : false,
                filter: '',
                pelanggan : {},
                alamat : {},
                //for vform
                form : new Form({
                    KodePelanggan : '',
                    NamaPelanggan : '',
                    Kontak : '',
                    Handphone : '',
                    Email : ''
                }),
                form1 : new Form({
                    KodePelanggan : '',
                    Alamat : '',
                    Kota : '',
                    Provinsi : '',
                    Faks : '',
                    Telepon : ''
                })
            }
        },
        methods : {
            //for filter
            filterResult: _.debounce( () => {
                Custom.$emit('searching')
            },500),
            
            //for pagination
            getResults(page = 1) {
                axios.get('api/pelanggan?page=' + page)
                    .then(response => {
                        this.pelanggan = response.data;
                    });
            },

            //for modals
            createModal() {
                this.modal_change = false
                this.form.reset()
                this.form1.reset()
                $('#modalData').modal('show')
            },
            readModal(pelanggan, id) {
                this.form.reset()
                this.form1.reset()
                $('#modalRead').modal('show')
                this.form.fill(pelanggan)
                this.form1.fill(alamat)
            },
            updateModal(pelanggan) {
                this.modal_change = true
                this.form.reset()
                this.form1.reset()
                $('#modalData').modal('show')
                this.form.fill(pelanggan)
                this.form1.fill(alamat)
            },
            readData() {
                // axios.get('api/pelanggan').then(({ data }) => (this.pelanggan = data))
                var that = this
                axios.all([
                    axios.get('api/pelanggan'),
                    axios.get('api/alamat')
                ])
                .then(
                axios.spread(
                    function (pelanggan, alamat) {
                        that.pelanggan = pelanggan.data;
                        that.alamat = alamat.data;
                    }
                ))
            },
            createData() {
                this.$Progress.start()

                this.form.post('api/pelanggan')
                // if everything's ok
                .then(()=>{
                    this.form1.post('api/alamat')
                    .then(()=>{
                        console.log()
                    })
                    .catch(()=>{
                        console.log(error.response)
                        this.$Progress.fail(); 
                    })

                    toast({
                        type: 'success',
                        title: 'Pelanggan berhasil ditambahkan'
                    })
                    this.$Progress.finish()
                    $('#modalData').modal('hide')
                    Custom.$emit('refresh')
                })
                // if something's wrong
                .catch(()=>{
                     this.$Progress.fail(); 
                })
            },
            updateData() {
                this.$Progress.start()

                this.form.put('api/pelanggan/' + this.form.KodePelanggan)
                // if everything's ok
                .then(()=>{
                    this.form1.put('api/alamat/' + this.form1.KodePelanggan)
                    .then(()=>{
                        console.log()
                    })
                    .catch(()=>{
                        this.$Progress.fail(); 
                    })

                    toast({
                        type: 'success',
                        title: 'Pelanggan berhasil diubah'
                    })
                    this.$Progress.finish()
                    $('#modalData').modal('hide')
                    Custom.$emit('refresh')
                })
                // if something's wrong
                .catch(()=>{
                     this.$Progress.fail(); 
                })
            },
            deleteData(id) {
                Swal({
                    title: 'Apakah anda yakin?',
                    text: "Data akan terhapus permanen!",
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Hapus'
                })
                .then((result) => {
                    if (result.value) {
                        this.form1.delete('api/alamat/' + id)
                        .then(()=>{
                            console.log()
                        })
                        this.form.delete('api/pelanggan/' + id)
                        .then(()=>{                       
                            Swal(
                            'Sukses!',
                            'Pelanggan berhasil dihapus',
                            'success'
                            )
                            Custom.$emit('refresh')
                        })
                        .catch(()=>{
                            Swal(
                                'Error!',
                                'Terjadi suatu kesalahan',
                                'warning'
                            )
                        })
                    }
                })
            }
        },
        created() {
            this.readData()
            
            Custom.$on('refresh', () => {
                this.readData()
            })

            Custom.$on('searching', () => {
                axios.get('api/findPelanggan?q=' + this.filter)
                .then((data) => {
                    this.pelanggan = data.data
                })
                .catch(()=>{})
            })
            // () is blank function stands for function()
        }
    }
</script>