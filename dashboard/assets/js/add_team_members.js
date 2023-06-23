/*function validateForm() {
    const idNumberInput = document.getElementById("id_no").value;
    
    if (idNumberInput.length !== 8 || !/^\d+$/.test(idNumberInput)) {
      alert("Invalid ID number. Please enter an 8-digit number.");
      return false;
    }
    
    return true;
  }
  */

  function validateForm() {
    const fullNameInput = document.getElementById("full_name");
    const fullNameError = document.getElementById("full_name_error");
    const fullNameValue = fullNameInput.value.trim();

    const idInput = document.getElementById("id_no");
    const idError = document.getElementById("id_no_error");
    const idValue = idInput.value.trim();

    
   
  
    let hasErrors = false;
  

    if (fullNameValue === "") {
        fullNameError.innerText = "Please enter player name!";
        fullNameError.style.font = "10px";
        fullNameError.style.color = "red";
        fullNameInput.style.border = "1px solid red";
        fullNameInput.classList.add("error-field");
        hasErrors=true;
      }else{
        fullNameError.innerText = "";  // Clear name error message
        fullNameError.style.color = "";  // Reset name error message color
        fullNameInput.classList.remove("error-field");  // Reset name input field style

      }
    
   /* if (!fullNameValue.match(/^[A-Za-z]+$/)) {
      fullNameError.innerText = "Invalid name. Please enter only alphabetical characters.";
      fullNameError.style.color = "red";
      fullNameInput.classList.add("error-field");
      return false;
    }
    */
  
   
    if (idValue === "") {
      idError.innerText = "ID number cannot be empty.";
      idError.style.color = "red";
      fullNameError.style.font = "8px";
      idInput.style.border = "1px solid red";
      idInput.classList.add("error-field");
      hasErrors=true;
      
    }
    else{
        idError.innerText = "";  // Clear ID number error message
    idError.style.color = "";  // Reset ID number error message color
    idInput.classList.remove("error-field");  // Reset ID number input field style
    }
  
    if (!idValue.match(/^\d{8}$/)) {
      idError.innerText = "Invalid ID number. Please enter an 8-digit number.";
      idError.style.color = "red";
      idInput.style.border = "1px solid red";
      idInput.classList.add("error-field");
      hasErrors=true;
    }else{

  
    idError.innerText = "";  // Clear ID number error message
    idError.style.color = "";  // Reset ID number error message color
    idInput.classList.remove("error-field");  // Reset ID number input field style

    }


    
      if (hasErrors) {
    return false;
  }
  
    return true;
  }

  //id exists error using the link

  function displayError(errorMessage) {
    const errorContainer = document.getElementById("id_no_error");
    errorContainer.innerText = errorMessage;
  }

  function extractErrorMessageFromLink() {
    const urlParams = new URLSearchParams(window.location.search);
    const error = urlParams.get("error");

    if (error === "idexists") {
      const idInput = document.getElementById("id_no");
      idInput.classList.add("error-field");
      displayError("ID already exists.");
    }
  }

  // Call the function to extract and display the error message from the link
  extractErrorMessageFromLink();


//success notification

  function showNotification(message) {
    const notificationContainer = document.getElementById("notificationContainer");
    notificationContainer.innerText = message;
    notificationContainer.style.display = "block";

    setTimeout(function() {
      notificationContainer.style.display = "none";
    }, 30000); // 30 seconds
  }

  // Check if the link reads "success" and display the notification
  const link = window.location.href;
  if (link.includes("success")) {
    showNotification("Player addded successfully");
  }