<template>
    <div class="container">
    <b-container fluid>
        <br><h2>Data Klasifikasi</h2><br>
        <b-row>
        <!-- <b-col md="1" /> -->
        <b-col md="5" class="my-1">
            <b-form-group horizontal label="Pencarian" class="mb-0">
            <b-input-group>
                <b-form-input v-model="filter" placeholder="Type to Search" />
                <b-input-group-append>
                <b-btn :disabled="!filter" @click="filter = ''">Clear</b-btn>
                </b-input-group-append>
            </b-input-group>
            </b-form-group>
        </b-col>
        <b-col md="2" />
        <b-col md="3" class="my-1">
            <b-form-group horizontal label="Halaman" class="mb-0">
            <b-form-select :options="pageOptions" v-model="perPage" />
            </b-form-group>
        </b-col>
        </b-row>
        <br>
        <b-row>
        <b-col md="3">
            <button class="btn btn-success" @click="testConsole">
                <i class="fas fa-plus-square">&nbsp;&nbsp;Tambah klasifikasi</i>
            </button>
        </b-col>
        </b-row>
        <br>

        <!-- Main table element -->
        <b-table stacked="md"
                :sort-by.sync="sortBy"
                :sort-desc.sync="sortDesc"
                :sort-direction="sortDirection"
                :current-page="currentPage"
                :per-page="perPage"
                :filter="filter"
                :items="klasifikasi.data"
                :fields="fields"
                :bordered="true"
                :striped="true"
                :hover="true"
                @filtered="onFiltered"
        >

            <template slot="actions" slot-scope="row">
                <a href="#" @click="readModal(row.klasifikasi)">
                    <i class="fas fa-eye green"></i>
                    Lihat
                </a>    
                &nbsp; - &nbsp;
                <a href="#" @click="updateModal(row.klasifikasi)">
                    <i class="fas fa-edit blue"></i>
                    Ubah
                </a>    
                &nbsp; - &nbsp;
                <a href="#" @click="deleteData(row.klasifikasi.id)">
                    <i class="fas fa-trash red"></i>
                    Hapus
                </a>
            </template>
        </b-table>

        <b-row>
        <b-col md="6" class="my-1">
            <b-pagination :total-rows="totalRows" :per-page="perPage" v-model="currentPage" class="my-0" />
        </b-col>
        </b-row>

    </b-container>

    <!-- Modals -->
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
            <form @submit.prevent="readData()">
                <div class="modal-body">
                    <div class="form-group">
                        <input disabled v-model="form.kode_klasifikasi" type="text" name="kode_klasifikasi" placeholder="Kode Klasifikasi" class="form-control">
                    </div>
                    <div class="form-group">
                        <input disabled v-model="form.nama_klasifikasi" type="text" name="nama_klasifikasi" placeholder="Nama Klasifikasi" class="form-control">
                    </div>
                    <div class="form-group">
                        <input disabled v-model="form.kode_item" type="text" name="kode_item" placeholder="Kode Item" class="form-control">
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
            <form @submit.prevent="modal_change ? updateData() : createData()">
                <div class="modal-body">
                    <div class="form-group">
                        <input v-model="form.kode_klasifikasi" type="text" name="kode_klasifikasi" placeholder="Kode Klasifikasi" 
                            class="form-control" :class="{ 'is-invalid': form.errors.has('kode_klasifikasi') }">
                        <has-error :form="form" field="kode_klasifikasi"></has-error>
                    </div>
                    <div class="form-group">
                        <input v-model="form.nama_klasifikasi" type="text" name="nama_klasifikasi" placeholder="Nama Klasifikasi" 
                            class="form-control" :class="{ 'is-invalid': form.errors.has('nama_klasifikasi') }">
                        <has-error :form="form" field="nama_klasifikasi"></has-error>
                    </div>
                    <div class="form-group">
                        <input v-model="form.kode_item" type="text" name="kode_item" placeholder="Kode Item" 
                            class="form-control" :class="{ 'is-invalid': form.errors.has('kode_item') }">
                        <has-error :form="form" field="kode_item"></has-error>
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
</template>

<script>
    export default {
        data() {
            return{
                modal_change : false,
                klasifikasi : {},
                form : new Form({
                    kode_klasifikasi : '',
                    nama_klasifikasi : '',
                    kode_item : '',
                    id : ''
                }),

                sortBy: 'kode_klasifikasi',
                fields: [
                    { key: 'kode_klasifikasi', sortable: true },
                    { key: 'nama_klasifikasi', sortable: true },
                    { key: 'kode_item', sortable: true },
                    { key: 'actions', label: 'Actions' }
                ],
                currentPage: 1,
                perPage: 10,
                totalRows: klasifikasi.length,
                pageOptions: [ 5, 10, 15, 20, 50 ],
                sortDesc: false,
                sortDirection: 'asc',
                filter: null,
                modalInfo: { title: '', content: '' }
            }
        },
        computed: {
            sortOptions () {
            // Create an options list from our fields
            return this.fields
                .filter(f => f.sortable)
                .map(f => { return { text: f.label, value: f.key } })
            }
        },
        methods : {
            testConsole() {
                axios.get('api/klasifikasi').then(({ data }) => (this.klasifikasi = data))
                console.log = klasifikasi.data;
            },
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
                axios.get('api/klasifikasi').then(({ data }) => (this.klasifikasi = data))
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
                })
                // if something's wrong
                .catch(()=>{
                     this.$Progress.fail(); 
                })
            },
            updateData() {
                this.$Progress.start()
                this.form.put('api/klasifikasi/' + this.form.id)
                // if everything's ok
                .then(()=>{
                    toast({
                        type: 'success',
                        title: 'Klasifikasi berhasil diubah'
                    })
                    this.$Progress.finish()
                    $('#modalData').modal('hide')
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
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Delete'
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
                        })
                        .catch(()=>{
                            Swal(
                                'Error!',
                                'Something went wrong',
                                'warning'
                            )
                        })
                    }
                })
            },

            resetModal () {
                this.modalInfo.title = ''
                this.modalInfo.content = ''
            },
            onFiltered (filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length
                this.currentPage = 1
            }
        },
        
        created() {
            this.readData()
            setInterval( ()=>this.readData(), 3000)
            // () is blank function
        }
    }
</script>