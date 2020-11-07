@extends('layouts.app')

@section('title','Chart')

@section('content')

<h1 class="d-flex justify-content-center">Check how much time you spent on each task</h1>
<div class="d-flex justify-content-around">
<form method="POST" action="/tasks/chart">
    @csrf
    <div class="d-flex flex-column mt-5">
        <div class="form-group">
            <select id="year" name="year" class="form-control @error('year') is-invalid @enderror">
                <option value="2020" selected>2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
            </select>
        </div>
        <div class="form-group">
        <select id="month" name="month" class="form-control @error('month') is-invalid @enderror">
            <option value="1" selected>January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>
        </div>
        <div class="form-group">
        <select id="weather" name="weather" class="form-control @error('weather') is-invalid @enderror">
            <option value="1" selected>Clear</option>
            <option value="2">Thunderstorm</option>
            <option value="3">Drizzle</option>
            <option value="4">Rain</option>
            <option value="5">Snow</option>
            <option value="6">Atmosphere</option>
            <option value="7">Clouds</option>
        </select>
        </div>
        <div class="form-group">
        <button id="search" name="search" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>

<div id="chart"></div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    var chartJs = <?=$chart?>
    // Load the Visualization API and the corechart package.
    google.charts.load('current', {
        'packages': ['corechart']
    });

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Activity');
        data.addColumn('number', 'Time');
        data.addRows(chartJs);
        // Set chart options
        var options = {
            'title': 'How Productive Have You Been',
            'width': 500,
            'height': 500
        };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart'));
        chart.draw(data, options);
    }

</script>
@endsection
