<!doctype html>
<html>

<head>
    <title>Winsel - @yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="{{url('/')}}">Winsel</a>
        @if (basename(url()->current())!="login")
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
          <div>
          <ul class="navbar-nav">
            <li class="nav-item active mr-2">
              <a name="newtask" class="nav-link bg-success" href="{{ url('/tasks/create') }}">New Task</a>
            </li>
            <li class="nav-item active mr-2">
              <a name="schedule" class="nav-link bg-success" href="{{ url('/tasks/schedule') }}">Schedule</a>
            </li>
            <li class="nav-item active mr-2">
              <a name="chart" class="nav-link bg-success" href="{{ url('/tasks/chart') }}">Chart</a>
            </li>
          </ul>
        </div>
          <div>
          <ul class="navbar-nav">
            <li class="nav-item active mr-2">
              <a name="logout" class="nav-link bg-danger" href="{{ url('/logout') }}">Logout</a>
             </li>
          </ul>
        </div>
        </div>
        @endif
      </nav>
    <div class="container mt-2">
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
      $("button[name=\"deleteTask\"]").click(function() {
      let trID=$(this).parent().parent().attr('id');
      trID=trID.replace('task-','');
      document['delete-task'].action=document['delete-task'].action.replace('substitute',trID);
      });
    </script>
    <script type="text/javascript">
      $("button[name=\"cancelModal\"]").click(function() {
      document['delete-task'].action=document['delete-task'].action.replace(/\d+$/,'substitute');
      });
    </script>
</body>

</html>
