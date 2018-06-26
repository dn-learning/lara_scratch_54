<!DOCTYPE html>
<html>
<head>
  <title>Lara from scratch 5.4</title>
</head>
<body>
  <ul>
    Old way: </br>
    <!-- <?php foreach ($tasks as $value) : ?> -->
      <!-- <li><?= $value->body; ?></li> -->
    <!-- <?php endforeach; ?> -->

    Blade way: </br>
    @foreach ($tasks as $value)
      <li> <a href='{{ url("tasks",[$value->id]) }}'> {{ $value->body }} </a> </li>
    @endforeach
  </ul>
</body>
</html>
