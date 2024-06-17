<?php
include('config.php');
include('session.php');

// Retrieve the total_due from the URL parameter
$total_due = isset($_GET['total_due']) ? $_GET['total_due'] : '';

// Retrieve user information
$result = $conn->query("SELECT * FROM user WHERE id='".$_SESSION['session_id']."'");
$row = mysqli_fetch_array($result);

// Retrieve total_due based on the ID passed in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT total_due FROM water_consumptionn WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $total_due_row = $stmt->fetch(PDO::FETCH_ASSOC);
    $total_due = $total_due_row['total_due'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PayNow Services</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
 <!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

<!-- Topbar Search -->
<form
    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
            aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
            aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small"
                        placeholder="Search for..." aria-label="Search"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li>

    <!-- Nav Item - Alerts -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter">3+</span>
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
                Alerts Center
            </h6>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-success">
                        <i class="fas fa-donate text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-warning">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                </div>
            </a>
            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
        </div>
    </li>

    <!-- Nav Item - Messages -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <!-- Counter - Messages -->
            <span class="badge badge-danger badge-counter">7</span>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">
                Message Center
            </h6>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="img/undraw_profile_1.svg"
                        alt="...">
                    <div class="status-indicator bg-success"></div>
                </div>
                <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a
                        problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="img/undraw_profile_2.svg"
                        alt="...">
                    <div class="status-indicator"></div>
                </div>
                <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how
                        would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="img/undraw_profile_3.svg"
                        alt="...">
                    <div class="status-indicator bg-warning"></div>
                </div>
                <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with
                        the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                        alt="...">
                    <div class="status-indicator bg-success"></div>
                </div>
                <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                        told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                </div>
            </a>
            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
        </div>
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']; ?></span>
            <img class="img-profile rounded-circle"
                src="img/undraw_profile.svg">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Settings
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Activity Log
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
        </div>
    </li>

</ul>

</nav>
<!-- End of Topbar -->
 <!-- Main Content -->
<div class="container mt-4 mx-auto text-center">
  <h1>Payment Services</h1>
  <div class="row mt-4 justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">Pay Bills</h2>
          <form method="post" action="payment_services.php" enctype="multipart/form-data">
            <div class="mb-3">
              <select class="form-select" id="bill-type" name="bill_type" required>
                <option selected disabled>Select Type of Payments</option>
                <option value="installation">Installation Fee</option>
                <option value="water_bill">Water Bill Fee</option>
                <option value="transaction_fee">Transaction Fee</option>
              </select>
            </div>

            <div class="mb-3">
              <div class="input-group">
                <span class="input-group-text">Customer ID</span>
                <input type="text" class="form-control" id="firstname" name="customer_id" value="<?php echo $row['id'];?>" readonly>
              </div>

              <div class="input-group">
                <span class="input-group-text">Name</span>
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $row['firstname'];?>" readonly>
              </div>
            </div>
            <div class="mb-3">
  <div class="input-group">
    <span class="input-group-text">Middle Name</span>
    <input type="text" class="form-control" id="middlename" name="middlename" value="<?php echo $row['middlename']; ?>" readonly>
  </div>
</div>
<div class="mb-3">
  <div class="input-group">
    <span class="input-group-text">Surname</span>
    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $row['lastname']; ?>" readonly>
  </div>
</div>

<div class="mb-3">
  <div class="input-group">
    <span class="input-group-text">Blk</span>
    <input type="text" class="form-control" id="block" name="block" value="<?php echo $row['block']; ?>" readonly>
  </div>
</div>

<div class="mb-3">
  <div class="input-group">
    <span class="input-group-text">Lot</span>
    <input type="text" class="form-control" id="lot" name="lot" value="<?php echo $row['lot']; ?>" readonly>
  </div>
</div>

<div class="mb-3">
  <div class="input-group">
    <span class="input-group-text">Ph</span>
    <input type="text" class="form-control" id="phase" name="phase" value="<?php echo $row['phase']; ?>" readonly>
  </div>
</div>
            <!-- Rest of your form inputs -->

            <div class="mb-3">
              <label for="amount" class="form-label">Amount</label>
              <div class="input-group">
                <span class="input-group-text">₱</span>
                <input type="text" class="form-control" id="amount" name="amount" onkeyup="formatCurrency(this);">
                </div>
            </div>

            <div class="mb-3">
            <label for="mode_of_payment" class="form-label">Mode of Payment</label>
<div class="input-group text-center">
  <div class="form-check d-inline-block mx-2">
    <input type="radio" class="form-check-input" id="gcash" name="mode_of_payment" value="GCash">
    <label class="form-check-label" for="gcash"><a href="gcash.php">GCash</a></label>
  </div>
  <div class="form-check d-inline-block mx-2">
    <input type="radio" class="form-check-input" id="paymaya" name="mode_of_payment" value="PayMaya">
    <label class="form-check-label" for="paymaya"><a href="paymaya.php">PayMaya</a></label>
  </div>
  <div class="form-check d-inline-block mx-2">
    <input type="radio" class="form-check-input" id="creditcard" name="mode_of_payment" value="CreditCard">
    <label class="form-check-label" for="creditcard"><a href="creditcard.php">Credit Card</a></label>
  </div>
</div>

  </div>
</div>

<div class="mb-3">
                        <label for="upload_image" class="form-label">Upload Reciept</label>
                        <input type="file" class="form-control" id="upload_image" name="upload_image">
                    </div>

            <div class="mb-3">
              <button type="submit" class="btn btn-primary" name="submit">Pay Now</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var billTypeSelect = document.getElementById('bill-type');
    var amountInput = document.getElementById('amount');

    function updateAmount() {
      if (billTypeSelect.value === 'installation') {
        amountInput.value = 'Php 1000.00';
      } else {
        amountInput.value = '';
      }
    }

    billTypeSelect.addEventListener('change', updateAmount);

    updateAmount();
  });
</script>
<script>
function formatCurrency(input) {
    // Remove existing commas and non-numeric characters
    var value = input.value.replace(/,/g, '').replace(/\D/g, '');

    // Format the number with commas
    value = parseFloat(value).toLocaleString('en-US', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });

    // Update the input value
    input.value = value;
}
</script>








  <!-- Bootstrap 5 JS -->
  <!-- Include Bootstrap JS files -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js" integrity="sha512-Hp0Sf/vYmIwC/lJcexHz7V4K4MO4H7vFJhpr0d7gWt3oDyWhY/mwu2QEmtJEBfZ9zRvRJTp10eBxVooTkbTcTg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
