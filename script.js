function uploadFile() {
    var fileInput = document.getElementById('file');
    var fileList = document.getElementById('fileList');

    // Check if a file is selected
    if (fileInput.files.length > 0) {
        var file = fileInput.files[0];

        // Create a new list item for the file
        var listItem = document.createElement('li');
        listItem.className = 'list-group-item';
        listItem.textContent = 'File: ' + file.name;

        // Create download button for the file
        var downloadButton = document.createElement('button');
        downloadButton.className = 'btn btn-sm btn-outline-primary ml-2';
        downloadButton.textContent = 'Download';
        downloadButton.onclick = function () {
            downloadFile(file.name);
        };

        // Append download button to the list item
        listItem.appendChild(downloadButton);

        // Append the list item to the file list
        fileList.appendChild(listItem);

        // Clear the file input
        fileInput.value = '';
    } else {
        alert('Please choose a file before uploading.');
    }
}

function createFolder() {
    var folderNameInput = document.getElementById('folderName');
    var fileList = document.getElementById('fileList');

    // Check if a folder name is provided
    var folderName = folderNameInput.value.trim();
    if (folderName !== '') {
        // Create a new list item for the folder
        var listItem = document.createElement('li');
        listItem.className = 'list-group-item list-group-item-success';
        listItem.textContent = 'Folder: ' + folderName;

        // Append the list item to the file list
        fileList.appendChild(listItem);

        // Clear the folder name input
        folderNameInput.value = '';
    } else {
        alert('Please enter a folder name.');
    }
}

function downloadFile(fileName) {
    // Replace this with your download logic
    alert('Downloading file: ' + fileName);
}
