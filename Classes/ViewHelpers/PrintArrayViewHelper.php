<?php


namespace Itechnology\Detaktawebsite\ViewHelpers;

class PrintArrayViewHelper extends TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper
{

    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('haystack', 'mixed', 'View helper haystack ', TRUE);

    }

    // php in_array viewhelper
    public function render()
    {


        $haystack = $this->arguments['haystack'];



        if (!is_array($haystack)) {
            return "";
        }
        else{
            return implode(",", $haystack);
        }

    }
}
