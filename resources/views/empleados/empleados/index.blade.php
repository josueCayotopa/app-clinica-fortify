@extends('home')
@section('home')
    <div class="container mt-5">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
      

        <h4>Usuario</h4>

        <div class="search-container mb-3">
            <div class="input-group me-3">
                <select class="form-select" id="filter-by">
                    <option value="name">Nombre</option>
                    <option value="username">Usuario</option>
                    <!-- Agrega más opciones de filtro según tus necesidades -->
                </select>
            </div>
            <div class="input-group flex-grow-1">
                <input type="text" class="form-control" id="search-input" placeholder="Buscar">
            </div>
            @can('empleado_create')
                
           
            <button class="btn btn-primary ms-3" id="new-button">Nuevo <span><i class='bx bx-user-plus'></i></span>

            </button>
            @endcan
        </div>

        <table class="table table-borderless">
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Rol</th>

                    <th>Email</th>
                    <th>Fecha</th>

                    <th text-right>Opciones</th>
                </tr>
            </thead>
            <tbody id="user-table">
               
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                           
                        </td>
                        <td></td>
                        <td></td>
                        <td text-right>
                            <div class="action-buttons"
                                style=" display: flex;
                            justify-content: center;
                            margin-top: 20px;">
                                

                                <a href=" " class="btn btn-outline-primary"
                                    style="margin: 0 2px;">
                                    <span><i class='bx bx-show-alt'></i></span>
                                </a>
                            

                            
                                    
                               
                                <a href=" " class="btn btn-warning"
                                    style="margin: 0 2px;">
                                    <span><i class='bx bx-edit-alt'></i></span>
                                </a>
                              
                           
                                <div>
                                    <form action="" method="POST"
                                        onsubmit="return confirm('seguro?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" style="margin: 0 2px;">
                                            <span><span><i class='bx bxs-x-circle'></i></span>

                                        </button>
                                    </form>

                                </div>
                        

                            </div>




                        </td>
                    </tr>
               
            </tbody>
        </table>

        <div class="mt-5"> <!-- Mayor separación entre la tabla y el paginador -->
           
        </div>
    </div>
    <!-- Modal -->
    

    <script>
        document.getElementById('new-button').addEventListener('click', function() {
            window.location.href = '#';
        });

      
    </script>
    <script>
        $(document).ready(function(){
            $('#search-input').on('keyup', function(){
                var query = $(this).val();
                var column = $('#filter-by').val();
    
                $.ajax({
                    url: "{{ route('users.search') }}",
                    type: 'GET',
                    data: { query: query, column: column },
                    success: function(response){
                        var usersHtml = '';
    
                        $.each(response, function(i, user){
                            usersHtml += '<tr>';
                            usersHtml += '<td>' + user.id + '</td>';
                            usersHtml += '<td>' + user.name + '</td>';
                            usersHtml += '<td>' + user.username + '</td>';
                            usersHtml += '<td>' + user.role + '</td>';
                            usersHtml += '<td>' + user.email + '</td>';
                            usersHtml += '<td>' + user.created_at + '</td>';
                            // Agrega más columnas según tus necesidades
                            usersHtml += '<td><div class="action-buttons"><!-- Botones de acción --></div></td>';
                            usersHtml += '</tr>';
                        });
    
                        $('#user-table').html(usersHtml);
                    }
                });
            });
        });
    </script>
  



    </div>
@endsection
