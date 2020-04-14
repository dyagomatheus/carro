
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Carro Certo App - Cadastro</title>
<!-- Stylesheets -->
<link href="http://www.carrocertoapp.com.br/css/bootstrap.css" rel="stylesheet">
<link href="http://www.carrocertoapp.com.br/css/owl.css" rel="stylesheet">
<link href="http://www.carrocertoapp.com.br/css/style.css" rel="stylesheet">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="http://www.carrocertoapp.com.br/css/responsive.css" rel="stylesheet">
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>
<div class="page-wrapper">
 	
    <!-- Main Header -->

<header class="main-header">
        <div class="header-top">
        
            <div class="auto-container">
                <div class="row clearfix">
                    <!--Logo-->
                    <div class="col-md-3 col-sm-3 col-xs-12 logo"><a href="http://www.carrocertoapp.com.br/"><img style="margin-top: 5px; margin-bottom: 5px" src="http://www.carrocertoapp.com.br/images/logo.png" alt="Carshire" title="Carro Certo App"></a></div>
                    
                    

                    <div class="col-lg-5 col-md-6 col-sm-10 header-top-infos pull-right">
                        <ul class="clearfix">
                            
                            <li>
                                <div class="clearfix ">
                                    <img src="http://www.carrocertoapp.com.br/images/icons/header-timer.png" alt="">
                                    <p><b>Entre em contato</b> <br><a style="color: #707070" href="http://api.whatsapp.com/send?1=pt_BR&amp;phone=5551999052081">+55 (51) 989 392 306</a><br><a style="color: #707070" href="mailto:sac@carrocertoapp.com.br">sac@carrocertoapp.com.br</a></p>
                                </div>
                            </li>
                            <li>
                                 <div style="margin-top: -10px" class="clearfix ">
                                    <p><b></b></p><br>
                                     <img src="http://www.carrocertoapp.com.br/images/icon1.png" alt="">
                                </div>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </div>
            
        </div>
        
        <!--Header Lower-->
        <div class="header-lower">
            <div class="auto-container">
                <div class="row clearfix">
                    <!--Main Menu-->
                    <nav class="col-md-9 col-sm-12 col-xs-12 main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->      
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        
                        <div class="navbar-collapse collapse clearfix">                                                                                              
                            <ul class="navigation">
                                <li><a href="http://www.carrocertoapp.com.br/index.php">Home</a></li>
                                <li><a href="http://www.carrocertoapp.com.br/sobre.php">Sobre o App</a></li>
                                <li><a href="http://www.carrocertoapp.com.br/vantagens.php">Vantagens</a></li>
                                <li><a href="http://www.carrocertoapp.com.br/faqs.php">Perguntas frequentes</a></li>
                                <li><a href="http://www.carrocertoapp.com.br/download.php">Baixar App</a></li>
                                <li><a href="http://www.carrocertoapp.com.br/contato.php">Contato</a></li>
                            </ul>
                        </div>
                    </nav>
                    <!--Main Menu End-->
                    
                    <!--Social Links-->
                    <div class="col-md-3 col-sm-12 col-xs-12 social-outer">
                        <div class="social-links text-right">
                            <a href="https://www.facebook.com/carrocertoappbr/" target="_blank" class="fa fa-facebook-f"></a>
                            <a href="https://www.instagram.com/carrocertoapp/?hl=pt-br" target="_blank" class="fa fa-instagram"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Page Banner -->
    <section class="page-banner" style="background-image:url(http://www.carrocertoapp.com.br/images/background/page-banner-1.jpg);">
         <div class="auto-container">
            <div class="page-title"><h1>CADASTRE SUA OFICINA</h1></div>
            <div class="bread-crumb text-right">
                <span class="initial-text">você está em: </span>
                <a href="http://www.carrocertoapp.com.br/index.php">Início</a>
                <span class="current">Cadastro</span>
            </div>
        </div>
    </section>
    
    <!-- Sidebar Page -->
    <div class="sidebar-page">
    	<div class="auto-container">
            <div class="row clearfix">
                
                <!-- Left Content -->
                <section class="left-content col-lg-12 col-md-8 col-sm-7 col-xs-12">
                	
                    
                    <!-- Contact Form -->
                    <div class="contact-form">
                			
                        <div class="sec-title"><h3 class="skew-lines">Cadastre sua oficina para seus clientes utilizarem nosso App</h3></div>

                    @if(session('success'))
                        <div class="alert alert-success">
                            <p>{{session('success')}}, <strong>Enviamos seus dados de acesso por e-mail.</strong> </p>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif               

                        <!--Contact Form-->
                        <form id="contact-form" method="post" action="{{route('register.client')}}">
                            @csrf
                            <div class="row clearfix">
                                
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    
                                    <div class="form-group">
                                        <label class="form-label">Razão Social</label>
                                        <input type="text" name="social_name" value="" required="">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Usuário</label>
                                        <input type="text" name="code" value="" required="" placeholder="Seu usuário para usar o sistema">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">E-mail</label>
                                        <input type="text" name="email" value="" required="" placeholder="Informe um email válido">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Rua</label>
                                        <input type="text" name="street" value="" required="">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Bairro</label>
                                        <input type="text" name="district" value="" required="">
                                    </div>
                                    
                                </div>

                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    
                                    
                                    <div class="form-group">
                                        <label class="form-label">Nome Empresarial</label>
                                        <input type="text" name="fantasy_name" value="" required="">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Telefone</label>
                                        <input type="text" name="telephone" value="" placeholder="Telefone com DDD" required="">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Número</label>
                                        <input type="text" name="number" value="" required="">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Cidade</label>
                                        <input type="text" name="city" value="" required="">
                                    </div>
                                    
                                </div>


                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    
                                    <div class="clearfix"></div>
                                    
                                    <div class="form-group">
                                        <label class="form-label">CNPJ</label>
                                        <input type="text" name="cnpj" value="" required="">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">CEP</label>
                                        <input type="text" name="zipcode" value="" required="">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Complemento</label>
                                        <input type="text" name="complement" value="">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Estado</label>
                                        <input type="text" name="state" value="" required="">
                                    </div>
                                    
                                </div>

                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    
                                    <div class="clearfix"></div>
                                    
                                    <div class="form-group">
                                        <label class="form-label">Responsável</label>
                                        <input type="text" name="responsible" value="" placeholder="Digite o nome completo" required="">
                                    </div>
                                    
                                </div>

                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    
                                    <div class="clearfix"></div>
                                    

                                    <div class="form-group">
                                        <label class="form-label">Inscrição Estadual</label>
                                        <input type="text" name="state_registration" value="" placeholder="Digite o número de sua inscrição no SEFAZ" required="">
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                            <div class="form-group text-right">
                                <button type="submit" name="BTEnvia" class="theme-btn dark-btn hvr-bounce-to-right"><span class="fa fa-envelope"></span> Enviar</button>
                            </div>
                            
                        </form>
                            
                	</div>
                    
                
            	</section>
            
            </div>
        </div>
        
    </div>
    
    
    <!--Main Footer-->
