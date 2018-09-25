<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Period
 *
 * @author luis
 */
class Period {

    private $periodid;
    private $period;

    function Period($periodid, $period) {
        $this->periodid = $periodid;
        $this->period = $period;
    }

    function getPeriodid() {
        return $this->periodid;
    }

    function getPeriod() {
        return $this->period;
    }

    function setPeriodid($periodid) {
        $this->periodid = $periodid;
    }

    function setPeriod($period) {
        $this->period = $period;
    }

}
