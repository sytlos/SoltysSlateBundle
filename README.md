SoltysSlateBundle
============

This bundle provides a configurable [Slate](https://github.com/lord/slate) documentation for your REST APIs.

Step 0: Bundle Requirements
---------------------------

Before downloading this bundle, please notice that the KnpMarkdownBundle requires
you to install the [Sundown PHP extension](https://github.com/chobie/php-sundown).

Step 1: Download the Bundle
---------------------------

Add SoltysSlateBundle to your project via Composer:

```console
$ composer require soltys/slate-bundle "~1"
```

Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Knp\Bundle\MarkdownBundle\KnpMarkdownBundle(),
            new Soltys\Bundle\SoltysSlateBundle\SoltysSlateBundle(),
        );

        // ...
    }

    // ...
}
```

Step 3: Configure the Bundle
----------------------------

In your `routing.yml` file add the following lines:

```
# app/config/routing.yml
SoltysSlateBundle:
    resource: "@SoltysSlateBundle/Resources/config/routing.yml"
    prefix:   /api/documentation
```

Then configure the bundle by adding the following in your `config.yml`:
```
# app/config/config.yml
soltys_slate:
    title: ~        # Your documentation title
    navbar_path: ~  # Your navbar image path
    logo_path: ~    # Your logo path
    with_search: ~  # Enable/Disable the search bar
    page_classes: ~ # Add this CSS class to the HTML <body> tag
    language_tabs: ["shell", "ruby"] # List the languages in which you want to write your examples
    includes: ["SoltysSlateBundle:Slate/Includes:_errors.md.twig"] # Additional templates
    toc_footers: ["SoltysSlateBundle:Slate/Footers:_footer.html.twig"] # Footer template
```

Step 4: Usage
-------------

To write your own documentation (unless if you like kittens), create an `index.md.twig` file under 
the `app/Resources/SoltysSlateBundle/views/Slate/MarkDown` directory to override the 
default one.

