# Docker PHP Tutorial
Aula Irroba dia 10 de setembro


# Instalar NodeJS no linux
curl -sL https://deb.nodesource.com/setup_13.x | sudo bash -
sudo apt-get install -y nodejs

# Download Ngrok
https://ngrok.com/download

# Iniciando o Mock da API

# Instalando lib JSON-Server
sudo npm install -g json-server

# Executando nosso arquivo para disponibilizar API
json-server --watch server.json

# Gerando o tunel da aplicação
Baixar o ngrok e colar o executavel na raiz da aplicação

# Comando para gerar tunel
./ngrok http 3000