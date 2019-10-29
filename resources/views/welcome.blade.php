<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>WebSim</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="css/main.css" />
    <noscript>
        <link rel="stylesheet" href="css/noscript.css" /></noscript>
<style>
.adjust {
    max-width: 100%;
    max-height: 100%;
    display: block;
}

</style>
</head>

<body class="is-preload">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- Header -->
        <header id="header" class="alt">
            <span class="logo"><img src="image/logo.png" alt="" /></span>
            <h1><b>WebSim</b></h1>
            <p>A solução perfeita para simulações online <br />
        </header>
        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a href="#intro" class="active">Sobre</a></li>
                <li><a href="#first">Projeto</a></li>
                <li><a href="#second">Parceiros</a></li>
                <li><a href="#access">Acesso</a></li>
                <li><a href="#footer">Contato</a></li>
            </ul>
        </nav>
        <!-- HOME
    <div class="home flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Registro</a>
            @endif
            @endauth
        </div>
        @endif -->

        <!-- Main -->
        <div id="main">

            <!-- Introduction -->
            <section id="intro" class="main">
                <div class="spotlight">
                    <div class="content">
                        <header class="major">
                            <h2>O que é o <b>OCA</b>?</h2>
                        </header>
                        <p>O portal de <b>O</b>timização <b>C</b>ombinatória <b>A</b>plicada tem como objetivo apresentar 
                        ferramentas de otimização para apresentar as empresas possibilidades de minimizar 
                        o desperdício de matéria-prima</p>
                        <ul class="actions">
                            <li><a href="generic.html" class="button">Mais informações</a></li>
                        </ul>
                    </div>
                    <span class="image"><img src="image/oca_logo.png" alt="" /></span>
                </div>
            </section>

           

            <!-- First Section -->
            <section id="first" class="main special">
                <header class="major">
                    <h2>Ipsum consequat</h2>
                    <p>O Projeto Otimização Combinatória Aplicada 
                tem como objetivo a construção de ferramentas para otimização 
                dos processos industriais. </p>
                </header>
                <!-- <ul class="statistics">
                    <li class="style1">
                        <span class="icon solid fa-ruler-combined"></span>
                        <strong>5,120</strong> Etiam
                    </li>
                    <li class="style2">
                        <span class="icon fa-folder-open"></span>
                        <strong>8,192</strong> Magna
                    </li>
                    <li class="style3">
                        <span class="icon solid fa-signal"></span>
                        <strong>2,048</strong> Tempus
                    </li>
                    <li class="style4">
                        <span class="icon solid fa-laptop"></span>
                        <strong>4,096</strong> Aliquam
                    </li>
                    <li class="style5">
                        <span class="icon fa-gem"></span>
                        <strong>1,024</strong> Nullam
                    </li>
                </ul> -->
                <p class="content">Entre os aspectos passíveis de 
                melhoria estão o aproveitamento adequado da matéria prima, 
                utilização racional dos recursos naturais e gerenciamento 
                inteligente da mão de obra. Você pode utilizar as ferramentas 
                disponibilizadas no site sem compromisso ou ônus. E sinta-se 
                convidado a expor seus problemas a equipe de desenvolvimento: 
                como um projeto de extensão, estamos interessados em auxiliar 
                no desenvolvimento da indústria regional.</p>
                <footer class="major">
                    <ul class="actions special">
                        <li><a href="generic.html" class="button">Mais informações</a></li>
                    </ul>
                </footer>
            </section>
 <!-- Second Section -->
 <section id="second" class="main special">
                <header class="major">
                    <h2>Parceiros</h2>
                </header>
                <ul class="features">
                    <li>
                        <span class="image"><img class="adjust" src="image/logo_UFSM.png" alt="" /></span>
                        <h3>Ipsum consequat</h3>
                        <p>Sed lorem amet ipsum dolor et amet nullam consequat a feugiat consequat tempus veroeros sed
                            consequat.</p>
                    </li>
                    <li>
                        <span class="image"><img class="adjust" src="image/logo_CTISM.png" alt="" /></span>
                        <h3>Amed sed feugiat</h3>
                        <p>Sed lorem amet ipsum dolor et amet nullam consequat a feugiat consequat tempus veroeros sed
                            consequat.</p>
                    </li>
                    <li>
                        <span class="image"><img class="adjust" src="image/logo_FAT.png" alt="" /></span>
                        <h3>Dolor nullam</h3>
                        <p>Sed lorem amet ipsum dolor et amet nullam consequat a feugiat consequat tempus veroeros sed
                            consequat.</p>
                    </li>
                </ul>
                <footer class="major">
                    <ul class="actions special">
                        <li><a href="generic.html" class="button">Mais informações</a></li>
                    </ul>
                </footer>
            </section>
            <!-- Get Started -->
            <section id="access" class="main special">
                <header class="major">
                    <h2>Crie ou acesse sua conta</h2>
                </header>
                <footer class="major">
                    <ul class="actions special">
                        <li><a href="home" class="button primary">Acessar</a></li>
                        <li><a href="register" class="button">Registrar</a></li>
                    </ul>
                </footer>
            </section>

        </div>

        <!-- Footer -->
        <footer id="footer">
            <section>
                <h2>Aliquam sed mauris</h2>
                <p>Sed lorem ipsum dolor sit amet et nullam consequat feugiat consequat magna adipiscing tempus etiam
                    dolore veroeros. eget dapibus mauris. Cras aliquet, nisl ut viverra sollicitudin, ligula erat
                    egestas velit, vitae tincidunt odio.</p>
                <ul class="actions">
                    <li><a href="generic.html" class="button">Mais informações</a></li>
                </ul>
            </section>
            <section>
                <h2>Informações</h2>
                <dl class="alt">
                    <dt>Endereço</dt>
                    <dd>Av. Roraima, 1000 - Prédio 5 &bull; Camobi, Santa Maria <br> 
                    Rio Grande do Sul &bull; 97105-900, Brasil</dd>
                    <dt>Telefone</dt>
                    <dd>(55) 3220-9540</dd>
                    <dt>Fax</dt>
                    <dd>(55) 3220-8006</dd>
                    <dt>Email</dt>
                    <dd><a href="#">information@untitled.tld</a></dd>
                </dl>
                <!-- <ul class="icons">
                    <li><a href="#" class="icon brands fa-twitter alt"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon brands fa-facebook-f alt"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon brands fa-instagram alt"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon brands fa-github alt"><span class="label">GitHub</span></a></li>
                    <li><a href="#" class="icon brands fa-dribbble alt"><span class="label">Dribbble</span></a></li>
                </ul> -->
            </section>
            <p class="copyright">&copy; 2019 OCA - Otimização Computacional Aplicada. </p>
            <!-- <p class="copyright">&copy; Design: <a href="https://html5up.net">HTML5 UP</a>.</p> -->
        </footer>

    </div>
    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.scrollex.min.js"></script>
    <script src="js/jquery.scrolly.min.js"></script>
    <script src="js/browser.min.js"></script>
    <script src="js/breakpoints.min.js"></script>
    <script src="js/util.js"></script>
    <script src="js/main.js"></script>
    <!--
        <div>
        Icons made by <a href="https://www.freepik.com/?__hstc=57440181.d13556a53a41a931131ba01ee808620f.1562787601055.1562787601055.1562787601055.1&__hssc=57440181.7.1562787601056&__hsfp=3160667711" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/"
        title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/"
        title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
    -->
</body>

</html>