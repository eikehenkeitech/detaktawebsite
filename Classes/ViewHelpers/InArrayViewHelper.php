<?php


namespace Itechnology\Detaktawebsite\ViewHelpers;

class InArrayViewHelper extends TYPO3Fluid\Fluid\Core\ViewHelper\AbstractConditionViewHelper
{

    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('haystack', 'mixed', 'View helper haystack ', TRUE);
        $this->registerArgument('needle', 'string', 'View helper needle', TRUE);
    }

    // php in_array viewhelper
    public function render()
    {

        $needle = $this->arguments['needle'];
        $haystack = $this->arguments['haystack'];


        if (!is_array($haystack)) {
            return $this->renderElseChild();
        }

        if (in_array($needle, $haystack)) {
            return $this->renderThenChild();
        } else {
            return $this->renderElseChild();
        }
    }
}
