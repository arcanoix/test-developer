<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        

        <div class="container mt-5" id="app">            
                <div class="row justify-content-center">
                      <div class="col-md-6">
                        <span class="anchor" id="formUserEdit"></span>
                        <hr class="my-5">
                        <!-- form user info -->
                        <div class="card card-outline-secondary">
                          <div class="card-header">
                            <h3 class="mb-0">Informacion</h3>
                          </div>
                          <div class="card-body">
                            <form autocomplete="off" class="form" role="form">
                              
                              <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Nombre</label>
                                <div class="col-lg-9">
                                   <input type="text" name="name" v-model="form.name" class="form-control" placeholder="Ingrese el nombre">
                                   <small v-if="showError" class="text-danger">@{{ name_error }}</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                <div class="col-lg-9">
                                   <input type="text" name="email" v-model="form.email" class="form-control" placeholder="Ingrese el correo electronico">
                                    <small v-if="showError" class="text-danger">@{{ email_error }}</small>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Telefono</label>
                                <div class="col-lg-9">
                                  <input type="text" name="telephone" @keyup="onlyNumber" v-model="form.telephone" class="form-control" placeholder="Ingrese el numero telefonico">
                                   <small v-if="showError" class="text-danger">@{{ telephone_error }}</small>
                                </div>
                              </div>
                             
                            
                              <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Mensaje</label>
                                <div class="col-lg-9">
                                    <textarea name="msg" v-model="form.msg" @keyup="notTag" id="msg" cols="30" rows="10" class="form-control" placeholder="ingrese mensaje"></textarea>
                                     <small v-if="showError" class="text-danger">@{{ msg_error }}</small>
                                </div>
                              </div>
                             
                              <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-9">
                                    <input class="btn btn-secondary" type="reset" @click="changeRoute" value="Cancelar"> 
                                    <input class="btn btn-primary" type="button" @click="register" value="Guardar">
                                </div>
                              </div>
                            </form>
                          </div>
                        </div><!-- /form user info -->
                      </div>
                </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>

        
        <script>
            
            var app = new Vue({
                    el:'#app',
                    data() {
                        return {
                            form: {
                                name:'',
                                email:'',
                                telephone:'',
                                msg:''   
                            },
                            showError:false,
                            name_error:'',
                            email_error:'',
                            telephone_error:'',
                            msg_error:''
                        }
                    },
                    mounted(){
                        
                    },
                    methods: {
                        register() {

                                let url = '{{ route('information.store') }}';
                              

                                axios.post(url, this.form)
                                        .then( (res) => {
                                            
                                            alert('se a registrado correctamente');
                                            this.form.name = '';
                                            this.form.email = '';
                                            this.form.telephone = '';
                                            this.form.msg = '';
                                            this.showError = false;
                                            this.name_error = '';
                                            this.email_error = '';
                                            this.telephone_error = '';
                                            this.msg_error = '';

                                        })
                                        .catch( err => {
                                                console.log(err.response);
                                                if(err.response.status === 422){
                                                    this.name_error = err.response.data.errors.name ? err.response.data.errors.name[0] : '';
                                                    this.email_error = err.response.data.errors.email ? err.response.data.errors.email[0] : '';
                                                    this.telephone_error = err.response.data.errors.telephone ? err.response.data.errors.telephone[0] : '';
                                                    this.msg_error = err.response.data.errors.msg ? err.response.data.errors.msg[0] : '';
                                                    this.showError = true;
                                                }
                                                
                                        });

                        },
                        changeRoute() {
                            window.location.href="{{ route('information.index') }}";
                        },
                        notTag() {
                                this.form.msg.replace(/<[^>]*>/g, ' ');
                                
                        },
                        onlyNumber() {

                        }
                    }

            });

        </script>




    </body>
</html>
