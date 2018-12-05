
<html>
    <head>
        <title>SCRUM</title>
        <meta charset="UTF-8">
        <link rel="icon"type="imge/png" href="image/logo.png">
        <link rel="stylesheet" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">﻿
        <script src="j/jquery-3.3.1.js"></script>
        <script src="mostrarocul.js"></script>
    </head>
    <body>
        <div class="contenedor">
            <header>
                <a href="index.php"> <img src="image/logo.png"></a>
                <input type ="checkbox" id="btn-menu">
                <label for="btn-menu"><img src="image/menu.png"alt=""></label>
                <nav>
                    <ul> 
                        <li><a value="" onclick="mq()" href="#">¿Quienes somos? </a></li>
                        <li><a value="" onclick="mc()" href="#">Contactenos</a></li>
                    </ul>
                </nav>
                <div class="usu">
                    <input type="text" name="pass" placeholder="Usuario">
                    <input type="password" name="pass"placeholder="Contraseña">
                </div>
                <div id="botones">
                    <button type ="submit" Value="Ingresar" >Iniciar sesíon</button>       
                </div> 
            </header>

            <!--la caja donde va ir el contenido de ¿quienes somos? y contactenos 
            -->
            <article>
                <div class="fot">
                    <img src="image/logo.png" alt="" />
                </div>
                <div class="quie">
                    <p>jlkjlkjlkjlkjlkjlkjlkjlkjkljkjlkjlkjkj</p>
                </div>
                <div class="cont">
                    <p>cccccccccccccccccccccccccccccccccccccccccccccc</p>
                </div>
            </article>
            <aside>
                <div class="reg">
                    <form>
                        <h1>Crea una cuenta</h1>
                        <input id="caja1"  type="text"name="pass" placeholder="Nombre">
                        <input id="caja2"  type="text"name="pass" placeholder="Apellidos">
                        <input id="caja3"  type="text"name="pass" placeholder="Nombre de usuario">
                        <input id="caja4"  type="password"name="pass" placeholder="Contraseña">
                        <input id="caja5"  type="password"name="pass" placeholder="Confirmar contraseña">
                        </div>
                        <input id="acept" style="margin-right:0%; border-radius:5px;  " type="checkbox" id="cbox2" value="second_checkbox"><label for="cbox2">Acepto</</label>
                        <a href="#openModal">terminos y condiciones </a>
                        <div id="openModal" class="modalDialog">
                            <div>
                                <a href="#close" title="Close" class="close">X</a>
                                <h2>Mi modal</h2>
                                <p>Este es un ejemplo de modal, creado gracias al poder de CSS3.</p>
                                <p>Puedes hacer un montón de cosas aquí, como alertas o incluso crear un formulario de registro aquí mismo.</p>
                            </div>
                        </div>
                        <div id="botones">
                            <button type ="submit" Value="Ingresar" >Registrarse</button>
                    </form>
                </div>
            </aside>
        </div>
    </body>
</html>
