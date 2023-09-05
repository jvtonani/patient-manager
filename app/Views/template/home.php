<div class="alert alert-success" role="alert">
  <h4>Gerenciador de Pacientes (Teste)</h4>
    <p>Aplicativo responsável por fazer o gerenciamento de pacientes. Desenvolvido através do framework MVC CodeIgniter</p>

    <h5>Casos de Uso</h5>
    <ul>
        <li>Login: Feito através da API do Github</li>
        <li>Aba Pacientes: Faz a listagem de pacientes</li>
        <li>Adicionar: Abre formulário para preenchimento de novo paciente</li>
        <li>Editar: Abre formulário para editar informações de paciente</li>
        <li>Excluir: Exclui paciente da lista</li>
    </ul>

    <h5>Principais Dificuldades</h5>
    <ul>
        <li>Durante o processo de desenvolvimento não houveram dificuldades de implementação de features</li>
        <li>Boa parte do tempo do desafio foi gasto na tentativa de dockerizar a aplicação. Diversas abordagem foram testadas mas não houveram sucesso
            <ul>
                <li>Criação de container utilizando a imagem php8.2-apache</li>
                <li>Criação de container utilizando a imagem php8.2-fpm + NGINX</li>
                <li>Criação de container utilizando a imagem do Bitnami para o CodeIgniter</li>
            </ul>
        </li>
        <li>Em todas as abordagens acima, o retorno da aplicação era 403 Forbidden
            <ul>
                <li>Os arquivos de hosts do apache foram revistos, bem como as configurações do nginx</li>
                <li>As devidas permissões as pastas do projeto também foram revisadas</li>
            </ul>
        </li>
        <li>Pelos motivos acima, apesar de não ser a abordagem mais apropriada, foi necessário montar a aplicação através de um ambiente local, sem uso de containers</li>
    </ul>
</body>
</div>