<section class="contact-options">
        <div class="clearfix">
            <ul class="info-box clearfix wow bounceInRight">
                <li><a href="http://www.carrocertoapp.com.br/contato.php"><span class="fa fa-phone"></span> Atendimento ao cliente</a> </li>
            </ul>
        </div>
    </section>

<footer class="main-footer">
        <!--Footer Upper-->
        <div class="footer-upper">
            <div class="auto-container">
                <div class="row clearfix">
                    
                    <!--Footer Widget-->
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="footer-widget contact-widget">
                            <h3>Carro Certo App</h3>
                            <div class="text">Tenha mais controle e segurança no histórico de manutenção do seu veículo ou de seus próximos veículos, um App com informações seguras e irreversíveis sobre todas manutenções realizadas.</div>
                            <ul class="info">
                                <li><strong>Email</strong> <a style="color: #eaeaea" href="mailto:contato@carrocertoapp.com.br">contato@carrocertoapp.com.br</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <!--Footer Widget-->
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="footer-widget services-widget">
                            <h3>Mapa do site</h3>
                            <ul class="links">
                                <li><a href="http://www.carrocertoapp.com.br/index.php"><i class="fa fa-check-circle"></i>Página inicial</a></li>
                                <li><a href="http://www.carrocertoapp.com.br/sobre.php"><i class="fa fa-check-circle"></i>Sobre o App</a></li>
                                <li><a href="http://www.carrocertoapp.com.br/vantagens.php"><i class="fa fa-check-circle"></i>Vantagens</a></li>
                                <li><a href="http://www.carrocertoapp.com.br/faqs.php"><i class="fa fa-check-circle"></i>Perguntas frequentes</a></li>
                                <li><a href="http://www.carrocertoapp.com.br/download.php"><i class="fa fa-check-circle"></i>Baixar App</a></li>
                                <li><a href="http://www.carrocertoapp.com.br/contato.php"><i class="fa fa-check-circle"></i>Contato</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    
                    <!--Footer Widget-->
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="footer-widget newsletter-widget">
                            <h3>Contato</h3>

