by Gaz

## Setup Guide

1. Install Docker if you haven't already.
    * https://www.docker.com/products/docker-desktop


2. Create your env file - copy the example and make any changes you require
    ```bash
    $ cp .env.example .env
    ````

3. Install mkcert (if you haven't installed it) and create personal SSL certificates for your local environment (requires homebrew 🍺, https://brew.sh/), go to open your terminal and navigate to the root folder then:
    ```bash
   # if you haven't install mkcert please run the following syntax
   $ brew install mkcert
   $ brew install nss
   $ mkcert -install
   # skip the above if you already installed mkcert
   <br />

4. Create your .certs directory, and then create a certificate:
   ```bash
    $ mkdir .certs
    $ cd .certs
    $ mkcert www.aichat.local
    $ mkcert portal.aichat.local
    $ cd ..
    ```
4. Build the app image. This command might take a few minutes to complete.
    ```bash
    $ docker-compose build app
    ```
5. When the build is finished, you can run the environment in background mode with:
    ```bash
    $ docker-compose up -d
    ```

[//]: # (6. Now we add the starting point of the database. In docker desktop, navigate to the handover database container and click on the CLI button. Once in, run this command:)

[//]: # (    ```bash)

[//]: # (   $ mysql -u root -p handover_db < /root/handover.sql )

[//]: # (    ```)


7. Next we install with composer and run additional commands Go back to the docker desktop, CLI into the handover-app container:
    ```bash
   $ composer install
   $ php artisan key:generate
   $ php artisan migrate
    ```
8. Add the domain, update your hosts file to point to the new app:
    ```bash
   $ sudo nano /etc/hosts
    ```
   Add in a new line to the bottom of the file such as:
    ```
   127.0.0.1       www.aichat.local
   127.0.0.1       portal.aichat.local
    ```
9. To access the database, I've found a new Mac client called Sequel Ace: https://apps.apple.com/ca/app/sequel-ace/id1518036000?mt=12 <br />
   This seems to work quite happily on the M1 and should be fine on Intel Macs.
   ####Connection details:
   ```
   Host: 0.0.0.0
   Username: aichat_user (default)
   Password: password (whatever you set)
   Database: aichat_db (default)
   Port: 49494 (default for this docker-compose script)
   ```


10. Check your .env file and make sure it is connecting to MySQL instead of SQLite, and also change Session driver to file.
11. Initiate vite watch(depends on your node runtime) in your docker container:
    ```bash
    $ npm run dev
    OR
    $ yarn dev
    OR
    $ bun dev
    ```
