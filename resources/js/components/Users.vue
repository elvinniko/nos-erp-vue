<template>
    <div class="container">
        
            <div class="card">
              <div class="card-header">
                    <button class="btn btn-success" @click="newModal">
                        <i class="fas fa-user-plus"> Add user</i>
                    </button>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Created</th>
                    <th>Modify</th>
                  </tr>

                  <tr v-for='user in users.data' :key='user.id'>
                    <td>{{user.id}}</td>
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.type | uppercase}}</td>
                    <td>{{user.created_at | date}}</td>
                    <td>
                        <a href="#" @click="editModal(user)">
                            <i class="fas fa-edit blue"></i>
                            Edit
                        </a>    
                        |
                        <a href="#" @click="deleteUser(user.id)">
                            <i class="fas fa-trash red"></i>
                            Delete
                        </a>
                    </td>
                  </tr>
                </tbody></table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Create Modal -->
            <div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="newUserTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newUserTitle">Create User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="createUser()"> <!-- prevent will prevent page refresh -->
                    <div class="modal-body">
                        <div class="form-group">
                            <input v-model="form.name" type="text" name="name" placeholder="Name" 
                                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="form-group">
                            <input v-model="form.email" type="email" name="email" placeholder="Email" 
                                class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                            <has-error :form="form" field="email"></has-error>
                        </div>
                        <div class="form-group">
                            <input v-model="form.password" type="password" name="password" placeholder="Password" 
                                class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                            <has-error :form="form" field="password"></has-error>
                        </div>
                        <div class="form-group">
                            <select v-model="form.type" type="text" name="type" placeholder="Type" 
                                class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                                <option value="">User role</option>
                                <option value="admin">Admin</option>
                                <option value="member">Member</option>
                                <option value="user">User</option>
                            </select>
                            <has-error :form="form" field="type"></has-error>
                        </div>
                        <div class="form-group">
                            <input v-model="form.photo" type="text" name="photo" placeholder="Photo" 
                                class="form-control" :class="{ 'is-invalid': form.errors.has('photo') }">
                            <has-error :form="form" field="photo"></has-error>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                </div>
            </div>
            </div>

            <!-- Edit Modal -->
            <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="editUserTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserTitle">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="editUser()">
                    <div class="modal-body">
                        <div class="form-group">
                            <input v-model="form.name" type="text" name="name" placeholder="Name" 
                                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="form-group">
                            <input v-model="form.email" type="email" name="email" placeholder="Email" 
                                class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                            <has-error :form="form" field="email"></has-error>
                        </div>
                        <div class="form-group">
                            <input v-model="form.password" type="password" name="password" placeholder="Password" 
                                class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                            <has-error :form="form" field="password"></has-error>
                        </div>
                        <div class="form-group">
                            <select v-model="form.type" type="text" name="type" placeholder="Type" 
                                class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                                <option value="">User role</option>
                                <option value="admin">Admin</option>
                                <option value="member">Member</option>
                                <option value="user">User</option>
                            </select>
                            <has-error :form="form" field="type"></has-error>
                        </div>
                        <div class="form-group">
                            <input v-model="form.photo" type="text" name="photo" placeholder="Photo" 
                                class="form-control" :class="{ 'is-invalid': form.errors.has('photo') }">
                            <has-error :form="form" field="photo"></has-error>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
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
                users : {},
                form : new Form({
                    id : '',
                    name : '',
                    email : '',
                    password : '',
                    type : '',
                    photo : ''                    
                })
            }
        },
        methods : {
            newModal() {
                this.form.reset()
                $('#newUser').modal('show')
            },
            editModal(user) {
                this.form.reset()
                $('#editUser').modal('show')
                this.form.fill(user)
            },
            loadUser() {
                axios.get('api/user').then(({ data }) => (this.users = data))
            },
            createUser() {
                this.$Progress.start()
                this.form.post('api/user')
                // if everything's ok
                .then(()=>{
                    toast({
                        type: 'success',
                        title: 'User added successfully'
                    })
                    this.$Progress.finish()
                    $('#newUser').modal('hide')
                })
                // if something's wrong
                .catch(()=>{
                     this.$Progress.fail(); 
                })
            },
            editUser() {
                this.$Progress.start()
                this.form.put('api/user/' + this.form.id)
                // if everything's ok
                .then(()=>{
                    toast({
                        type: 'success',
                        title: 'User edited successfully'
                    })
                    this.$Progress.finish()
                    $('#editUser').modal('hide')
                })
                // if something's wrong
                .catch(()=>{
                     this.$Progress.fail(); 
                })
            },
            deleteUser(id) {
                Swal({
                    title: 'Are you sure?',
                    text: "Your data will be deleted permanently!",
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonColor: '#3085d6',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Delete'
                })
                .then((result) => {
                    if (result.value) {
                        this.form.delete('api/user/' + id)
                        .then(()=>{                       
                            Swal(
                            'Deleted!',
                            'The user has been deleted',
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
            }
        },
        created() {
            this.loadUser()
            setInterval( ()=>this.loadUser(), 5000)
            // () is blank function
        }
    }
</script>
