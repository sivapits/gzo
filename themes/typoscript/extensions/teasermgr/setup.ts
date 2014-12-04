lib.teasermgr = USER_INT
lib.teasermgr {
        userFunc = TYPO3\CMS\Extbase\Core\Bootstrap->run
        pluginName = Tntteasermanager
        extensionName = TntTeaserManager
        controller = TntTeaserManger
        vendorName = TYPO3
        action = list
                
        settings {
        feed{
             recordPid = 550
                    }
                }
            
           }


lib.tabteaser = USER_INT
lib.tabteaser {
        userFunc = TYPO3\CMS\Extbase\Core\Bootstrap->run
        pluginName = Tntteasermanager
        extensionName = TntTeaserManager
        controller = TntTeaserManger
        vendorName = TYPO3
        action = tabs
        switchableControllerActions {
                TntTeaserManger {
                        1 = tabs
                }
        }

}