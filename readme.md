# Carbon SF2 Bundle

[![Latest Stable Version](https://poser.pugx.org/lightsuner/carbon-bundle/v/stable.png)](https://packagist.org/packages/lightsuner/carbon-bundle)
[![Total Downloads](https://poser.pugx.org/lightsuner/carbon-bundle/downloads.png)](https://packagist.org/packages/lightsuner/carbon-bundle)
[![Build Status](https://travis-ci.org/lightsuner/CarbonBundle.svg?branch=develop)](https://travis-ci.org/lightsuner/CarbonBundle)


[Carbon datetime component](https://github.com/briannesbitt/Carbon)
[Symfony2 convertors](http://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/annotations/converters.html)

This bundle provides an opportunity to convert Request data into Carbon objects.
``` php
/**
 * @Route("/blog/archive/{start}/{end}")
 * @ParamConverter("start", options={"format": "Y-m-d"})
 * @ParamConverter("end", options={"format": "Y-m-d"})
 */
public function archiveAction(\Carbon $start, \Carbon $end)
{
}
````

## Installation

Installation is a quick (I promise!) 7 step process:

1. Download Carbon SF2 Bundle using composer
2. Enable the Bundle

### Step 1: Download Carbon SF2 Bundle using composer

Add Carbon SF2 Bundle in your composer.json:

``` json
{
    "require": {
        "lightsuner/carbon-bundle": "dev-develop"
    }
}
```

Now tell composer to download the bundle by running the command:

``` bash
$ php composer.phar update lightsuner/carbon-bundle
```

Composer will install the bundle to your project's `vendor/lightsuner` directory.

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new LightSuner\CarbonBundle\CarbonBundle(),
    );
}
```