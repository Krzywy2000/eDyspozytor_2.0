<?php

    //Date functions

    function lastDate() {
        $day = date("d");
        $mounth = date("F");
        $year = date("Y");
        $hour = date("H");
        $minutes = date("i");
        $seconds = date("s");

        if($mounth == "January")
        {
            $mounth = "Stycznia";
        }
        if($mounth == "February")
        {
            $mounth ="Lutego";
        }
        if($mounth == "March")
        {
            $mounth = "Marca";
        }
        if($mounth == "April")
        {
            $mounth = "Kwietnia";
        }
        if($mounth == "May")
        {
            $mounth = "Maja";
        }
        if($mounth == "June")
        {
            $mounth = "Czerwca";
        }
        if($mounth == "July")
        {
            $mounth = "Lipca";
        }
        if($mounth == "August")
        {
            $mounth = "Sierpnia";
        }
        if($mounth == "September")
        {
            $mounth = "Września";
        }
        if($mounth == "October")
        {
            $mounth = "Października";
        }
        if($mounth == "November")
        {
            $mounth = "Listopada";
        }
        if($mounth == "December")
        {
            $mounth = "Grudnia";
        }

        echo $day." ".$mounth." ".$year." ".$hour.":".$minutes.":".$seconds;

    }

    //Version

    function version(){
        echo "2.0.0";
    }
