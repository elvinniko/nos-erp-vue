<template>
    <div class="container">
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Gudang</h1>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
            <div class="card">
              <div class="card-header">
                    <button class="btn btn-success" @click="createModal">
                        <i class="fas fa-plus-square">&nbsp;&nbsp;Tambah gudang</i>
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
                    <th>Kode Gudang</th>
                    <th>Nama Gudang</th>
                    <th>Tipe</th>
                  </tr>

                  <tr v-for='gudang in gudang.data' :key='gudang.KodeLokasi'>
                    <td>{{gudang.KodeLokasi}}</td>
                    <td>{{gudang.NamaLokasi}}</td>
                    <td>{{gudang.Tipe}}</td>
                    <td>
                        <a href="#" @click="readModal(gudang)">
                            <i class="fas fa-eye green"></i>
                            Lihat
                        </a>    
                        &nbsp; - &nbsp;
                        <a href="#" @click="updateModal(gudang)">
                            <i class="fas fa-edit blue"></i>
                            Ubah
                        </a>    
                        &nbsp; - &nbsp;
                        <a href="#" @click="deleteData(gudang.KodeLokasi)">
                            <i class="fas fa-trash red"></i>
                            Hapus
                        </a>
                    </td>
                  </tr>
                </tbody></table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <pagination :data="gudang" @pagination-change-page="getResults"></pagination>
              </div>
            </div>
            <!-- /.card -->

            <!-- Read Modal -->
            <div class="modal fade" id="modalRead" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Gudang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="readData()"> <!-- prevent will prevent page refresh -->
                    <div class="modal-body">
                        <div class="form-group-row">
                            <div class="form-group">
                                <label>Kode Gudang: </label>
                                <input disabled v-model="form.KodeLokasi" type="text" name="KodeLokasi" placeholder="Kode Gudang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nama Gudang: </label>
                                <input disabled v-model="form.NamaLokasi" type="text" name="NamaLokasi" placeholder="Nama Gudang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tipe: </label>
                                <input disabled v-model="form.Tipe" type="text" name="Tipe" placeholder="Tipe" class="form-control">
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
                    <h5 v-show="!modal_change" class="modal-title">Tambah Gudang</h5>
                    <h5 v-show="modal_change" class="modal-title">Ubah Gudang</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="modal_change ? updateData() : createData()"> <!-- prevent will prevent page refresh -->
                    <div class="modal-body">
                        <div class="form-group-row">
                            <div class="form-group">
                                <label v-show="modal_change">Kode Gudang: </label>
                                <input v-model="form.KodeLokasi" type="text" name="KodeLokasi" placeholder="Kode Gudang" 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('KodeLokasi') }">
                                <has-error :form="form" field="KodeLokasi"></has-error>
                            </div>
                            <div class="form-group">
                                <label v-show="modal_change">Nama Gudang: </label>
                                <input v-model="form.NamaLokasi" type="text" name="NamaLokasi" placeholder="Nama Gudang" 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('NamaLokasi') }">
                                <has-error :form="form" field="NamaLokasi"></has-error>
                            </div>
                            <div class="form-group">
                                <label v-show="modal_change">Tipe: </label>
                                <select v-model="form.Tipe" :class="{ 'is-invalid': form.errors.has('Tipe') }">
                                    <option disabled value=""><h4>Tipe Gudang</h4></option>
                                    <option>INV</option>
                                </select>
                                <!-- <input v-model="form.Tipe" type="text" name="Tipe" placeholder="Tipe" 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('Tipe') }"> -->
                                <has-error :form="form" field="Tipe"></has-error>
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
                gudang : {},
                //for vform
                form : new Form({
                    KodeLokasi : '',
                    NamaLokasi : '',
                    Tipe : ''
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
                axios.get('api/gudang?page=' + page)
                    .then(response => {
                        this.gudang = response.data;
                    });
            },

            //for modals
            createModal() {
                this.modal_change = false
                this.form.reset()
                $('#modalData').modal('show')
            },
            readModal(gudang) {
                this.form.reset()
                $('#modalRead').modal('show')
                this.form.fill(gudang)
            },
            updateModal(gudang) {
                this.modal_change = true
                this.form.reset()
                $('#modalData').modal('show')
                this.form.fill(gudang)
            },
            readData() {
                axios.get('api/gudang').then(({ data }) => (this.gudang = data))
            },
            createData() {
                this.$Progress.start()
                this.form.post('api/gudang')
                // if everything's ok
                .then(()=>{
                    toast({
                        type: 'success',
                        title: 'Gudang berhasil ditambahkan'
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
                this.form.put('api/gudang/' + this.form.KodeLokasi)
                // if everything's ok
                .then(()=>{
                    toast({
                        type: 'success',
                        title: 'Gudang berhasil diubah'
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
                        this.form.delete('api/gudang/' + id)
                        .then(()=>{                       
                            Swal(
                            'Sukses!',
                            'Gudang berhasil dihapus',
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
                axios.get('api/findGudang?q=' + this.filter)
                .then((data) => {
                    this.gudang = data.data
                })
                .catch(()=>{})
            })
            // () is blank function stands for function()
        }
    }
</script>