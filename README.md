# WP Dingo restaurant

Create a theme wordpress having as subject a restaurant

For this theme, I use the [Dingo](https://colorlib.com/wp/template/dingo/) template available on the [colorlib](https://colorlib.com/) site.



## Requirements

* PHP >= 7.1
* Composer - [Install](https://getcomposer.org/download/)
* Nodejs - [Install](https://nodejs.org/en/download/)
* Yarn - [Install](https://yarnpkg.com/en/docs/install)
* wp-cli (optional) - [install](https://wp-cli.org/#installing)



## In this theme : 

* SASS
* Webpack for managing, compiling and optimizing theme's asset files
* Bedrock. WordPress boilerplate with modern development tools, easier configuration, and an improved folder structure
* symfony/var-dumper & filp/whoops for debug
* timber



## Install all the dependencies :
```sh
$ cd web/app/themes/wpdingorestaurant/
$ yarn install
$ composer install
```



## Generate the assets for static files

Go to resources folder
```sh
$ cd web/app/themes/wpdingorestaurant/
```

Production mode :
```sh
$ yarn run build
```

Production mode with the assets minified :
```sh
$ yarn build:production
```

Dev mode :
```sh
$ yarn run start
```
