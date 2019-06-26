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
                      <div class="col-md-12">
                        <span class="anchor" id="formUserEdit"></span>
                        <hr class="my-5">
                        <!-- form user info -->
                        <div class="card card-outline-secondary">
                          <div class="card-header">
                            <h3 class="mb-0">Informacion</h3>
                            <a href="{{ route('information.create') }}" class="btn btn-sm btn-primary float-right">Registrar</a>
                          </div>
                          <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Telefono</th>
                                        <th>Mensaje</th>

                                    </thead>
                                    <tbody>
                                        @if(count($information) > 0)
                                            @foreach($information as $info)
                                            <tr>
                                                <td>{{ $info->name }}</td>
                                                <td>{{ $info->email }}</td>
                                                <td>{{ $info->telephone }}</td>
                                                <td>{{ $info->msg }}</td>
                                            </tr>
                                            @endforeach
                                        @else
                                                <tr>
                                                    <td colspan="4">
                                                        <p class="text-center text-white bg-secondary">No hay registros</p>
                                                    </td>
                                                </tr>
                                        @endif
                                    </tbody>
                                </table>
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
                            information: []
                        }
                    },
                    mounted(){
                        this.getInformation();
                    },
                    methods: {
                        register() {

                                let url = '';

                                axios.post()
                                        .then( (res) => {

                                        })
                                        .catch( err => {

                                        });

                        },
                        getInformation() {
                            axios.get('/information')
                                    .then( res => {
                                            this.information = res.data.information;
                                    })
                                    .catch( err => {
                                        console.log(err);
                                    });
                        }
                    }

            });

        </script>




    </body>
</html>
