<?php
/**
 * Matomo - free/libre analytics platform
 *
 * @link http://matomo.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\IPVersion\Reports;

use Piwik\Piwik;
use Piwik\Plugin\Report;
use Piwik\Plugin\ViewDataTable;
use Piwik\Plugins\IPVersion\Columns\IPVersion;

abstract class Base extends Report
{
    protected function init()
    {
        $this->dimension     = new IPVersion();
        $this->documentation = Piwik::translate('');

        $this->categoryId = 'General_Visitors';
        $this->subcategoryId = 'DevicesDetection_Software';
    }

    /**
     * @param ViewDataTable $view
     */
    public function configureView(ViewDataTable $view)
    {
        if (!empty($this->dimension)) {
            $view->config->addTranslations(array('label' => $this->dimension->getName()));
        }

        $view->config->show_search = false;
        $view->config->columns_to_display = array_merge(array('label'), $this->metrics);
    }
}
