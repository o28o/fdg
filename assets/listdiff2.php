<!DOCTYPE html>
<html>
<head>
  <title>Text Links Diff</title>
  <!-- Include required libraries -->
  <link href="/assets/css/jquery-ui.css" rel="stylesheet"/>
  <link href="/assets/css/styles.css" rel="stylesheet" />
  <link href="/assets/css/extrastyles.css" rel="stylesheet" />
  <script src="/assets/js/jquery-3.6.0.js"></script>
  <script src="/assets/js/jquery-ui.js"></script>
</head>
<body>
  <div class="container mt-5">
    <form id="textLinksForm">
      <div class="mb-3">
        <label for="string1" class="form-label">String 1:</label>
        <input type="text" class="form-control" id="string1" name="string1" required>
      </div>
      <div class="mb-3">
        <label for="string2" class="form-label">String 2:</label>
        <input type="text" class="form-control" id="string2" name="string2" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div id="result" class="mt-4"></div>
  </div>

  <script>
    // Handle form submission
    document.getElementById('textLinksForm').addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent form submission

      // Get the input values
      var string1 = document.getElementById('string1').value;
      var string2 = document.getElementById('string2').value;

      // Remove prefixes
      string1 = string1.substring(string1.indexOf(":") + 1).trim();
      string2 = string2.substring(string2.indexOf(":") + 1).trim();

      // Remove trailing numbers
      string1 = string1.replace(/ \(\d+\)$/, '');
      string2 = string2.replace(/ \(\d+\)$/, '');

      // Explode strings into arrays
      var array1 = string1.split(" ");
      var array2 = string2.split(" ");

      // Find differences
      var differences = array1.filter(function(value) {
        return array2.indexOf(value) === -1;
      });

      // Print differences
      var result = "";
      differences.forEach(function(difference) {
        result += difference + "<br>";
      });

      // Display the result
      document.getElementById('result').innerHTML = "Result:<br>" + result;
    });
  </script>
</body>
</html>

