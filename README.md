# Projeto Temático em Aplicações Web
Projeto no âmbito do [Módulo Temático em Aplicações Web](https://www.ua.pt/pt/uc/5156) da licenciatura em [Tecnologias da Informação](https://www.ua.pt/pt/curso/63) da [Universidade de Aveiro - Escola Superior de Tecnologia e Gestão de Águeda](https://www.ua.pt/pt/estga).

# Objetivo
Criação de uma plataforma para gestão de clientes de um serviço que disponibiliza botijas de gás em máquinas de vending automático para o consumidor final, isto é, que permitisse que o cliente obtenha uma conta na aplicação e possa enviar pedidos para instalação, manutenção e rescisão de contrato de máquinas, e ainda a consulta das máquinas.

# Tecnologias
- [Microsoft Project](https://www.microsoft.com/pt-pt/microsoft-365/project/project-management-software)
- UML
- [Git](https://git-scm.com/)
- HTML
- CSS
- Javascript
- [jQuery](https://jquery.com/)
- PHP
- [Bootstrap](https://getbootstrap.com/)
- [SweetAlert2](https://sweetalert2.github.io/)
- [PostgreSQL](https://www.postgresql.org/)

# Instalação
1. Criar uma base de dados no PostgreSQL, usando a linha de comandos ou um GUI ([pgAdmin](https://www.pgadmin.org/), [DBeaver](https://dbeaver.io/)...)
2. Alterar o role "[postgres]" do ficheiro de backup [database.sql](database.sql) para o role usado na base de dados criada no ponto anterior
3. Importar o ficheiro de backup da base de dados [database.sql](database.sql) para a base de dados criada no ponto 1.
5. Alterar as credenciais de acesso do ficheiro [config.ini](app/private/config.ini) que faz conexão à base de dados
6. Copiar a aplicação Web para um web server ([XAMPP](https://www.apachefriends.org/index.html), [Laragon](https://laragon.org/)...)
7. Iniciar a aplicação pelo ficheiro [index.html](app/index.php)

# Documentação
- [Relatório](report.pdf)

# Autores
- Daniel Martins
- Ricardo Balreira
