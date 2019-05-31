<template>
    <div class="container">
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Klasifikasi</h1>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
            <div class="card">
              <div class="card-header">
                    <button class="btn btn-success" @click="createModal">
                        <i class="fas fa-plus-square">&nbsp;&nbsp;Tambah klasifikasi</i>
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
                    <th @click="sortBy('KodeKategori')">Kode Klasifikasi</th>
                    <th @click="sortBy('NamaKategori')">Nama Klasifikasi</th>
                    <th @click="sortBy('KodeItem')">Kode Item</th>
                  </tr>

                  <tr v-for='klasifikasi in klasifikasi.data' :key='klasifikasi.KodeKategori'>
                    <td>{{klasifikasi.KodeKategori}}</td>
                    <td>{{klasifikasi.NamaKategori}}</td>
                    <td>{{klasifikasi.KodeItem}}</td>
                    <td>
                        <a href="#" @click="readModal(klasifikasi)">
                            <i class="fas fa-eye green"></i>
                            Lihat
                        </a>    
                        &nbsp; - &nbsp;
                        <a href="#" @click="updateModal(klasifikasi)">
                            <i class="fas fa-edit blue"></i>
                            Ubah
                        </a>    
                        &nbsp; - &nbsp;
                        <a href="#" @click="deleteData(klasifikasi.KodeKategori)">
                            <i class="fas fa-trash red"></i>
                            Hapus
                        </a>
                    </td>
                  </tr>
                </tbody></table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <pagination :data="klasifikasi" @pagination-change-page="getResults"></pagination>
              </div>
            </div>
            <!-- /.card -->

            <!-- Read Modal -->
            <div class="modal fade" id="modalRead" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Klasifikasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="readData()"> <!-- prevent will prevent page refresh -->
                    <div class="modal-body">
                        <div class="form-group-row">
                            <div class="form-group">
                                <label>Kode Klasifikasi: </label>
                                <input disabled v-model="form.KodeKategori" type="text" name="KodeKategori" placeholder="Kode Klasifikasi" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nama Klasifikasi: </label>
                                <input disabled v-model="form.NamaKategori" type="text" name="NamaKategori" placeholder="Nama Klasifikasi" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Kode Item: </label>
                                <input disabled v-model="form.KodeItemAwal" type="text" name="KodeItem" placeholder="Kode Item" class="form-control">
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
                    <h5 v-show="!modal_change" class="modal-title">Tambah Klasifikasi</h5>
                    <h5 v-show="modal_change" class="modal-title">Ubah Klasifikasi</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="modal_change ? updateData() : createData()"> <!-- prevent will prevent page refresh -->
                    <div class="modal-body">
                        <div class="form-group-row">
                            <div class="form-group">
                                <label v-show="modal_change">Kode Klasifikasi: </label>
                                <input v-model="form.KodeKategori" type="text" name="KodeKategori" placeholder="Kode Klasifikasi" 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('KodeKategori') }">
                                <has-error :form="form" field="KodeKategori"></has-error>
                            </div>
                            <div class="form-group">
                                <label v-show="modal_change">Nama Klasifikasi: </label>
                                <input v-model="form.NamaKategori" type="text" name="NamaKategori" placeholder="Nama Klasifikasi" 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('NamaKategori') }">
                                <has-error :form="form" field="NamaKategori"></has-error>
                            </div>
                            <div class="form-group">
                                <label v-show="modal_change">Kode Item: </label>
                                <input v-model="form.KodeItemAwal" type="text" name="KodeItem" placeholder="Kode Item" 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('KodeItem') }">
                                <has-error :form="form" field="KodeItem"></has-error>
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
                klasifikasi : {},
                //for vform
                form : new Form({
                    KodeKategori : '',
                    NamaKategori : '',
                    KodeItem : ''
                })
            }
        },

        methods : {
            //for filter
            filterResult: _.debounce( () => {
                Custom.$emit('searching')
            },400),
            
            //for pagination
            getResults(page = 1) {
                axios.get('api/klasifikasi?page=' + page)
                    .then(response => {
                        this.klasifikasi = response.data
                    });
            },

            //for modals
            createModal() {
                this.modal_change = false
                this.form.reset()
                $('#modalData').modal('show')
            },
            readModal(klasifikasi) {
                this.form.reset()
                $('#modalRead').modal('show')
                this.form.fill(klasifikasi)
            },
            updateModal(klasifikasi) {
                this.modal_change = true
                this.form.reset()
                $('#modalData').modal('show')
                this.form.fill(klasifikasi)
            },
            readData() {
                axios.get('api/klasifikasi')
                .then(({ data }) => (this.klasifikasi = data))
            },
            createData() {
                this.$Progress.start()
                this.form.post('api/klasifikasi')
                // if everything's ok
                .then(()=>{
                    toast({
                        type: 'success',
                        title: 'Klasifikasi berhasil ditambahkan'
                    })
                    this.$Progress.finish()
                    $('#modalData').modal('hide')
                    Custom.$emit('refresh')
                })
                // if something's wrong
                .catch(()=>{
                     this.$Progress.fail()
                })
            },
            updateData() {
                this.$Progress.start()
                this.form.put('api/klasifikasi/' + this.form.KodeKategori)
                // if everything's ok
                .then(()=>{
                    toast({
                        type: 'success',
                        title: 'Klasifikasi berhasil diubah'
                    })
                    this.$Progress.finish()
                    $('#modalData').modal('hide')
                    Custom.$emit('refresh')
                })
                // if something's wrong
                .catch(()=>{
                     this.$Progress.fail() 
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
                        this.form.delete('api/klasifikasi/' + id)
                        .then(()=>{                       
                            Swal(
                            'Sukses!',
                            'Klasifikasi berhasil dihapus',
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
                axios.get('api/findKlasifikasi?q=' + this.filter)
                .then((data) => {
                    this.klasifikasi = data.data
                })
                .catch(()=>{})
            })
            // () is blank function stands for function()
        }
    }
</script>