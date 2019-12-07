<?php
namespace App\Form;

use App\Entity;
use App\Settings;
use Azura\Config;
use Doctrine\ORM\EntityManager;

class BackupSettingsForm extends AbstractSettingsForm
{
    public function __construct(
        EntityManager $em,
        Entity\Repository\SettingsRepository $settingsRepo,
        Settings $settings,
        Config $config
    ) {
        $formConfig = $config->get('forms/backup', [
            'settings' => $settings,
        ]);

        parent::__construct(
            $em,
            $settingsRepo,
            $settings,
            $formConfig
        );
    }
}
