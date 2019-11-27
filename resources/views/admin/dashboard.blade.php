@extends('layouts.admin')

@section('title','Dashboard maneira')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h4>Gráfico de acessos</h4>
            <canvas id="myChart"></canvas>
        </div>

    </div>
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cliques únicos hoje</h5>
                    <p class="card-text">
                        {{\App\Entities\Helpers\Access::whereDate('created_at',date('Y-m-d'))->count()}}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">E-mails não lidos</h5>
                    <p class="card-text">
                        {{\App\Entities\Mailer\Mail::where('status_id','<',3)->count()}}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    let statistics = JSON.parse('{!! $statistics !!}');
    let labels = [];
    let values = [];
    statistics.map(data => {
        labels.push(data.date);
        values.push(data.access);
    });


    let ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Acessos',
                backgroundColor: 'rgb(144,42,255)',
                borderColor: 'rgb(144,42,255)',
                data: values
            }]
        },
        options: {}
    });
</script>
@endsection
