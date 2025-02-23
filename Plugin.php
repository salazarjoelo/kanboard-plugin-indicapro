<?php

namespace Kanboard\Plugin\Indicadores;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Security\Role;

class Plugin extends Base
{
    public function initialize()
    {
        $this->applicationAccessMap->add('IndicateursController', '*', Role::APP_USER);

        $this->template->hook->attach('template:project-list:menu:after', 'Indicateurs:menu');
        $this->template->hook->attach('template:dashboard:page-header:menu', 'Indicateurs:menu');

        $this->route->enable();
        $this->route->addRoute('/indicateurs', 'IndicateursController', 'index', 'Indicateurs');

        $this->setContentSecurityPolicy(array('script-src' => "'self' 'unsafe-inline' 'unsafe-eval'"));
    }

    public function getClasses()
    {
        return array();
    }

    public function getPluginName()
    {
        return 'Indicateurs';
    }

    public function getPluginDescription()
    {
        return t("Indicateurs : état d'avancement des projets, nombre de projets par service, vue synthétique des projets");
    }

    public function getPluginAuthor()
    {
        return 'Jade Tavernier, Pascal Rigaux Modificado por Joel Salazar';
    }

    public function getPluginVersion()
    {
        return '1.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/salazarjoelo/kanboard-plugin-indicapro';
    }
}
