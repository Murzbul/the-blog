<# TheBlog
 
 ## Installation
 1. Clone repository
 2. docker-compose up -d
 3. Enter a docker container php `docker exec -it blog_php_1 bash`
 4. Execute this command to install all packages `composer install`
 5. Execute this command `composer build`
 6. Execute this command `php artisan blog:start`
 7. Execute this commands if use public storage:
   - `chown -R www-data:www-data storage/app/public/`
   - `chown -R 777 storage/app/public/`
 
 ## Permissions Problems
 1. Only in a LOCALHOST environment.
 2. Add permissions to read/write on storage/framework and storage/logs
    - chmod -R 777 storage/framework
    - chmod -R 777 storage/logs
 3. Add Permissions inside of container on proxies.
    - chmod -R 777 proxies
    
 ## Enter docker container       
 1. docker exec -it digichange_php_1 bash
   
 ## Minio configuration
 1. ACCESS `http://localhost:9000/minio`,
 2. Login with the credentials on `docker-compose.yml`.
 3. Create a bucket with some name. Add a R/W policy to the bucket.
 4. Set the same bucket name on your env file.
 
 ## Sentry configuration
 1. Configure your .env variables
 2. Enable Sentry on your .env file
 
 ## System Requirements
 * php: 7.3.x
 * php ini configurations:
     * `upload_max_filesize = 100M`
     * `post_max_size = 100M`
     * `memory_limit=1024M`
     * `max_execution_time=600`
     * This numbers are illustrative. Set them according to your project needs.  
 
 * php extensions:
     * bcmath
     * Core
     * ctype
     * curl
     * date
     * dom
     * fileinfo
     * filter
     * ftp
     * gd
     * hash
     * iconv
     * imagick
     * intl
     * json
     * libxml
     * mbstring
     * mcrypt
     * mysqlnd
     * openssl
     * pcntl
     * pcre
     * PDO
     * pdo_pgsql
     * pdo_sqlite
     * Phar
     * posix
     * readline
     * Reflection
     * session
     * SimpleXML
     * soap
     * SPL
     * sqlite3
     * standard
     * tidy
     * tokenizer
     * xdebug
     * xml
     * xmlreader
     * xmlwriter
     * ZendOPcache
     * zip
     * zlib
 * Composer PHP
 * apache: 2.4.x / nginx
 * postgres: 12.1.x
 * postgres extensions:
   * Unaccent Extension
 * redis
 * npm
 * yarn 
 * SO Packages:
     * locales
     * locales-all
 
 ## System Configuration
 
  ## HTTP Codes references
 The next list contains the HTTP codes returned by the API and the meaning in the present context:
 
 * HTTP 200 Ok: the request has been processed successfully.
 * HTTP 201 Created: the resource has been created. It's associated with a POST Request.
 * HTTP 204 No Content: the request has been processed successfully but does not need to return an entity-body.
 * HTTP 400 Bad Request: the request could not been processed by the API. You should review the data sent to.
 * HTTP 401 Unauthorized: When the request was performed to the login endpoint, means that credentials are not matching with any. When the request was performed to another endpoint means that the token it's not valid anymore due TTL expiration.
 * HTTP 403 Forbidden: the credentials provided with the request has not the necessary permission to be processed.
 * HTTP 404 Not Found: the endpoint requested does not exist in the API. 
 * HTTP 422: the payload sent to the API did not pass the validation process.
 * HTTP 500: an unknown error was triggered during the process.
 
 Please refer to https://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html for reference
