<!DOCTYPE html>
<html>
<head>
  <title>Water Bill Calculator</title>
  <!-- Bootstrap 5 CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css" integrity="sha512-C+tL6RH7nL9YLnAe5U6+wzF6Q5U6Z0jvL8EjfiyGXx2yV1XrGLvD8VhWwOuJ7VrkJN+vP/h8fKj/AsTCC7y61A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <style>
    .calculator-form {
      max-width: 400px;
      margin: 0 auto;
    }

    .calculator-heading {
      text-align: center;
      margin-bottom: 30px;
    }
  </style>
  <script>
    function calculateBill() {
      var previousReading = parseInt(document.getElementById("previousReading").value);
      var currentReading = parseInt(document.getElementById("currentReading").value);

      if (!isNaN(previousReading) && !isNaN(currentReading)) {
        var baseFee = 10; // Example base fee amount
        var usageRate = 0.5; // Example rate per unit of water used
        var usageUnits = currentReading - previousReading;
        var usageFee = usageUnits * usageRate;
        var totalBill = baseFee + usageFee;

        document.getElementById("totalBill").value = totalBill.toFixed(2);
      }
    }
  </script>
</head>
<body>
  <div class="container mt-5">
    <h2 class="calculator-heading">Water Bill Calculator</h2>
    <form class="calculator-form" action="waterconsumption.php" method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" id="name" name="name" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="lastName" class="form-label">Last Name:</label>
        <input type="text" id="lastName" name="lastName" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="middleName" class="form-label">Middle Name:</label>
        <input type="text" id="middleName" name="middleName" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="block" class="form-label">Block:</label>
        <input type="text" id="block" name="block" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="lot" class="form-label">Lot:</label>
        <input type="text" id="lot" name="lot" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="phase" class="form-label">Phase:</label>
        <input type="text" id="phase" name="phase" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="previousReading" class="form-label">Previous Reading:</label>
        <input type="number" id="previousReading" name="previousReading" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="currentReading" class="form-label">Current Reading:</label>
        <input type="number" id="currentReading" name="currentReading" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="totalBill" class="form-label">Total Bill:</label>
        <input type="text" id="totalBill" name="totalBill" class="form-control" readonly>
      </div>

      <div class="mb-3 text-center">
        <button type="button" class="btn btn-primary" onclick="calculateBill()">Calculate</button>
        <br>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js" integrity="sha512-Hp0Sf/vYmIwC/lJcexHz7V4K4MO4H7vFJhpr0d7gWt3oDyWhY/mwu2QEmtJEBfZ9zRvRJTp10eBxVooTkbTcTg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
