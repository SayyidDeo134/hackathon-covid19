@extends('template.app')
@section('app')
@include('components.navbar')
    {{-- Jumbotron --}}
    <section id="jumbotron" style="background-image: url('https://thumbs.dreamstime.com/z/corona-virus-infographics-covid-banner-flyer-poster-178004371.jpg')" >
        
    </section>
    {{-- Jumbotron --}}
    {{-- Data Kasus --}}
    <section id="data_kasus" class="my-4">
        <div class="container">
            <h3 class="text-center text-uppercase mb-5" >Data Kasus Covid-19 Indonesia</h3>
            <div class="row justify-content-center">
                <div class="col-6 col-sm-3">
                    <div class="card text-white bg-primary mb-3 shadow" style="max-width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title fs-16 text-uppercase fw-light">Jumlah Positif</h5>
                            <h1 class="text-end m-0 positif-text" >0</h1>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <div class="card text-white bg-danger mb-3 shadow" style="max-width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title fs-16 text-uppercase fw-light">Jumlah Meninggal</h5>
                            <h1 class="text-end m-0 meninggal-text" >0</h1>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <div class="card text-white bg-success mb-3 shadow" style="max-width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title fs-16 text-uppercase fw-light">Jumlah Sembuh</h5>
                            <h1 class="text-end m-0 sembuh-text" >0</h1>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <div class="card text-white bg-secondary mb-3 shadow" style="max-width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title fs-16 text-uppercase fw-light">Jumlah Dirawat</h5>
                            <h1 class="text-end m-0 dirawat-text" >0</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="statistik">
        <div class="container">
            <h3 class="text-center text-uppercase mb-5" >Statistik Data</h3>
            <canvas id="myChart" style="width:100%;margin-bottom: 30px"></canvas>
        </div>
    </section>
    <section id="statistik" class="mb-5">
        <div class="container">
            <h3 class="text-center text-uppercase mb-5" >List Rumah Sakit Rujukan</h3>
            <table id="example" class="display" width="100%"></table>
        </div>
    </section>
    {{-- Data Kasus --}}

    @include('components.footer')

    <script>
            async function getDataKasusCovid(){
                var xValues = ["Positif", "Meninggal", "Sembuh", "Dirawat"];
                var yValues = [];
                var barColors = ["#8870FF", "#F1654C","#2CC990","#888888"];
                await fetch('https://data.covid19.go.id/public/api/update.json')
                    .then(req => req.json())
                    .then(res => {
                        yValues.push(res.update.penambahan.jumlah_positif)
                        document.querySelector('.positif-text').innerHTML = res.update.penambahan.jumlah_positif
                        yValues.push(res.update.penambahan.jumlah_meninggal)
                        document.querySelector('.meninggal-text').innerHTML = res.update.penambahan.jumlah_meninggal
                        yValues.push(res.update.penambahan.jumlah_sembuh)
                        document.querySelector('.sembuh-text').innerHTML = res.update.penambahan.jumlah_sembuh
                        yValues.push(res.update.penambahan.jumlah_dirawat)
                        document.querySelector('.dirawat-text').innerHTML = res.update.penambahan.jumlah_dirawat
                    })
                new Chart("myChart", {
                type: "bar",
                data: {
                    labels: xValues,
                    datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                    }]
                },
                options: {
                    legend: {display: false},
                }
                });
            }

            async function DatatableRumahSakit(){
                var data
                await axios('https://dekontaminasi.com/api/id/covid19/hospitals')
                .then(res => {
                    data = res.data
                })
                $('#example').DataTable({
                    data: data,
                    columns: [
                        {title: 'Name', data: 'name'},
                        {title: 'Alamat', data: 'address'},
                        {title: 'Kota, Provinsi', data: 'region'},
                        {title: 'Telepon', data: 'phone'},
                    ]
                })

            }
            
            getDataKasusCovid()
            DatatableRumahSakit()
        </script>
@endsection