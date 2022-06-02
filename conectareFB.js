 // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.1/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.8.1/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyDxdcAlYxlFp1LRcVVNESIDJLogyczbg6E",
    authDomain: "wearycare.firebaseapp.com",
    databaseURL: "https://wearycare-default-rtdb.firebaseio.com",
    projectId: "wearycare",
    storageBucket: "wearycare.appspot.com",
    messagingSenderId: "652312071535",
    appId: "1:652312071535:web:7f5bb686c64339c2eeec9a",
    measurementId: "G-SFHZ4H6736"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
  
  import{
	  getFirestore, doc, getDoc, setDoc, collection, addDoc, updateDoc, deleteDoc, deleteField
  }
  from  "https://www.gstatic.com/firebasejs/9.8.1/firebase-firestore.js";
  
  const db= getFirestore();