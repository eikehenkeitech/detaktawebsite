
plugin.tx_detaktawebsite_articletables {
  view {
    templateRootPaths.0 = EXT:detaktawebsite/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_detaktawebsite_articletables.view.templateRootPath}
    partialRootPaths.0 = EXT:detaktawebsite/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_detaktawebsite_articletables.view.partialRootPath}
    layoutRootPaths.0 = EXT:detaktawebsite/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_detaktawebsite_articletables.view.layoutRootPath}
  }
  persistence {
    storagePid = 0,3,4
    #storagePid = 2
    #recursive = 1
    classes {
      Itechnology\Detaktawebsite\Domain\Model\Category {
        newRecordStoragePid = 3
      }
      Itechnology\Detaktawebsite\Domain\Model\Article {
        newRecordStoragePid = 4
      }


    }
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
}

plugin.tx_detaktawebsite._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-detaktawebsite table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-detaktawebsite table th {
        font-weight:bold;
    }

    .tx-detaktawebsite table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)
