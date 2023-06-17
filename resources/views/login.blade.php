@extends('layouts.login') @section('login')
<div class="container-fluid" id="login">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6" id="kiri">
            <img src="{{ 'source/img/bg-login.png' }}" alt="" />
        </div>
        <div class="col-lg-6 col-md-6" id="kanan">
            <div class="card">
                <div class="card-body">
                    <h1>Admin Login</h1>
                    <form action="/login" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                placeholder="Fill with your email"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label"
                                >Password</label
                            >
                            <input
                                type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                placeholder="Password"
                            />
                        </div>
                        <button class="btn btn-login">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
