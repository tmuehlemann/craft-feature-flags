<?php
namespace tmuehlemann\craftfeatureflags\variables;

use tmuehlemann\craftfeatureflags\services\FeatureFlagsService;
use yii\di\ServiceLocator;

class FeatureFlagsVariable extends ServiceLocator {

    public FeatureFlagsService $featureFlagsService;

    public function isEnabled(string $featureName) {
            return $this->featureFlagsService->unleash->isEnabled($featureName);
    }
}