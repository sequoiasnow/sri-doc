clean:
	rm -rf dist
	rm -rf vendor
	rm -rf node_modules

build: clean
	composer install
	npm install
	gulp
