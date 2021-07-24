@extends('template.app')
@section('app')
    @include('components.navbar')
    <div class="container my-5">
        <h3 class="text-primary fw-light text-uppercase mb-3">Profil Data {{ session()->get('user')['name'] }}</h3>
        <div class="row">
            <div class="col-sm-8 mb-2">
                <h6 >Ubah Profile</h6>
                <form action="/update-profile" method="post">
                    @if (session()->has('success'))
                        <div class="alert alert-primary" role="alert">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @csrf
                    <div class="mb-2">
                        <label for="nik" class="fs-12 mb-2">NIK KTP/KK</label>
                        <input type="hidden" name="id" value="{{ $client->id }}">
                        <input type="number" value="{{$client->nik}}" name="nik" id="nik" placeholder="NIK" class="form-control form-control-sm">
                        @error('nik')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="place_born"  class="fs-12 mb-2">Tempat Lahir</label>
                        <input type="text" value="{{$client->place_born}}" name="place_born" id="place_born" placeholder="Tempat lahir" class="form-control form-control-sm">
                        @error('place_born')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="date_born" value="{{$client->date_born}}" class="fs-12 mb-2">Tanggal Lahir</label>
                        <input type="date" name="date_born" id="date_born" class="form-control form-control-sm">
                        @error('date_born')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="alamat" class="fs-12 mb-2">Alamat</label>
                        <textarea name="address" class="form-control form-control-sm" id="address" cols="30" rows="5" placeholder="Alamat lengkap" >{{$client->address}}</textarea>
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <button type="submit" class="btn btn-sm btn-primary text-white">Ubah Profil</button>
                        <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary btn-sm text-white {{ $client->address ? '' : 'disabled' }}" aria-disabled="{{ $client->address ? 'false' : 'true' }}" >Daftar Vaksin</a>
                    </div>
                </form>
            </div>
            <div class="col-sm-4 mb-2">
                <h6 class="mb-3" >Histori Daftar Vaksin</h6>
                <div class="row">
                    @foreach ($history as $item)
                    <div class="col-12 mb-2">
                        <div class="card shadow">
                            <div class="card-body">
                                <small class="d-block text-secondary fs-12">{{$item->meet}} {{$item->hours}}</small>
                                <h6 class="text-uppercase m-0"> {{ $item->vaksin_name }} </h6>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="/daftar-vaksin" method="post">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Daftar Vaksin Tahap 1</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="text-uppercase" >{{ $client->user->name }}</h5>
                        <h5 class="fw-light fs-12" >{{ $client->place_born }}, {{ $client->date_born }}</h5>
                    </div>
                    <div class="col-md-6">
                        <h5>{{ $client->nik }}</h5>
                        <h5 class="fw-light fs-12" >{{ $client->address }}</h5>
                    </div>
                </div>
                <div class="mb-2 mt-2 row">
                    <label for="">Tentukan Tanggal dan Jam</label>
                    <div class="col-3">
                        @csrf
                        <input type="hidden" name="id" value={{$client->id}}>
                        <input type="date" name="meet" id="meet" class="form-control form-control-sm">
                        @error('meet')
                            <small class="fs-12 text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-3">
                        <input type="time" name="hours" id="hours" class="form-control form-control-sm">
                        @error('hours')
                            <small class="fs-12 text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <small class="text-warning">*pastikan data sudah benar untuk mendaftar</small>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary text-white">Save changes</button>
            </div>
          </div>
        </form>
        </div>
      </div>
    @include('components.footer')
@endsection