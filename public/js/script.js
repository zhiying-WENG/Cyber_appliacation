feather.replace();

function checkFile(quota, maxSize) {
  const fileInput = document.getElementById('images');
  const fileSize = fileInput.files[0].size;
  const error = document.getElementById("error");

  const quotaInBytes = quota * 1024 * 1024;

  if (fileSize > maxSize) {
    error.style.display = "block";
    error.textContent = "File size must be less than 10Mo, the file won't upload";
    error.style.color = "red";
    error.style.fontSize = "20px";
    document.getElementById("button").disabled = true;
    return;
  }

  if (fileSize > quotaInBytes) {
    error.style.display = "block";
    error.textContent = "You have reached the limit of the free space on your account, please upgrade your account to upload more files";
    error.style.color = "red";
    error.style.fontSize = "20px";
    document.getElementById("button").disabled = true;
    return;
  }
  
  if (fileSize < maxSize && fileSize < quotaInBytes) {
    error.style.display = "none";
    document.getElementById("button").disabled = false;
  }
}

 