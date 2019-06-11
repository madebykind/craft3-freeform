<?php

namespace Solspace\Freeform\migrations;

use Craft;
use craft\db\Migration;
use Solspace\Freeform\Models\Settings;

/**
 * m190610_074840_MigrateScriptInsertLocation migration.
 */
class m190610_074840_MigrateScriptInsertLocation extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $pluginService = Craft::$app->getPlugins();

        $plugin  = $pluginService->getPlugin('freeform');

        if (!$plugin) {
            return true;
        }

        /** @var Settings $settings */
        $settings = $plugin->getSettings();

        $scriptInsertLocation = 'form';
        if ($settings->footerScripts) {
            $scriptInsertLocation = 'footer';
        }

        $settings->scriptInsertLocation = $scriptInsertLocation;

        $pluginService->savePluginSettings($plugin, ['freeformHoneypotEnhancement' => true]);

        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m190610_074840_MigrateScriptInsertLocation cannot be reverted.\n";
        return false;
    }
}