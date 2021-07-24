@extends('template.app')
@section('app')
    @include('components.navbar')
    <div class="container my-5">
        <h3 class="text-primary fw-light text-uppercase mb-3">Profil Data</h3>
        <div class="row">
            <div class="col-sm-8 mb-2">
                <h6 >Ubah Profile</h6>
                <form action="/update-profile" method="post">
                    <div class="mb-2">
                        <label for="nik" class="fs-12 mb-2">NIK KTP/KK</label>
                        <input type="text" name="nik" id="nik" placeholder="NIK" class="form-control form-control-sm">
                    </div>
                    <div class="mb-2">
                        <label for="place_born" class="fs-12 mb-2">Tempat Lahir</label>
                        <input type="text" name="place_born" id="place_born" placeholder="Tempat lahir" class="form-control form-control-sm">
                    </div>
                    <div class="mb-2">
                        <label for="date_born" class="fs-12 mb-2">Tanggal Lahir</label>
                        <input type="date" name="date_born" id="date_born" class="form-control form-control-sm">
                    </div>
                    <div class="mb-2">
                        <label for="alamat" class="fs-12 mb-2">Alamat</label>
                        <textarea name="address" class="form-control form-control-sm" id="address" cols="30" rows="5" placeholder="Alamat lengkap" ></textarea>
                    </div>
                    <div class="mb-2">
                        <button type="submit" class="btn btn-sm btn-primary text-white">Ubah Profil</button>
                        <a href="#" class="btn btn-primary btn-sm text-white">Daftar Vaksin</a>
                    </div>
                </form>
            </div>
            <div class="col-sm-4 mb-2">
                <h6 class="mb-3" >Histori Daftar Vaksin</h6>
                <div class="row">
                    <div class="col-12 mb-2">
                        <div class="card shadow">
                            <div class="card-body">
                                <small class="d-block text-secondary fs-12">12-05-2021 08:12</small>
                                <h6 class="text-uppercase m-0">Vaksin Sinovac (Rp. 250.000) </h6>
                                <p class="m-0 fs-12 ">
                                    RS Aloha
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
@endsection