<?php
// Replace with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "waternetic";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get folders from the database
function getFolders($conn) {
    $sql = "SELECT * FROM folders";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return array();
    }
}

// Function to get files from the database
function getFiles($conn) {
    $sql = "SELECT files.*, folders.name AS folder_name 
            FROM files 
            LEFT JOIN folders ON files.folder_id = folders.id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return array();
    }
}

// Function to create a folder
function createFolder($conn, $folderName) {
    $sql = "INSERT INTO folders (name) VALUES ('$folderName')";
    $conn->query($sql);
}

// Function to create a file
function createFile($conn, $fileName, $folderId) {
    $sql = "INSERT INTO files (name, folder_id) VALUES ('$fileName', '$folderId')";
    $conn->query($sql);
}

// Handle folder creation
if (isset($_POST['folderName'])) {
    $folderName = $_POST['folderName'];
    createFolder($conn, $folderName);
}

// Handle file upload
if (isset($_FILES['file']) && isset($_POST['folderSelect'])) {
    $fileName = $_FILES['file']['name'];
    $folderId = $_POST['folderSelect'];

    // Move the uploaded file to the server (you may need to adjust the destination folder)
    move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $fileName);

    createFile($conn, $fileName, $folderId);
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Water Bill File Manager</title>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Water Bill File Manager</h2>

    <!-- Folder Creation Form -->
    <form method="post" action="">
        <div class="form-row align-items-center">
            <div class="col">
                <label for="folderName">Create Folder:</label>
                <input type="text" class="form-control" id="folderName" name="folderName" placeholder="Folder name">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </form>

    <!-- File Upload Form -->
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group mt-3">
            <label for="file">Upload Water Bill File:</label>
            <input type="file" class="form-control-file" id="file" name="file" accept=".pdf">
        </div>
        <div class="form-group">
            <label for="folderSelect">Select Folder:</label>
            <select class="form-control" id="folderSelect" name="folderSelect">
                <option value="0">No Folder</option>
                <?php
                $folders = getFolders($conn);
                foreach ($folders as $folder) {
                    echo "<option value='{$folder['id']}'>{$folder['name']}</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <!-- Folder and File List Table -->
    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Type</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $folders = getFolders($conn);
        foreach ($folders as $folder) {
            echo "<tr>";
            echo "<th scope='row'>{$folder['id']}</th>";
            echo "<td>Folder</td>";
            echo "<td>{$folder['name']}</td>";
            echo "<td><button class='btn btn-danger btn-sm' data-toggle='modal' data-target='#deleteFolderModal'>Delete</button></td>";
            echo "</tr>";
        }

        $files = getFiles($conn);
        foreach ($files as $file) {
            echo "<tr>";
            echo "<th scope='row'>{$file['id']}</th>";
            echo "<td>File</td>";
            echo "<td>{$file['name']}</td>";
            echo "<td>";
            echo "<a href='/download/{$file['id']}' class='btn btn-success btn-sm'>Download</a>";
            echo "<button class='btn btn-danger btn-sm' data-toggle='modal' data-target='#deleteFileModal'>Delete</button>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<!-- Delete Folder Modal -->
<div class="modal" id="deleteFolderModal" tabindex="-1" role="dialog">
    <!-- ... (similar structure as the previous delete modal) -->
</div>

<!-- Delete File Modal -->
<div class="modal" id="deleteFileModal" tabindex="-1" role="dialog">
    <!-- ... (similar structure as the previous delete modal) -->
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
