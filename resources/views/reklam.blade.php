<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Giriş Reklamı</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            font-family: sans-serif;
        }

        .ekran {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transition: all 1s ease-in-out;
        }

        .reklam {
            background: linear-gradient(135deg, #1976d2, #00acc1);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2rem;
            font-weight: bold;
            z-index: 2;
        }

        .login {
            background: white;
            opacity: 0;
            z-index: 1;
        }

        .aktif {
            opacity: 1;
            z-index: 3;
        }
    </style>
</head>
<body>

<div class="ekran reklam" id="reklam">
          <center><p>FURKAN ESER YAZILIM <br>
             🚘 TAMİRCİ TAKİP SİSTEMİNE HOŞ GELDİNİZ!
         </p> 

         </center>  
    
</div>

<div class="ekran login" id="login">
    <iframe src="{{ route('login') }}" style="width:100%; height:100%; border:none;"></iframe>
</div>

<script>
    // Reklamdan sonra geçiş
    window.onload = function () {
        setTimeout(() => {
            document.getElementById('reklam').style.opacity = 0;
            document.getElementById('reklam').style.zIndex = 1;
            const login = document.getElementById('login');
            login.classList.add('aktif');
        }, 3000); // 3 saniye sonra geç
    };
</script>

</body>
</html>
