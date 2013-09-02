sugarRESTBundle
===============

A Symfony2 bundle for the access SugarCRM REST API

##Installation

Add SugarRESTBundle in your composer.json:

```js
{
    "require": {
        "neo-arno/sugar-rest-bundle": "dev-master",
        ...
    }
}
```

Update your application

``` bash
$ php composer.phar update neo-arno/sugar-rest-bundle
```

Now the bundle is installed in your vendor/neo-arno/sugar-rest-bundle directory


Enable the bundle in the AppKernel.php file :

``` php

    $bundles = array(
        // ...
        new NeoArno\sugarRESTBundle\sugarRESTBundle(),
    );

```

This bundle use a rest client bundle : "leaseweb/api-caller-bundle"
And you can use rest API bundle you want ;-) see documentation for more information ...

Now just initialize the REST URL for your SugarCRM instance in Resources/config/services.yml


``` php

    // ...
    rest_url: "http://<your-sugarcrm-instance-url>/service/v4_1/rest.php"
    api_version: "4.1"

```

the api_version parameter isreserved for a futur use

##Documentation

Retrieve documentation on my website :
http://blog.neoarno.com/2013/08/sugarrest-bundle-documentation/


