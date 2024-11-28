# WordPress

## About
Used Node version is v22.11.0

### Dev

#### Files organization guide:
https://developer.wordpress.org/themes/basics/organizing-theme-files/#theme-folder-and-file-structure

#### CSS guide:
https://getbem.com/

In the context of WordPress, deviations from the style guide and BEM documentation may occur.

## Installation
```
git clone git@github.com:writingor/writingor-wordpress-theme.git
```
```
npm i
```

### Install docker compose
```
sudo apt update
sudo apt install docker-compose
```

### Add user to Docker Group
```
sudo gpasswd -a $USER docker
newgrp docker
```

## Usage
Before anything, make sure that the Docker port for the project is free.

in `webpack.config.js`:
```
containerUrl: 'http://localhost:8002',
```

in `docker-compose.yml`:
```
ports:
    - '8002:80'
```

### Dev
```
npm run docker:start
npm start
```
```
npm run docker:stop
```

### Prod
```
npm run build
```
