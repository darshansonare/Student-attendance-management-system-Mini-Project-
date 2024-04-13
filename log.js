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

// Initialize Firebase
firebase.initializeApp(firebaseConfig);
const auth = firebase.auth();

function login(event) {
  event.preventDefault();

  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;
  //const name = document.getElementById("name").value;

  auth.createUserWithEmailAndPassword(email, password)
  .then((userCredential) => {
      const user = userCredential.user;

      // Store user data in Firebase Authentication
      user.updateProfile({
        displayName: name
      })
      .then(() => {
          // Show pop-up message
          alert(`Login successful! Welcome, ${user.displayName}`);

          // Redirect to a blank page <|uniquepadding70|>
         // Show error message
         alert(`login failed: ${errorMessage}`);
       });
   })
  .catch((error) => {
     const errorCode = error.code;
     const errorMessage = error.message;

     // Show error message
     alert(`Sign-up failed: ${errorMessage}`);
   });
}

document.getElementById("login-form").addEventListener("submit", login);

