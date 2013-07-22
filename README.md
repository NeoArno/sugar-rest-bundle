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


##Documentation

Coming soon ... ;-)


