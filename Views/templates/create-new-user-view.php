
    <!-- Nested Row within Card Body -->
    <div class="row">
        <div class="col-lg-4 d-none d-lg-block bg-register-image">
            <h1>hola</h1>
        </div>
        <div class="col-lg-7 ">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Crear usuario</h1>
                </div>
                <form class="user">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" name="user_name" id="user_name"
                                placeholder="Nombre completo">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-user" name="last_name_father" id="last_name_father"
                                placeholder="Apellido paterno">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" name="last_name_mother" id="last_name_mother"
                                placeholder="Apellido materno">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input type="email" class="form-control form-control-user" name="user_email" id="user_email"
                            placeholder="Correo">
                        </div>
                          <div class="col-sm-6">
                            <input type="text" class="form-control form-control-user" name="user_number_phone" id="user_number_phone"
                                placeholder="Celular">
                        </div>
                       
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user"
                                id="user_password" placeholder="contraseña">
                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user"
                                id="user_password_repeat" placeholder="Repetir contraseña">
                        </div>
                    </div>
                   <div class="form-group row">
                        <div class="col-sm-6">
                            <select class="form-control form-control-user" name="user_role" id="user_role">
                                <option value="">Seleccionar opción</option>
                                <option value="admin">Administrador</option>
                                <option value="user">Usuario</option>
                                <option value="guest">Invitado</option>
                            </select>
                        </div>
                    </div>
                    <a href="login.html" class="btn btn-primary btn-user btn-block">
                        Registrar usuario
                    </a>
                    <hr>
            
                </form>
               
            </div>
        </div>
    </div>
