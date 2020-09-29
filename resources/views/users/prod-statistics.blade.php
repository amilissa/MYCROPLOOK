@extends('layouts.app')

@section('content')
<html>
  <head>
    <!--Load the AJAX API-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Months');
        data.addColumn('number', 'Crop');
        data.addRows([
          ['Mushrooms', 3],
          ['Onions', 1],
          ['Olives', 1],
          ['Zucchini', 1],
          ['Pepperoni', 2]
        ]);

        // Set chart options
        var options = {title:'Monthly Data',
            
                           hAxis: {
                               title: 'Months'
                           },
                       
                            vAxis: {
                                title: 'Crop'
                            },
                            colors: ['green'],
                            chartArea: {
                                width: '50%',
                                height: '80%'
                            }
                       };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>

  <body>

  <div class="card-body">
        <div class="row">
            <div class="col-md-9">
         
            </div>
            <div class="col-md-3">
                <select name="year" id="year" class="form-control">
                    <option value="">Select Year</option>
                    @foreach($year_list as $row)
                        <option value="{{$row->updated_at}}">{{$row->updated_at}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<div class="container">
    <h3>Products Statistics</h3>
    <div class="row ">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <div>Crops Statistics</div>
                <div class="card-body">

                         {!! $chart->container() !!}

                </div>
            </div>
        </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <div>Profitability Statistics</div>
                    <div class="card-body">
                        <div class="container">
                                <div class="row">
                                    <div class="col-md-3"><b>Crop</b></div>
                                    <div class="col-md-3"><b>Prod. Cost</b></div>
                                    <div class="col-md-3"><b>Earnings</b></div>
                                  <div class="col-md-3"><b>Profit</b></div>
                                    @foreach($profits as $profit)
                                    <div class="col-md-3">{{$profit->crop_name}}</div>
                                    <div class="col-md-3">{{$profit->production_cost}}</div>
                                    <div class="col-md-3">{{$profit->earnings}}</div>
                                    <div class="col-md-3">{{(int)$profit->earnings - (int)$profit->production_cost}}</div>
                                    @endforeach
                                  </div>
                            </div>
            </div>
        </div>
    </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
{!! $chart->script() !!}
@endsection
