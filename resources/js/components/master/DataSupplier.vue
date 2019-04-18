<template>
    <div class="container">
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Supplier</h1>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
            <div class="card">
              <div class="card-header">
                    <button class="btn btn-success" @click="createModal">
                        <i class="fas fa-plus-square">&nbsp;&nbsp;Tambah supplier</i>
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
                    <th @click="sortBy('KodeSupplier')">Kode Supplier</th>
                    <th @click="sortBy('NamaSupplier')">Nama Supplier</th>
                    <th @click="sortBy('Alamat')">Alamat</th>
                    <th @click="sortBy('Telepon')">Telepon</th>
                    <th @click="sortBy('Handphone')">Handphone</th>
                  </tr>

                  <tr v-for='supplier in supplier.data' :key='supplier.KodeSupplier'>
                    <td>{{supplier.KodeSupplier}}</td>
                    <td>{{supplier.NamaSupplier}}</td>
                    <td>{{supplier.Alamat}}</td>
                    <td>{{supplier.Telepon}}</td>
                    <td>{{supplier.Handphone}}</td>
                    <td>
                        <a href="#" @click="readModal(supplier)">
                            <i class="fas fa-eye green"></i>
                            Lihat
                        </a>    
                        &nbsp; - &nbsp;
                        <a href="#" @click="updateModal(supplier)">
                            <i class="fas fa-edit blue"></i>
                            Ubah
                        </a>    
                        &nbsp; - &nbsp;
                        <a href="#" @click="deleteData(supplier.KodeSupplier)">
                            <i class="fas fa-trash red"></i>
                            Hapus
                        </a>
                    </td>
                  </tr>
                </tbody></table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <pagination :data="supplier" @pagination-change-page="getResults"></pagination>
              </div>
            </div>
            <!-- /.card -->

            <!-- Read Modal -->
            <div class="modal fade" id="modalRead" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="readData()"> <!-- prevent will prevent page refresh -->
                    <div class="modal-body">
                        <div class="form-group-row">
                            <div class="form-group">
                                <label>Kode Supplier: </label>
                                <input disabled v-model="form.KodeSupplier" type="text" name="KodeSupplier" placeholder="Kode Supplier" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nama Supplier: </label>
                                <input disabled v-model="form.NamaSupplier" type="text" name="NamaSupplier" placeholder="Nama Supplier" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Alamat: </label>
                                <input disabled v-model="form.Alamat" type="text" name="Alamat" placeholder="Alamat" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Telepon: </label>
                                <input disabled v-model="form.Telepon" type="text" name="Telepon" placeholder="Telepon" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Handphone: </label>
                                <input disabled v-model="form.Handphone" type="text" name="Handphone" placeholder="Handphone" class="form-control">
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
                    <h5 v-show="!modal_change" class="modal-title">Tambah Supplier</h5>
                    <h5 v-show="modal_change" class="modal-title">Ubah Supplier</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="modal_change ? updateData() : createData()"> <!-- prevent will prevent page refresh -->
                    <div class="modal-body">
                        <div class="form-group-row">
                            <div class="form-group">
                                <label v-show="modal_change">Kode Supplier: </label>
                                <input v-model="form.KodeSupplier" type="text" name="KodeSupplier" placeholder="Kode Supplier" 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('KodeSupplier') }">
                                <has-error :form="form" field="KodeSupplier"></has-error>
                            </div>
                            <div class="form-group">
                                <label v-show="modal_change">Nama Supplier: </label>
                                <input v-model="form.NamaSupplier" type="text" name="NamaSupplier" placeholder="Nama Supplier" 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('NamaSupplier') }">
                                <has-error :form="form" field="NamaSupplier"></has-error>
                            </div>
                            <div class="form-group">
                                <label v-show="modal_change">Alamat: </label>
                                <input v-model="form.Alamat" type="text" name="Alamat" placeholder="Alamat" 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('Alamat') }">
                                <has-error :form="form" field="Alamat"></has-error>
                            </div>
                            <div class="form-group">
                                <label v-show="modal_change">Telepon: </label>
                                <input v-model="form.Telepon" type="text" name="Telepon" placeholder="Telepon" 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('Telepon') }">
                                <has-error :form="form" field="Telepon"></has-error>
                            </div>
                            <div class="form-group">
                                <label v-show="modal_change">Handphone: </label>
                                <input v-model="form.Handphone" type="text" name="Handphone" placeholder="Handphone" 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('Handphone') }">
                                <has-error :form="form" field="Handphone"></has-error>
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
                supplier : {},
                //for vform
                form : new Form({
                    KodeSupplier : '',
                    NamaSupplier : '',
                    Alamat : '',
                    Telepon : '',
                    Handphone : '',
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
                axios.get('api/supplier?page=' + page)
                    .then(response => {
                        this.supplier = response.data
                    });
            },

            //for modals
            createModal() {
                this.modal_change = false
                this.form.reset()
                $('#modalData').modal('show')
            },
            readModal(supplier) {
                this.form.reset()
                $('#modalRead').modal('show')
                this.form.fill(supplier)
            },
            updateModal(supplier) {
                this.modal_change = true
                this.form.reset()
                $('#modalData').modal('show')
                this.form.fill(supplier)
            },
            readData() {
                axios.get('api/supplier')
                .then(({ data }) => (this.supplier = data))
            },
            createData() {
                this.$Progress.start()
                this.form.post('api/supplier')
                // if everything's ok
                .then(()=>{
                    toast({
                        type: 'success',
                        title: 'Supplier berhasil ditambahkan'
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
                this.form.put('api/supplier/' + this.form.KodeSupplier)
                // if everything's ok
                .then(()=>{
                    toast({
                        type: 'success',
                        title: 'Supplier berhasil diubah'
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
                        this.form.delete('api/supplier/' + id)
                        .then(()=>{                       
                            Swal(
                            'Sukses!',
                            'Supplier berhasil dihapus',
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
                axios.get('api/findSupplier?q=' + this.filter)
                .then((data) => {
                    this.supplier = data.data
                })
                .catch(()=>{})
            })
            // () is blank function stands for function()
        }
    }
</script>