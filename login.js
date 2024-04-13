const firebaseConfig = {
    apiKey: "AIzaSyCx5dUs6Pr2X5h1sfYXzMJ_eHo2zEudcLg",
    authDomain: "attendance-management-sy-3fa44.firebaseapp.com",
    databaseURL: "https://attendance-management-sy-3fa44-default-rtdb.firebaseio.com",
    projectId: "attendance-management-sy-3fa44",
    storageBucket: "attendance-management-sy-3fa44.appspot.com",
    messagingSenderId: "985008312602",
    appId: "1:985008312602:web:cfd537a98ad1c5e40b1ca3",
    measurementId: "G-9BLJD0VEWG"
  };
  
  firebase.initializeApp(firebaseConfig);
  const auth = firebase.auth();
  
  function isValidEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
  }
  
  function signup(event) {
    event.preventDefault();
    const nameInput = document.getElementById("name1").value;
    const emailInput = document.getElementById("email").value;
    const passwordInput = document.getElementById("password").value;
    const dobInput = document.getElementById("dob").value;
  
    if (!isValidEmail(emailInput)) {
      alert('Please enter a valid email address');
      return;
    }
  
    if (!nameInput || !emailInput || !passwordInput || !dobInput) {
      alert('Please fill in all fields');
      return;
    }
  
    auth.createUserWithEmailAndPassword(emailInput, passwordInput)
      .then((userCredential) => {
        const user = userCredential.user;
        user.updateProfile({ displayName: nameInput })
          .then(() => {
            alert(`Sign-up successful! Welcome, ${user.displayName}`);
            // Redirect to a blank page or perform additional actions
          })
          .catch((error) => {
            const errorMessage = error.message;
            alert(`Sign-up failed: ${errorMessage}`);
          });
      })
      .catch((error) => {
        const errorMessage = error.message;
        alert(`Sign-up failed: ${errorMessage}`);
      });
  }
  
  const form = document.getElementById('signup-form');
  form.addEventListener('submit', signup);