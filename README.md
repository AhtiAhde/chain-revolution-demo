# chain-revolution-demo
A demo project for MultiChain and Glome proof-of-concept

# Install
```
curl -sS https://getcomposer.org/installer | php
php composer.phar install
cp config/config.json.dist config/config.json
```
Then choose your favorite text editor and fill in the Glome api-uid and api-key, buy them online (https://sites.fastspring.com/glome/instant/api_credentials) or ask for development account (contact@glome.me).

# Test
```
php public/rest/rest.php
```
If there is a mistake in your configuration file, an uncaught GlomeException should be thrown
