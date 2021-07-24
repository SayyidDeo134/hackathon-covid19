@extends('template.app')
@section('app')
    <div class="auth-page">
        <div class="card shadow" style="width: 25rem">
            <div class="card-body">
                <h4 class="card-title text-uppercase text-center text-primary">Lihat<span class="fw-light" >covid19</span></h4>
                <form action="/register" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="fs-12 mb-2">Email</label>
                        <input type="email" name="email" id="email" placeholder="email" class="form-control form-control-sm">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="fs-12 mb-2">password</label>
                        <input type="password" name="password" id="password" placeholder="password" class="form-control form-control-sm">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary text-white" type="submit">Daftar</button>
                    </div>
                    <div class="my-2 fs-12 text-center">
                        <a href="/" class="text-decoration-none mx-2">Kembali ke beranda</a> |
                        <a href="/login" class="text-decoration-none mx-2">Sudah punya akun?login</a> 
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection