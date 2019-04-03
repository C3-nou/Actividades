<?php 

include_once("../controlador/controladorPrincipal.php");
include_once("../controlador/session.php");
//session_start();

if (isset($_SESSION['username'])) {
	header('Location:index2.php');
	exit();
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>SENA SCRUM</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/plantilla1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    <script src="../controlador/jquery-3.3.1.js"></script>
    <script src="../controlador/mostrarocul.js"></script>
</head>

<body>

    <div class="contenedor">



        <header>
            <a href="index.php"><img class="logo" src="../img/logo.png"></a>
            <nav>
                <ul>
                    <li><a value="" onclick="mq()" href="#">¿Quienes somos? </a></li>
                    <li><a value="" onclick="mc()" href="#">Contactenos</a></li>
                </ul>
            </nav>
            <div class="usu">
                <form action="" method="POST">
                    <input type="text" name="username" required="" placeholder="Usuario">
                    <input type="password" name="password" required="" placeholder="Contraseña">
                    <input type="submit" name="inicio" value="Ingresar">
                </form>
            </div>
        </header>

        <article>
            <div class="fot">
                <img src="../img/logo.png" alt="" />
            </div>
            <div class="quie">
                <h1> QUIENES SOMOS</h1>
                <p>
                    Sena Scrum es un software en el cual podemos aplicar un proceso en el que se aplican de
                    manera regular un conjunto de buenas prácticas para trabajar colaborativamente, en
                    equipo, y obtener el mejor resultado posible de un proyecto. Estas prácticas se apoyan unas
                    a otras y su selección tiene origen en un estudio de la manera de trabajar de equipos
                    altamente productivos.
                    En este software se realizan entregas parciales y regulares del producto final, priorizadas
                    por el beneficio que aportan al receptor del proyecto. Por ello, Sena Scrum está
                    especialmente indicado para proyectos en cualquier entorno, donde se necesita obtener
                    resultados pronto, donde los requisitos son cambiantes o poco definidos, donde la
                    innovación, la competitividad, la flexibilidad y la productividad son fundamentales.
                    También se utiliza para resolver situaciones en que no se está entregando al cliente lo que
                    necesita, cuando las entregas se alargan demasiado, los costes se disparan o la calidad no
                    es aceptable, cuando se necesita capacidad de reacción ante la competencia, cuando la
                    moral de los equipos es baja y la rotación alta, cuando es necesario identificar y solucionar

                    ineficiencias sistemáticamente o cuando se quiere trabajar utilizando un proceso
                    especializado en el desarrollo de producto.
                </p>
            </div>
            <div class="cont">
                <h1>CONTACTENOS</h1>
                <p>
                    Utiliza el siguiente email para contactarte con nosotros:
                </p> <br>
                <h2> senascrum@gmail.com. </h2><br>
                <p>
                    Recuerda dejarnos tus datos completos y especifícanos tu problema para darle solución lo
                    más pronto posible.
                    Es importante que sepas nuestro horario de atención en soporte:
                </p><br>
                <h2>Lunes a Viernes desde las 8Am hasta las 6pm</h2><br>
                <p>
                    Sábados, Domingos y festivos no estaremos prestando nuestro servicio de soporte.
                    Contamos con el mejor equipo de soporte para nuestro software, por eso, déjanos cualquier
                    inquietud y te estaremos ayudando.</p>
            </div>
        </article>


        <aside>
            <div class="reg">
                <form  action="" method="POST">
                    <h1>Crea una cuenta</h1>
                    <input id="caja1" type="text" id="nombres" name="nombre" placeholder="Nombre" required>
                    <input id="caja2" type="text" id="apellidos" name="apellido" placeholder="Apellido" required />
                    <input id="caja3" type="text" id="usuarios" name="usuario" placeholder="Nombre de usuario" required />
                    <input id="caja4" type="password" id="password" name="contrasena" placeholder="Contraseña" required />
                    <input id="caja5" type="password" name="pass" placeholder="Confirmar contraseña">
                    <input id="caja5" type="email" id="correos" name="correo" placeholder="Correo" required />
            </div>
            <input id="acept" style="margin-right:0%; border-radius:5px;  " type="checkbox" id="cbox2" value="second_checkbox"><label for="cbox2">Acepto</</label> <a href="#openModal">terminos y condiciones </a>
                <div id="openModal" class="modalDialog">
                    <div>
                        <a href="#close" title="Close" class="close">X</a>
                        <h2>TERMINOS Y CONDICIONES POLÍTICAS DE PRIVACIDAD</h2>
                        <p>

                            INTRODUCCIÓN:<br>
                            <p>
                                Esta Política de privacidad cubre cómo SENA SCRUM recopila y utiliza información
                                relacionada con los visitantes de nuestro sitio web y los usuarios de nuestro servicio de
                                software.
                                Dependiendo de su relación con SENA SCRUM, esta información puede incluir información
                                de uso, información de registro, e información de contacto. Puede comprender que solo
                                recopilaremos la información que ingrese a nuestro sistema.
                                Cuando nos referimos a &quot;nosotros&quot; y &quot;nos&quot;, nos referimos a SENA SCRUM, que controla la
                                información recopilada cuando utiliza nuestros servicios de software (también denominada
                                &quot;servicio&quot;, &quot;producto&quot; o &quot;plataforma&quot; en este documento).
                                Tenga en cuenta que nunca compartimos la información que proporciona con terceros, a
                                excepción de los socios seleccionados que se utilizan con el fin de proporcionarle una
                                experiencia estable y agradable al usar Sena Scrum.
                                Siempre mantienes el control de tus datos. Puede editar o borrar sus datos de nuestros
                                servicios en cualquier momento o solicitarnos que actualicemos o borremos la información
                                que almacenamos, siempre que este borrado no entre en conflicto con cualquier obligación
                                legal que podamos tener con los reguladores nacionales e internacionales.
                                Al proporcionarnos sus datos, nos garantiza que es aprendiz o funcionario SENA. Si este no
                                es el caso, debe comunicarse con nosotros de inmediato para eliminar cualquier
                                información de identificación personal de nuestros registros.
                                Dependiendo de su relación con Sena Scrum, recopilaremos diferentes tipos de
                                información, como se describe a continuación.
                                Información de Uso:
                                Debido a que la plataforma Sena Scrum proporciona a las organizaciones un sistema y una
                                herramienta para la colaboración y la administración del flujo de trabajo, si elimina su
                                cuenta, cierta información de la cuenta permanecerá en nuestra base de datos, ya que es
                                relevante para mantener un registro de la actividad laboral en la que participó.
                                Información de Registro:
                                ¿Qué es?
                                Los datos de registro contienen sus datos personales, los cuales usted nos genera en los
                                usos que le da a nuestra plataforma. Los servidores web generalmente mantienen archivos
                                de registro que registran datos cada vez que un dispositivo accede a esos servidores.
                                ¿Cómo lo usamos?
                                Los datos de registro se utilizan para analizar el uso de la plataforma, mejorar el rendimiento
                                y eliminar cualquier error. Principalmente observamos esta información en forma agregada,
                                pero podemos revisar registros individuales cuando buscamos la causa de un problema
                                específico. Esto puede suceder ya sea por nuestra propia iniciativa o en relación con una
                                solicitud que inicie sesión con nuestro equipo de éxito de clientes.

                                Nuestro equipo de ingeniería tiene acceso a los registros de la plataforma completa.
                                Retención de datos
                                Los datos de registro almacenados en nuestra plataforma se guardan por un período de
                                tiempo indefinido para ayudarnos a revisar la posible recurrencia de errores y problemas de
                                los usuarios, y para controlar cualquier intento de acceso no autorizado a nuestros servicios.
                                Cuando crea una cuenta en la plataforma Sena Scrum, se registra con su nombre, nombre
                                de usuario, dirección de correo electrónico y una contraseña que elija. Estos se almacenan
                                en nuestra base de datos.
                                La información de su cuenta se mantiene durante el tiempo de vida de su cuenta para
                                identificarlo al iniciar sesión en la plataforma. Si elimina su cuenta, conservamos su
                                dirección de correo electrónico y avator para mantener la continuidad en el historial de
                                colaboración y flujo de trabajo en el que participó.
                                ¿Cómo lo usamos?
                                La información de la cuenta se utiliza para crear su cuenta de Scrum e identificarlo al iniciar
                                sesión en nuestra plataforma para proporcionar el contenido de su cuenta.
                                Información del contacto:
                                ¿Qué es?
                                Si nos contacta con una pregunta, a través de cualquiera de nuestros canales de
                                comunicación, como nuestro correo electrónico, recibiremos y almacenaremos sus datos
                                de contacto, como correo electrónico, nombre y datos que nos proporcione.
                                En el caso de consultas de soporte, es posible que necesitemos información adicional para
                                ayudarlo con su solicitud, esto dependerá de la naturaleza de su consulta y del problema en
                                cuestión. Nuestro objetivo será solicitar la información adicional mínima necesaria para
                                resolver su solicitud.
                                ¿Cómo lo usamos?
                                Usamos su información de contacto para comunicarnos con respecto a su consulta, en
                                cualquiera de los casos.
                                Retención de datos
                                Todo el historial de comunicaciones a través de nuestros canales de comunicación oficiales
                                entre usted y nuestro equipo se mantiene almacenado para futuras referencias, incluso si se
                                elimina su cuenta. Esto se hace para poder responder a quejas o cualquier pregunta futura
                                que usted u otros puedan tener.
                                No recopilamos información, a sabiendas, datos confidenciales sobre los visitantes de
                                nuestro sitio web o los usuarios de nuestra plataforma. Los datos confidenciales se refieren
                                a datos que incluyen detalles sobre su raza o etnia, creencias religiosas o filosóficas, vida
                                sexual, orientación sexual, opiniones políticas, afiliación sindical, información sobre su salud

                                y datos genéticos y biométricos. No recopilamos ninguna información sobre condenas y
                                delitos penales
                                ¿Puede esta política de privacidad cambiar?
                                Podemos actualizar nuestra Política de Privacidad de vez en cuando. Siempre que
                                cambiemos la política de una manera material, notificaremos a los usuarios por correo
                                electrónico y / o a través de la Plataforma, y ​​publicaremos la política de privacidad
                                actualizada en nuestro sitio web.

                                Términos de la cuenta:
                                1. Debe ser aprendiz o funcionario SENA para utilizar el Servicio.
                                2. Las cuentas creadas por métodos automatizados (&quot;bots&quot;) no están permitidas y
                                serán eliminadas.
                                3. Debe proporcionar su nombre legal completo, una dirección de correo
                                electrónico válida y cualquier otra información solicitada por Sena Scrum en
                                relación a su cuenta.
                                4. Usted es responsable de mantener la seguridad de su cuenta y los detalles de
                                inicio de sesión. Nunca debe revelar su contraseña a nadie.
                                5. Usted es responsable de todo el contenido publicado con el uso de su cuenta.
                                6. No debe crear más de una cuenta.
                                7. A menos que usted se oponga a esto y nos informe efectivamente, usted acepta
                                que Sena Scrum, a su entera discreción, pueda utilizar su información para uso
                                exclusivo en nuestra plataforma.

                                Nivel de servicio, disponibilidad y soporte
                                1. Es posible que estemos realizando actualizaciones periódicas del Servicio sin
                                previo aviso.
                                2. De ninguna manera, Sena Scrum debe ser responsable de cualquier
                                interrupción del servicio, problemas de acceso o pérdida de datos.
                                3. En caso de corte del servicio, Sena scrum Tratará de restaurarlo en el menor
                                tiempo posible.

                                Modificaciones al Servicio.

                                1. Sena Scrum se reserva el derecho en cualquier momento de modificar o
                                interrumpir, temporal o permanentemente, el Servicio (o cualquier parte del
                                mismo) con o sin previo aviso.
                                2. Sena Scrum no será responsable ante usted ni ante un tercero por cualquier
                                modificación, suspensión o interrupción del Servicio.

                                Derechos de autor y propiedad de contenido
                                1. Todo el contenido publicado en el Servicio debe cumplir con la ley de derechos
                                de autor.
                                2. Todos los materiales que proporcione al Servicio siguen siendo suyos.
                                3. Sena Scrum no preselecciona el Contenido, pero se reserva el derecho (pero
                                no la obligación) a su entera discreción de rechazar o eliminar cualquier
                                Contenido que esté disponible a través del Servicio.
                                4. Todos los derechos reservados. No puede duplicar, copiar ni reutilizar ninguna
                                parte del diseño, HTML / CSS, Javascript o cualquier otro código creado por
                                Sena Scrum sin permiso expreso por escrito de Sena Scrum.

                                Otras condiciones
                                1. No debe transmitir ningún gusano, virus o cualquier otro código de naturaleza
                                destructiva.
                                2. No debe realizar ingeniería inversa ni acceder al Servicio para (i) crear un
                                producto o servicio competitivo, (ii) construir un producto utilizando ideas,
                                características o funciones similares del Servicio, o (iii) copiar ideas,
                                características o funciones del servicio.
                                3. Este Acuerdo solo confiere el derecho de uso del Servicio y no transmite ningún
                                derecho de propiedad sobre o al Servicio.
                                4. El hecho de que cualquiera de las partes en este caso no procese sus derechos
                                con respecto a una violación de este documento no constituirá una renuncia al
                                derecho de hacer valer sus derechos con respecto a la misma o a cualquier otra
                                violación.
                                5. Cualquier reclamo relacionado con Sena Scrum, el presente Acuerdo o el
                                Servicio se regirán por la ley.

                                Las partes se someten de manera irrevocable e incondicional a la jurisdicción y
                                sede exclusiva de los tribunales de la República de Colombia.
                                6. Las traducciones de estos Términos de servicio a otros idiomas además del
                                español, cuando estén disponibles, se proporcionan solo para su comodidad.
                                En caso de discrepancias entre la versión en español de estos Términos de
                                servicio y una versión en otro idioma, prevalecerá la versión en español.
                                7. Cualquier pregunta sobre los Términos de servicio actuales debe dirigirse a
                                senascrum@gmail.com.</p>
                    </div>
				</div>
				<br>
                <input id="boton" type="submit" name="registro" value="Registrar" />
                </form>

        </aside>


        <div id="mensaje"></div>
    </div>

    <!--<script type="text/javascript" src="validacionFrontend.js"></script>-->
</body>

</html> 