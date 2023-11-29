<?php
namespace tmuehlemann\craftfeatureflags\services;

use craft\base\Component;
use Unleash\Client\Unleash;
use Unleash\Client\UnleashBuilder;

/**
 * @property Unleash $unleash
 */
class FeatureFlagsService extends Component {

    public string $url;
    public string $instance_id;
    public string $app_name;


    public function getUnleash(): Unleash
    {
         return UnleashBuilder::create()
            ->withAppName($this->app_name)
            ->withAppUrl($this->url)
            ->withInstanceId($this->instance_id)
            ->build();
    }
}