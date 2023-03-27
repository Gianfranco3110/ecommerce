var firebaseConfig = {
    apiKey: "AIzaSyB2OvMYM6PArnwEEvVoFr9WUQMp1NIL8TY",
    authDomain: "test-web-push-6bd0c.firebaseapp.com",
    // databaseURL: 'https://test-web-push-6bd0c-default-rtdb.firebaseio.com/',
    projectId: "test-web-push-6bd0c",
    storageBucket: "test-web-push-6bd0c.appspot.com",
    messagingSenderId: "873557969264",
    appId: "1:873557969264:web:6a789fefda70e88254a7b5",
    measurementId: "G-H3LS7VMM54"
};
console.log("arriba de startfcm");
firebase.initializeApp(firebaseConfig);
const messaging = firebase.messaging();
function startFCM() {
    console.log("dentro de startfcm");
    messaging
        .requestPermission()
        .then(function () {

            return messaging.getToken()
        })
        .then(function (response) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route("store.token") }}',
                type: 'POST',
                data: {
                    token: response
                    
                },
                dataType: 'JSON',
                success: function (response) {
                    alert('Token stored.');
                },
                error: function (error) {
                    alert(error);
                },
            });
        }).catch(function (error) {
            alert(error);
        });
}

messaging.onMessage(function (payload) {
    const title = payload.notification.title;
    const options = {
        body: payload.notification.body,
        link: payload.notification.link,
        // de aqui toma el icon la notificacion
        icon: payload.notification.icon,
    };
    new Notification(title, options);
    // console.log(title);
    console.log(payload);
});

if (confirm("¿quieres recibir notificaciones?")== true) {
    startFCM();
}