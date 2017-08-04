<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tchat avec de vrais waifus</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body class='container'>
    <h1 class='center'> Neko san kawai -- Chat avec de vrais waifus prés de chez toi </h1>
    <div id="msgdisplay">


    </div>
    <div class="fixed-bottom">
        <form action="" method="POST">
            <textarea name="textare" id="textarea" cols="30" rows="10"></textarea>
            <input type="button" id="lancecyrille" class="btn btn-primary">
        </form>
    </div>

    <script>
        let messages = [];

        function display() {
            let div = document.querySelector("#msgdisplay");
            div.innerHTML = "";
            for (let m of messages) {
                let p = document.createElement('p');
                p.textContent = m.timestamp + ' : ' + m.text  ;
                div.appendChild(p);
            }

        }


        document.querySelector("#lancecyrille").addEventListener("click", function(event) {
            event.preventDefault();
            let text = document.querySelector('#textarea').value;
            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'dof.php', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText);
                        messages.push(text);
                        display();
                    } else {
                        console.error('unexpected status code:', this.status);
                    }
                }
            };
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send('textare=' + text);
        });
        
              
            let xhr2 = new XMLHttpRequest();
            xhr2.open('GET', 'display.php', true);
            xhr2.onreadystatechange = function() {
                if (xhr2.readyState === XMLHttpRequest.DONE) {
                    if (xhr2.status === 200) {
                        console.log(xhr2.response);
                        messages = JSON.parse(xhr2.response);
                      ///////////  messages.push(xhr2.response);
                        display();
                    } else {
                        console.error('unexpected status code:', this.status);
                    }
                }
            };
            xhr2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr2.send(null);
        
    </script>



</body>

</html>