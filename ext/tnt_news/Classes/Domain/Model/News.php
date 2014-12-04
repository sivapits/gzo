<?php

        class Tx_Tntnews_Domain_Model_News extends Tx_News_Domain_Model_News {

                /**
                * @var string
                */
                protected $txTntnewsMorelink;
				
				 
				
                public function getTxTntnewsMorelink() {											
                        return $this->txTntnewsMorelink; 
                }
    
                public function getTntnewsMorelink() {										
                        return $this->txTntnewsMorelink; 
                }
        }

?>