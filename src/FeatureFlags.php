<?php

namespace tmuehlemann\craftfeatureflags;

use Craft;
use craft\base\Plugin;
use craft\web\twig\variables\CraftVariable;
use tmuehlemann\craftfeatureflags\helpers\Config;
use tmuehlemann\craftfeatureflags\helpers\PluginConfig;
use tmuehlemann\craftfeatureflags\services\FeatureFlagsService;
use tmuehlemann\craftfeatureflags\variables\FeatureFlagsVariable;
use yii\base\Event;

/**
 * feature-flags plugin
 *
 * @method static FeatureFlags getInstance()
 * @property FeatureFlagsService $featureflags
 * @author tmuehlemann <thierry.sh@pm.me>
 * @copyright tmuehlemann
 * @license MIT
 */
class FeatureFlags extends Plugin
{
    public string $schemaVersion = '1.0.0';

    public static function config(): array
    {
        return [
            'components' => [
                'featureflags' => PluginConfig::serviceDefinitionFromConfig('featureflags', FeatureFlagsService::class)
            ],
        ];
    }

    public function getFeatureflags() : FeatureFlagsService {
        return $this->get('featureflags');
    }

    public function init(): void
    {
        parent::init();


        // Defer most setup tasks until Craft is fully initialized
        Craft::$app->onInit(function() {
            $this->attachEventHandlers();
            // ...
        });
    }

        // Register our variable
    private function attachEventHandlers(): void
    {

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('ff', [
                    'class' => FeatureFlagsVariable::class,
                    'featureFlagsService' => $this->featureflags,
                ]);
            }
        );
    }
}
