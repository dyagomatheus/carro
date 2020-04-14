<html>
    <body>
        <p>Olá {{ $user->name }}!</p>
        <p></p>
        <p>Seja bem-vindo ao Carro Certo App, abaixo estão seus dados de acesso.</p>
        <p><strong>Usuário:</strong> {{ $user->code }}</p>
        <p><strong>Senha: </strong> 123456</p>
<br>
<br>
        <p>Acesse o sistema <a href="http://carrocertoapp.com.br/sistema">Clicando Aqui</a></p>
        <p>Att, <br>
        Equipe Carro Certo App!</p>
    </body>
</html>