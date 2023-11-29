# Feature Flags

Gitlab feature flag integration for your Craft Project.

## Compatability
Uses the [Unleash protocol](https://www.getunleash.io/) which is used by:
- [GitLab Feature Flags](https://docs.gitlab.com/ee/operations/feature_flags.html)

## Requirements

This plugin requires Craft CMS 4.5.0 or later, and PHP 8.0.2 or later.

## Installation

You can install this plugin from the Plugin Store or with Composer.

#### From the Plugin Store

Go to the Plugin Store in your project’s Control Panel and search for “feature-flags”. Then press “Install”.

#### With Composer

Open your terminal and run the following commands:

```bash
# go to the project directory
cd /path/to/my-project.test

# tell Composer to load the plugin
composer require tmuehlemann/craft-feature-flags

# tell Craft to install the plugin
./craft plugin/install feature-flags
```

## Configuration
Add a `featureflags.php` file to your `config` directory.

You can copy the configurations values from gitlab directly into here.
```php
<?php

use craft\helpers\App;

return [
    'url' => '',
    'instance_id' => '',
    'app_name' => App::env('CRAFT_ENVIRONMENT'),
];
```