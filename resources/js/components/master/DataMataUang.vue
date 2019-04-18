<template>
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
                    <button class="btn btn-success" @click="createModal">
                        <i class="fas fa-plus-square">&nbsp;&nbsp;Tambah mata uang</i>
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
                    <th @click="sortBy('KodeMataUang')">Kode Mata Uang</th>
                    <th @click="sortBy('NamaMataUang')">Nama Mata Uang</th>
                    <th @click="sortBy('Nilai')">Nilai</th>
                  </tr>

                  <tr v-for='matauang in matauang.data' :key='matauang.KodeMataUang'>
                    <td>{{matauang.KodeMataUang}}</td>
                    <td>{{matauang.NamaMataUang}}</td>
                    <td>{{matauang.Nilai}}</td>
                    <td>
                        <a href="#" @click="readModal(matauang)">
                            <i class="fas fa-eye green"></i>
                            Lihat
                        </a>    
                        &nbsp; - &nbsp;
                        <a href="#" @click="updateModal(matauang)">
                            <i class="fas fa-edit blue"></i>
                            Ubah
                        </a>    
                        &nbsp; - &nbsp;
                        <a href="#" @click="deleteData(matauang.KodeMataUang)">
                            <i class="fas fa-trash red"></i>
                            Hapus
                        </a>
                    </td>
                  </tr>
                </tbody></table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <pagination :data="matauang" @pagination-change-page="getResults"></pagination>
              </div>
            </div>
            <!-- /.card -->

            <!-- Read Modal -->
            <div class="modal fade" id="modalRead" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Mata Uang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="readData()"> <!-- prevent will prevent page refresh -->
                    <div class="modal-body">
                        <div class="form-group-row">
                            <div class="form-group">
                                <label>Kode Mata Uang: </label>
                                <input disabled v-model="form.KodeMataUang" type="text" name="KodeMataUang" placeholder="Kode Mata Uang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nama Mata Uang: </label>
                                <input disabled v-model="form.NamaMataUang" type="text" name="NamaMataUang" placeholder="Nama Mata Uang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nilai: </label>
                                <input disabled v-model="form.Nilai" type="text" name="Nilai" placeholder="Nilai" class="form-control">
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
                    <h5 v-show="!modal_change" class="modal-title">Tambah Mata Uang</h5>
                    <h5 v-show="modal_change" class="modal-title">Ubah Mata Uang</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="modal_change ? updateData() : createData()"> <!-- prevent will prevent page refresh -->
                    <div class="modal-body">
                        <div class="form-group-row">
                            <div class="form-group">
                                <label v-show="modal_change">Kode Mata Uang: </label>
                                <input v-model="form.KodeMataUang" type="text" name="KodeMataUang" placeholder="Kode Mata Uang" 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('KodeMataUang') }">
                                <has-error :form="form" field="KodeMataUang"></has-error>
                            </div>
                            <div class="form-group">
                                <label v-show="modal_change">Nama Mata Uang: </label>
                                <input v-model="form.NamaMataUang" type="text" name="NamaMataUang" placeholder="Nama Mata Uang" 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('NamaMataUang') }">
                                <has-error :form="form" field="NamaMataUang"></has-error>
                            </div>
                            <div class="form-group">
                                <label v-show="modal_change">Nilai: </label>
                                <input v-model="form.Nilai" type="text" name="Nilai" placeholder="Nilai" 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('Nilai') }">
                                <has-error :form="form" field="Nilai"></has-error>
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
                matauang : {},
                //for vform
                form : new Form({
                    KodeMataUang : '',
                    NamaMataUang : '',
                    Nilai : ''
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
                axios.get('api/matauang?page=' + page)
                    .then(response => {
                        this.matauang = response.data
                    });
            },

            //for modals
            createModal() {
                this.modal_change = false
                this.form.reset()
                $('#modalData').modal('show')
            },
            readModal(matauang) {
                this.form.reset()
                $('#modalRead').modal('show')
                this.form.fill(matauang)
            },
            updateModal(matauang) {
                this.modal_change = true
                this.form.reset()
                $('#modalData').modal('show')
                this.form.fill(matauang)
            },
            readData() {
                axios.get('api/matauang')
                .then(({ data }) => (this.matauang = data))
            },
            createData() {
                this.$Progress.start()
                this.form.post('api/matauang')
                // if everything's ok
                .then(()=>{
                    toast({
                        type: 'success',
                        title: 'Mata Uang berhasil ditambahkan'
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
                this.form.put('api/matauang/' + this.form.KodeMataUang)
                // if everything's ok
                .then(()=>{
                    toast({
                        type: 'success',
                        title: 'Mata Uang berhasil diubah'
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
                        this.form.delete('api/matauang/' + id)
                        .then(()=>{                       
                            Swal(
                            'Sukses!',
                            'Mata Uang berhasil dihapus',
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
                axios.get('api/findMataUang?q=' + this.filter)
                .then((data) => {
                    this.matauang = data.data
                })
                .catch(()=>{})
            })
            // () is blank function stands for function()
        }
    }
</script>