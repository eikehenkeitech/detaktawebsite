<?php

namespace Itechnology\Detaktawebsite\View;
class TemplateParser extends \TYPO3\CMS\Fluid\Core\Parser\TemplateParser {
    protected $namespacesBase = array();
    public function initializeObject(){
        $this->namespacesBase = $this->namespaces += [
            'detaktaweb' => 'Itechnology\Detaktawebsite\ViewHelpers'
        ];
    }
    protected function reset()
    {
        $this->namespaces = $this->namespacesBase;
    }
}