<?php
if (isset($_POST['BTEnvia'])) {
    
    //Variaveis de POST, Alterar somente se necessário 
    //====================================================
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    //====================================================
    
    //REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
    //==================================================== 
    $email_remetente = "contato@carrocertoapp.com.br"; // deve ser uma conta de email do seu dominio 
    //====================================================
    
    //Configurações do email, ajustar conforme necessidade
    //==================================================== 
    $email_destinatario = "sac@carrocertoapp.com.br"; // pode ser qualquer email que receberá as mensagens
    $email_reply = "$email"; 
    $email_assunto = "Newsletter site - Carro Certo App"; // Este será o assunto da mensagem
    //====================================================
    
    //Monta o Corpo da Mensagem
    //====================================================
    $email_conteudo = "Nome = $nome \n"; 
    $email_conteudo .= "Email = $email \n";
    //====================================================
    
    //Seta os Headers (Alterar somente caso necessario) 
    //==================================================== 
    $email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
    //====================================================
    
    //Enviando o email 
    //==================================================== 
    if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){ 
                    echo "</b>E-Mail enviado com sucesso!</b>"; 
                    } 
            else{ 
                    echo "</b>Falha no envio do E-Mail!</b>"; } 
    //====================================================
} 
?>   

                            <form action="<? $PHP_SELF; ?>" method="post" class="clearfix">
                                <p><input type="text" name="nome" placeholder="Nome"></p>
                                <p><input type="email" name="email" placeholder="Email"></p>
                                <p><textarea placeholder="Mensagem"></textarea></p>
                                <p><button class="hvr-bounce-to-right" name="BTEnvia" type="submit">Enviar</button></p>
                            </form>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        
        <!--Footer Bottom-->
        <div class="footer-bottom">
            <div class="auto-container">

                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12 col-xs-12"><div class="copyright">Copryright 2020 by Web Ideal | Todos os direitos reservados</div></div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="social-links">
                            <a href="https://www.facebook.com/carrocertoappbr/" target="_blank" class="fa fa-facebook-f"></a>
                            <a href="https://www.instagram.com/carrocertoapp/?hl=pt-br" target="_blank" class="fa fa-instagram"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </footer>

    <script src="//code.jivosite.com/widget/jWl4HEC7SQ" async></script>
    
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top"></div>


<script src="http://www.carrocertoapp.com.br/js/jquery.js"></script> 
<script src="http://www.carrocertoapp.com.br/js/bootstrap.min.js"></script>
<script src="http://www.carrocertoapp.com.br/js/validate.js"></script>
<script src="http://www.carrocertoapp.com.br/js/wow.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="http://www.carrocertoapp.com.br/js/googlemaps.js"></script>
<script src="http://www.carrocertoapp.com.br/js/script.js"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var $_Tawk_API={},$_Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/569cfc09aeafd72017dd6ea9/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-15521914-3', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>