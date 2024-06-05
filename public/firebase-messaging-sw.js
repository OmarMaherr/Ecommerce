importScripts('https://www.gstatic.com/firebasejs/8.3.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.0/firebase-messaging.js');
	firebase.initializeApp({
        apiKey: "AIzaSyBBqaAH24GZZFtT-2rk1zZ7ssSpSH2JOtY",
        authDomain: "ecommerce-ec2a2.firebaseapp.com",
        projectId: "ecommerce-ec2a2",
        storageBucket: "ecommerce-ec2a2.appspot.com",
        messagingSenderId: "352190467268",
        appId: "1:352190467268:web:fae275e1e0ca205b788d91",
        measurementId: "G-L6C62BKHCZ"
    });

    function requestPermission() {
        console.log('Requesting permission...');
        Notification.requestPermission().then((permission) => {
          if (permission === 'granted') {
            console.log('Notification permission granted.');
          }
        });
      }


const messaging = firebase.messaging();
	messaging.setBackgroundMessageHandler(function(payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload,
    );

    const notificationTitle = "Background Message Title";
    const notificationOptions = {
        body: "Background Message body.",
        icon: "/itwonders-web-logo.png",
    };
    return self.registration.showNotification(
        notificationTitle,
        notificationOptions,
    );


});[]
