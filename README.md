# Magento 2.0 Sentry Logger

This extension will add the ability to log to [Sentry](https://github.com/getsentry/). Default for the minimal logging level is DEBUG, this is set in the extensions di.xml.

## Installation with composer
* Include the repository: `composer require sebwite/magento2-sentry`
* Enable the extension: `php bin/magento --clear-static-content module:enable Sebwite_Sentry`
* Upgrade db scheme: `php bin/magento setup:upgrade`
* Clear cache

## Installation without composer
* Download zip file of this extension
* Place all the files of the extension in your Magento 2 installation in the folder `app/code/Sebwite/Sentry`
* Enable the extension: `php bin/magento --clear-static-content module:enable Sebwite_Sentry`
* Upgrade db scheme: `php bin/magento setup:upgrade`
* Clear cache

## Configuration
* Add the variable 'raven_dns' to your app/etc/env.php file. Example:

```
'raven_dns' => 'https://****@sentry.domain.com/8',
```

---
[![Alt text](https://www.sebwite.nl/wp-content/themes/sebwite/assets/images/logo-sebwite.png "Sebwite.nl")](https://sebwite.nl)
