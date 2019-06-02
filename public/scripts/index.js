const login = () => {
    const mail = document.getElementById("email_usuario").value
    const pass = document.getElementById("senha").value
    
    $.ajax({
        type: "POST",
        url: urls['auth'],
        data: {
            'data': JSON.stringify({"mail": mail, "pass": pass})//mail, 
            //'pass': pass
        },
        success: function(result) {
            console.log(result)
            window.localStorage['jwt'] = result['token']
            window.localStorage['mail'] = result['mail']
            window.location.replace("home.html")
        }
    });
}

document.getElementById("bt_enviar").onclick = () => {
    login()
}

