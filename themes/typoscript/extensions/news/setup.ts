plugin.tx_extendpages.persistence.classes.Tx_Extendpages_Domain_Model_Page.mapping.tableName = filereference
plugin.tt_news.usePiBasePagebrowser = 1 

plugin.tx_news {
        view {
                templateRootPaths {
                	0 = EXT:news/Resources/Private/Templates/
                        1 = fileadmin/themes/templates/extensions/news/Private/Templates/
                       
                }
                partialRootPaths {
                	0 = EXT:news/Resources/Private/Partials/
                        1 = fileadmin/themes/templates/extensions/news/Private/Partials/
                     
                }
                layoutRootPaths {
                	0 = EXT:news/Resources/Private/Layouts/
                        1 = fileadmin/themes/templates/extensions/news/Private/Layouts/
                      
                }
        }
}
plugin.tx_news {
        view {
                widget.Tx_News_ViewHelpers_Widget_PaginateViewHelper.templateRootPath = fileadmin/themes/templates/extensions/news/Private/Templates/
        }
}
plugin.tx_news {
        settings {
                link {
                        skipControllerAndAction = 1
                }
                list.paginate.itemsPerPage = 4
                
                detail {
            			# media configuration
            			media {
            				image {
            						# choose the rel tag like gallery[fo]
            					lightbox = lightbox[myImageSet]
            					maxWidth = 330
            					maxHeight =
            				}
            
            				video {
            					width = 282
            					height = 300
            				}
            			}
            		}
              
              facebookLocale = de_DE
                
        }
}
plugin.tx_news.settings.cssFile >

plugin.tx_news._LOCAL_LANG.de{
 related-files = Dateien
 related-links = Links
}

plugin.tx_news.settings.list.media.image.maxWidth = 300
plugin.tx_news.settings.list.media.image.maxHeight = 250

module.tx_news.settings.facebookLocale = de_DE
tt_content.shortcut.20.conf.tx_news_domain_model_news.settings.facebookLocale = de_DE
plugin.tx_news.settings.googlePlusLocale = de
plugin.tx_news.settings.list.paginate.itemsPerPage = 5
plugin.tx_news.settings.list.paginate.prevNextHeaderTags = 0
plugin.tx_news.settings.list.paginate.insertAbove = 0
plugin.tx_news.settings.relatedFiles.download.ATagParams = target = "_blank"