@extends('layout.master')

@section('content')

    <div class="row">
        <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Statistics for {{ $link->name }}
                        </h3>
                    </div>
                    <div class="panel-body">

                        <canvas id="myChart" width="400" height="200" style="padding-right: 20px;"></canvas>

                    </div>
                    <!-- /panel-body -->
                    <div class="panel-footer">
                        Using statistics from {{ $statistics['labels']->first() }} to {{ $statistics['labels']->last() }}
                    </div>
                </div>

        </div>
    </div>

@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.js"></script>

    <script>

        var data = {
            labels: {!! $statistics['labels'] !!},
            datasets: [
                {
                    label: "My First dataset",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(75,192,192,0.4)",
                    borderColor: "rgba(75,192,192,1)",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "rgba(75,192,192,1)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(75,192,192,1)",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: {!! $statistics['data'] !!},
                }
            ]
        };

        // Any of the following formats may be used
        $(function(){
            myChart = new Chart(document.getElementById("myChart").getContext("2d")).Line(data, {
                responsive: true,
            });
        });
    </script>
@endpush