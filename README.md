# Gerenciador de Pacientes (Teste)
Aplicativo responsável por fazer o gerenciamento de pacientes. Desenvolvido através do framework MVC CodeIgniter

Casos de uso
  * Login: Feito através da API do Github
  * Aba Pacientes: Faz a listagem de pacientes
  * Adicionar: Abre formulário para preenchimento de novo paciente
  * Editar: Abre formulário para editar informações de paciente
  * Excluir: Exclui paciente da lista
  ![image](https://github.com/jvtonani/patient-manager/assets/34126847/e2bfd88a-f376-4fc4-b584-34fbd0c4e9d2)

## Principais Dificuldades
* Durante o processo de desenvolvimento não houveram dificuldades de implementação de features
* Boa parte do tempo do desafio foi gasto na tentativa de dockerizar a aplicação. Diversas abordagem foram testadas mas não houveram sucesso
  * Criação de container utilizando a imagem php8.2-apache
  * Criação de container utilizando a imagem php8.2-fpm + NGINX
  * Criação de container utilizando a imagem do Bitnami para o CodeIgniter
 * Em todas as abordagens acima, o retorno da aplicação era 403 Forbidden
   * Os arquivos de hosts do apache foram revistos, bem como as configurações do nginx
   * As devidas permissões as pastas do projeto também foram revisadas
 * Pelos motivos acima, apesar de não ser a abordagem mais apropriada, foi necessário montar a aplicação através de um ambiente local, sem uso de containers
## Instalação
### Pré Requisitos
* PHP 8.2
* Composer
* Docker e docker-compose
* Git
* Clone da aplicação
~~~
https://github.com/jvtonani/patient-manager.git
~~~

### Banco de dados
* No diretório raiz, execute o comando. 
  ~~~
  docker-compose up -d
  ~~~
* O banco de dados pode ser acessado através das credenciais
  ~~~
    Host: localhost
    Port: 5432
    Database: postgres
    User: postgres
    Password:teste_tecnico
  ~~~
### Ambiente Local
  * Faça a configuração do arquivo php.ini
 ~~~
  extension=curl
  extension=intl
  extension=pgsql
  extension=mbstring
  extension=exif
  extension=mysqli
  curl.cainfo=CAMINHO_PARA_CACERT.PEM (Localizado no diretório raiz do projeto)
  ~~~
  * Instale as dependências
  ~~~
  composer update
  ~~~
  * Renomeie o arquivo env para .env adicionando as variáveis necessárias
  * Rode as migrations e inicie a aplicação
  ~~~
  php spark migrate
  php spark serve
  ~~~
  * A aplicação pode ser acessada através do seu ambiente local http://localhost:8080
