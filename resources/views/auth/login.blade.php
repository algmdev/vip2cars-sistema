@extends('layouts.auth')

@section('title', 'Inicio de sesión')

@section('content')
    <div class="row vh-100">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <form id="login-form">
                    @csrf

                    <div class="card-body">
                        <h5 class="card-title">Inicio de sesión</h5>

                        <small>(*) Requerido</small>

                        <hr>

                        <div class="mb-3">
                            <label for="username" class="form-label">Usuario: *</label>
                            <input type="text" class="form-control" name="username"
                                placeholder="Ingrese su usuario o correo">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña: *</label>
                            <input type="password" class="form-control" name="password" placeholder="Ingrese su contraseña">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                        </div>

                        <div id="alert-errors"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/auth/login.js') }}"></script>
@endsection
