


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Distance Comparison Between Cities</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="js/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class='row'>
    <div class="col-sm-12"><h3>Distance Comparison Between Cities</h3></div>
    <div class="col-sm-6">
      <label for="usr">Origin:</label><input type="text" name="origin" id="origin" value="Seattle" class="form-control"><br>
      <label for="usr">Destination1:</label><input type="text" name="destination1" id="destination1" value="Sillicon Valley" class="form-control"><br>
      <label for="usr">Destination2:</label> <input type="text" name="destination2" id="destination2" value="Montreal" class="form-control"><br>
      <label for="usr">Travelling Mode:</label><select name="mode" id="mode" class="form-control">
                              <option value='0'>Driving</option>
                              <option value='1'>Bicycling</option>
                              <option value='2'>Walking</option>
                      </select><br>
      <input type="button" id='submit' value="Calculate Distance!" class="btn btn-default">
    </div>
    <div class="col-sm-6">
      <div id="output"></div>
    </div>

</div>


</div>



<script>
$(document).ready(function(){
    $("#submit").click(function(){
        var origin = $('#origin').val();
        var destination1 = $('#destination1').val();
        var destination2 = $('#destination2').val();
        var mode = $('#mode').val();

        $.ajax({
            type: 'GET',
            url: 'backend.php',
            data: { origin : origin, destination1: destination1, destination2: destination2, mode: mode},
            success: function(data) {
              document.getElementById("output").innerHTML = data;
            }
        });

    });
});
</script>
</body>
</html>
