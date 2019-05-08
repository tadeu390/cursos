# Cursos

Para a execução dos projetos é necessário que o Docker e o Docker-compose estejam instalados na máquina.

Primeiro, clone o repositório para a sua máquina

```
git clone https://github.com/tadeu390/cursos.git
```
Em seguida entre na pasta cursos que aparecerá e abra o terminal.
Para o primeiro uso será necessário dar permissões de execução para os arquivos contidos na pasta config.

Sendo assim, execute o seguinte comando:
```
sudo chmod 777 -R config/
```
Para a primeira execução precisamos gerar o nosso arquivo de configuração do laradock. Para isso execute o comando abaixo.
```
sudo ./config/init.sh
```
Com isto feito poderemos agora subir todas as imagens necessárias para a execução dos projetos.
Para isso execute o seguinte comando:
```
sudo ./config/run.sh
```
OBS.: Note que ao executar pela primeira vez o comando acima, levará um bom tempo para que o laradock esteja devidamente configurado para que possamos fazer uso das imagens providas por ele.

Ao término da execução do comando acima, o laradock estará pronto para uso e as imagens nginx, mysql e phpmyadmin estarão carregadas, ou seja, teremos um container para cada imagem pronto para uso.

Todos os projetos contidos neste repositório dependem de um virtual host configurado para que possam ser acessados pelo navegador, para que isso seja possível será necessário alterarmos o arquivo de hosts do sistema operacional em uso.
Para isso devemos adicionar as seguintes linhas ao nosso arquivo de hosts. Cada linha se refere a um projeto contido neste repositório.
```
127.0.0.1	curso-repository.tadeu
127.0.0.1	curso-php-composer.tadeu
```
Pronto, agora nossos projetos estão disponveis para serem acessados pelo navegador.

Se quisermos acessar a nossa workspace do container do docker podemos facilmente executar o seguinte comando:
```
sudo ./config/workspace.sh
```
<b>Nota:</b> Ao entrarmos na workspace se dermos o comando <b>ls</b>, o terminal listará pra gente todos os projetos contidos neste repositório, sendo assim, podemos acessar cada projeto através do comando cd e executar la dentro os comandos para configurar cada projeto, por exemplo, podemos acessar um projeto e dar o comando composer install, que instalará todas as dependências do projeto em questão.

Dentro da pasta configs há vários arquivos que podem ser executados, cada um possui uma função específica. Segue abaixo a descrição da funcionalidade de cada um deles.

<b>init.sh -></b> Cria o arquivo de configuração do laradock. Aqui temos as configurações referente aos containeres.<br />
<b>run.sh -></b> Levanta os containeres necessários para aplicação.<br />
<b>workspace.sh -></b> Acessa a workspace do container do docker.<br />
<b>restart.sh -></b> Reinicia todos os containeres do docker.<br />
<b>down.sh -></b> Para e remove todos os containeres do docker.<br />
<b>stop.sh -></b> Apenas para e execução dos containeres do docker.<br />
