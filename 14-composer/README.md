# composer

1. install composer


```bash
vagrant@php-training:~/php-ii-mar-2021/orderapp (main)$ curl -sS https://getcomposer.org/installer -o composer-setup.php
vagrant@php-training:~/php-ii-mar-2021/orderapp (main)$ sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
All settings correct for using Composer
Downloading...

Composer (version 2.0.11) successfully installed to: /usr/local/bin/composer
Use it: php /usr/local/bin/composer

vagrant@php-training:~/php-ii-mar-2021/orderapp (main)$ sudo mv /usr/local/bin/composer /usr/bin/composer
vagrant@php-training:~/php-ii-mar-2021/orderapp (main)$ composer
   ______
  / ____/___  ____ ___  ____  ____  ________  _____
 / /   / __ \/ __ `__ \/ __ \/ __ \/ ___/ _ \/ ___/
/ /___/ /_/ / / / / / / /_/ / /_/ (__  )  __/ /
\____/\____/_/ /_/ /_/ .___/\____/____/\___/_/
                    /_/
Composer version 2.0.11 2021-02-24 14:57:23

Usage:
  command [options] [arguments]

Options:
  -h, --help                     Display this help message
  -q, --quiet                    Do not output any message
  -V, --version                  Display this application version
      --ansi                     Force ANSI output
      --no-ansi                  Disable ANSI output
  -n, --no-interaction           Do not ask any interactive question
      --profile                  Display timing and memory usage information
      --no-plugins               Whether to disable plugins.
  -d, --working-dir=WORKING-DIR  If specified, use the given directory as working directory.
      --no-cache                 Prevent use of the cache
  -v|vv|vvv, --verbose           Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Available commands:
  about                Shows the short information about Composer.
  archive              Creates an archive of this composer package.
  browse               Opens the package's repository URL or homepage in your browser.
  cc                   Clears composer's internal package cache.
  check-platform-reqs  Check that platform requirements are satisfied.
  clear-cache          Clears composer's internal package cache.
  clearcache           Clears composer's internal package cache.
  config               Sets config options.
  create-project       Creates new project from a package into given directory.
  depends              Shows which packages cause the given package to be installed.
  diagnose             Diagnoses the system to identify common errors.
  dump-autoload        Dumps the autoloader.
  dumpautoload         Dumps the autoloader.
  exec                 Executes a vendored binary/script.
  fund                 Discover how to help fund the maintenance of your dependencies.
  global               Allows running commands in the global composer dir ($COMPOSER_HOME).
  help                 Displays help for a command
  home                 Opens the package's repository URL or homepage in your browser.
  i                    Installs the project dependencies from the composer.lock file if present, or falls back on the composer.json.
  info                 Shows information about packages.
  init                 Creates a basic composer.json file in current directory.
  install              Installs the project dependencies from the composer.lock file if present, or falls back on the composer.json.
  licenses             Shows information about licenses of dependencies.
  list                 Lists commands
  outdated             Shows a list of installed packages that have updates available, including their latest version.
  prohibits            Shows which packages prevent the given package from being installed.
  remove               Removes a package from the require or require-dev.
  require              Adds required packages to your composer.json and installs them.
  run                  Runs the scripts defined in composer.json.
  run-script           Runs the scripts defined in composer.json.
  search               Searches for packages.
  self-update          Updates composer.phar to the latest version.
  selfupdate           Updates composer.phar to the latest version.
  show                 Shows information about packages.
  status               Shows a list of locally modified packages.
  suggests             Shows package suggestions.
  u                    Upgrades your dependencies to the latest version according to composer.json, and updates the composer.lock file.
  update               Upgrades your dependencies to the latest version according to composer.json, and updates the composer.lock file.
  upgrade              Upgrades your dependencies to the latest version according to composer.json, and updates the composer.lock file.
  validate             Validates a composer.json and composer.lock.
  why                  Shows which packages cause the given package to be installed.
  why-not              Shows which packages prevent the given package from being installed.

```

2. Added composer.json

```bash
vagrant@php-training:~/php-ii-mar-2021/orderapp (main)$ ls
config  src
vagrant@php-training:~/php-ii-mar-2021/orderapp (main)$ vi composer.json
vagrant@php-training:~/php-ii-mar-2021/orderapp (main)$ cat composer.json 
{
  "name":"order/app",
  "description":"A simple order application",
  "type": "project",
  "keywords": [
    "Order App"
  ],
  "require": {
    "php": ">=7.4",
    "monolog/monolog": "^2.2",
    "guzzlehttp/guzzle": "^7.2"
  },
  "autoload": {
    "psr-4": {
      "OrderApp\\": "src/OrderApp"
    }
  }
}
vagrant@php-training:~/php-ii-mar-2021/orderapp (main)$ ls
composer.json  config  src
vagrant@php-training:~/php-ii-mar-2021/orderapp (main)$
```

3. install dependencies

```bash
vagrant@php-training:~/php-ii-mar-2021/orderapp (main)$ composer install
No lock file found. Updating dependencies instead of installing from lock file. Use composer update over composer install if you do not have a lock file.
Loading composer repositories with package information
Updating dependencies
Lock file operations: 8 installs, 0 updates, 0 removals
  - Locking guzzlehttp/guzzle (7.2.0)
  - Locking guzzlehttp/promises (1.4.1)
  - Locking guzzlehttp/psr7 (1.7.0)
  - Locking monolog/monolog (2.2.0)
  - Locking psr/http-client (1.0.1)
  - Locking psr/http-message (1.0.1)
  - Locking psr/log (1.1.3)
  - Locking ralouphie/getallheaders (3.0.3)
Writing lock file
Installing dependencies from lock file (including require-dev)
Package operations: 8 installs, 0 updates, 0 removals
  - Downloading psr/http-message (1.0.1)
  - Downloading psr/http-client (1.0.1)
  - Downloading ralouphie/getallheaders (3.0.3)
  - Downloading guzzlehttp/psr7 (1.7.0)
  - Downloading guzzlehttp/promises (1.4.1)
  - Downloading guzzlehttp/guzzle (7.2.0)
  - Downloading psr/log (1.1.3)
  - Downloading monolog/monolog (2.2.0)
  - Installing psr/http-message (1.0.1): Extracting archive
  - Installing psr/http-client (1.0.1): Extracting archive
  - Installing ralouphie/getallheaders (3.0.3): Extracting archive
  - Installing guzzlehttp/psr7 (1.7.0): Extracting archive
  - Installing guzzlehttp/promises (1.4.1): Extracting archive
  - Installing guzzlehttp/guzzle (7.2.0): Extracting archive
  - Installing psr/log (1.1.3): Extracting archive
  - Installing monolog/monolog (2.2.0): Extracting archive
12 package suggestions were added by new dependencies, use `composer suggest` to see details.
Generating autoload files
2 packages you are using are looking for funding.
Use the `composer fund` command to find out more!
vagrant@php-training:~/php-ii-mar-2021/orderapp (main)$
```

4. check

```bash
vagrant@php-training:~/php-ii-mar-2021/orderapp (main)$ composer fund
The following packages were found in your dependencies which publish funding information:

guzzlehttp
  guzzle
    https://github.com/sponsors/GrahamCampbell
    https://github.com/sponsors/Nyholm
    https://github.com/sponsors/alexeyshockov
    https://github.com/sponsors/gmponos

monolog
  monolog
    https://github.com/sponsors/Seldaek
    https://tidelift.com/funding/github/packagist/monolog/monolog

Please consider following these links and sponsoring the work of package authors!
Thank you!
```