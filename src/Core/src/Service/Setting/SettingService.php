<?php

namespace Core\Service\Setting;

use Nette\Utils\Finder;
use SimplyDi\SimplyConfig\Config as SimplyConfig;

class SettingService
{

    private SimplyConfig $config;

    public function __construct()
    {
        // get a list of yaml files in setting folder
        $yamlFiles = Finder::findFiles("*.yaml")->in(CONFIG_PATH . 'settings');

        // turn that Finder instance into an array of file paths
        $settingFilesArr = [];
        foreach ($yamlFiles as $file) {
            $settingFilesArr[] = $file->getPathname();
        }

        // create a new SimplyConfig instance and pass it the array of file paths
        $this->config = new SimplyConfig($settingFilesArr);
    }

    /**
     * get the setting
     */
    public function get(string $key)
    {
        return $this->config->get($key);
    }

}