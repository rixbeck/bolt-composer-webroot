##Bolt Stack

Bolt stack is a fork of bolt-composer-webroot skeleton for ensuring some
basement of building a stackable aplication on top of Bolt.

###Install Bolt as a Web-Root Composer Package

This skeleton installs the Bolt app outside of the web root, with a public directory to handle
public assets.

To install:

`composer create-project rixbeck/boltstack-webroot mybolt-project`

Create a mapping in your `web/index.php` for app stacking similar like this:

```php
...
  $map = array(
  '/foo' => Stack\lazy(function () {
     $app = new Foo\Application();
     $app->initialize();
     return $app;
  }),
  '/bar' => Stack\lazy(function () {
     $app = new Bar\Application();
     $app->initialize();
     return $app;
  })
 );
 ...
```

Add your dependant modules in `composer.json` require section

```json
"require": {
 ...
    "vendorname/foo": "*",
    "vendorname/bar": "*"
 ...
 ```

Then navigate to `/bolt` and you should see the first user setup screen.

