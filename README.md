###Install Bolt as a Web-Root Composer Package

This skeleton installs the Bolt app outside of the web root, with a public directory to handle
public assets.

To install:

`composer create-project rixbeck/boltcomposer-webroot mybolt-project`


Then navigate to `/bolt` and you should see the first user setup screen.

It is a fork of `rossriley/boltcomposer-webroot` with additional packages in composer.json like

- http://github.com/rixbeck/bolt-tasks
