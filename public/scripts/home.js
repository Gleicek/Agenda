const checkJwt = async () => {
    if(window.localStorage['jwt'] === 'undefined') {
        window.location.replace("index.html")
        return
    } 

    $.ajax({
        type: "POST",
        url: urls['check'],
        data: {
            'data': JSON.stringify({
                        'token':window.localStorage['jwt'],
                        'mail': window.localStorage['mail']
                    }), 
        },
        success: function( result ) {
            if(result['status'] === 0) {
                window.location.replace("index.html")
            }
        }
    });
}

const logoff = () => {
    document.getElementById("bt_logoff").onclick = () => {
        window.localStorage['jwt'] = undefined
        window.localStorage['mail'] = undefined
        window.location.reload()
    }
}

const populateList = () => {
    const mountUl = (data) => {
        
        data.forEach(element => {

            const tr = document.createElement('tr')

            const k = document.createElement('td')
            k.innerText = element.name
            tr.append(k);

            const m = document.createElement('td')
            m.innerText = element.tel
            tr.append(m);

            const n = document.createElement('td')
            n.innerText = element.mail
            tr.append(n);


            document.getElementById('tabela_contatos').append(tr)
        });
        
    }
    $.ajax({
        type: "POST",
        url: urls['contacts'],
        data: {
            'data': JSON.stringify({
                        'token':window.localStorage['jwt'],
                        'mail': window.localStorage['mail']
                    }), 
        },
        success: function( result ) {
            if(result['status'] === 0) {
                window.location.replace("index.html")
            } else {
                mountUl(JSON.parse(result['contatos']))
            }
        }
    });
}

checkJwt()
        .then(logoff)
        .then(populateList)