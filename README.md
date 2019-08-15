# Teste-Nofaro
<h4>Versão do PHP: 7.2.1</h4>
<h4>Versão do MySql: 5.6.34</h4>
<h4>Versão do Laravel: 5.5</h4>

Para executar a aplicação em um ambiente local, após realizar Push do GitHub.

>Será necessário criar uma base de dados com o nome de sua escolha.

Após ter a Base de Dados criada, no arquivo <b>.ENV</b>, que se encontra na raiz da aplicação, alterar então as entradas de;

<h5>DB_HOST=IP de seu banco de dados</h5>
<h5>DB_PORT=Porta do seu banco de dados(Grande parte das vezes estão localizados na porta 3306).</h5>
<h5>DB_DATABASE=Nome da sua Base de Dados</h5>
<h5>DB_USERNAME=Seu usuário do Banco de dados</h5>
<h5>DB_PASSWORD=Sua senha do Banco de dados</h5>

Então executar o comando.

<code>PHP Artisan Migrate</code>

Logo após executar o comando 

<code>PHP Artisan serve</code>

Agora basta acessar a aplicação pela Url que foi gerada pelo servidor local.

Acessar a página de cadastro, criar seu usuário então terá acesso ao sistema de pessoas.
