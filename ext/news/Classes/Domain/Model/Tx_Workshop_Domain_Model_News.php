<?php

        class Tx_Workshop_Domain_Model_News extends Tx_News_Domain_Model_News {

                /**
                * @var string
                */
                protected $txWorkshopTitle;

                public function getTxWorkshopTitle() {
                        return $this->txWorkshopTitle;
                }
                public function getWorkshopTitle() {
                        return $this->txWorkshopTitle;
                }
        }

?>