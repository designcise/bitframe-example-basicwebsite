# BitFrame Basic Website Example

This example project demonstrates very basic functionality of the BitFrame PHP Microframework to create a simple website.

### Install

#### Prerequisites

* PHP 7.1.0+
* Webserver with URL Rewriting (such as Apache or nginx)

#### Install Via Composer

Simply navigate to the `basic_website` project directory in terminal/command line (to the folder where `composer.json` resides) and run the following command:

```
composer install
```

##### Composer Dependencies

* "[designcise/bitframe](https://github.com/designcise/bitframe/)": "^1.0.0",
* "[designcise/bitframe-whoops](https://github.com/designcise/bitframe-whoops)": "^1.0.0",
* "[designcise/bitframe-diactoros](https://github.com/designcise/bitframe-diactoros)": "^1.0.0",
* "[designcise/bitframe-fastroute](https://github.com/designcise/bitframe-fastroute)": "^1.0.0",
* "[designcise/bitframe-leagueplates](https://github.com/designcise/bitframe-leagueplates)": "^1.0.0"

### Running The Code

Once you've installed the required dependency files, point your browser to the `basic_website` project's url (for example: http://localhost/basic_website/public_html/).

### Important

This is meant to be an example project, so prior to using it in production, make sure the following:

1. You've taken measures to secure your web project however you see fit;
1. You've made necessary changes in env.php file (such as setting `ENV` to `'live'` and `DEBUG_MODE` to `false`);
1. You've edited and customized all template files (if you're using templates);
1. You've added/removed the routes (app/routes/..), dependencies (app/config/dependencies.php) and middlewares (app/config/middleware.php) you'll be using.

### License

Please see [License File](LICENSE.md) for licensing information.

### Useful Links

- [BitFrame PHP Microframework Official](https://www.bitframephp.com)
- [BitFrame PHP Microframework Official Docs](https://www.bitframephp.com/doc)
- [BitFrame PHP Microframework Example Projects](https://www.bitframephp.com/doc/getting-started/example-projects)