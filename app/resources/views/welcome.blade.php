<!DOCTYPE html>
<html>
<head>
  <title>Lara from scratch 5.4</title>
</head>
<body>
  <ul>
    Old way: </br>
    <!-- <?php foreach ($tasks as $value) : ?> -->
      <!-- <li><?= $value; ?></li> -->
    <!-- <?php endforeach; ?> -->

    Blade way: </br>
    @foreach ($tasks as $value)
      <li> {{ $value }} </li>
    @endforeach
  </ul>
</body>
</html>
