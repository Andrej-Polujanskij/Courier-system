<?php

$defaultCityies = '<option value="1">Vilnius</option>
<option value="2">Kaunas</option>
<option value="3">Klaipėda</option>
<option value="4">Šiauliai</option>
<option value="5">Panevėžys</option>
<option value="6">Alytus</option>
<option value="7">Marijampolė</option>
<option value="8">Mažeikiai</option>
<option value="9">Jonava</option>
<option value="10">Utena</option>';
function citySelectOptions($id)
{
    global $defaultCityies;
    if ($id != '') {
        switch ($id) {
            case 1:
                return '<option hidden disabled selected value="1">Vilnius</option>' . $defaultCityies;
                break;
            case 2:
                return '<option hidden disabled selected value="2">Kaunas</option>' . $defaultCityies;
                break;
            case 3:
                return '<option hidden disabled selected value="3">Klaipėda</option>' . $defaultCityies;
                break;
            case 4:
                return '<option hidden disabled selected value="4">Šiauliai</option>' . $defaultCityies;
                break;
            case 5:
                return '<option hidden disabled selected value="5">Panevėžys</option>' . $defaultCityies;
                break;
            case 6:
                return '<option hidden disabled selected value="6">Alytus</option>' . $defaultCityies;
                break;
            case 7:
                return '<option hidden disabled selected value="7">Marijampolė</option>' . $defaultCityies;
                break;
            case 8:
                return '<option hidden disabled selected value="8">Mažeikiai</option>' . $defaultCityies;
                break;
            case 9:
                return '<option hidden disabled selected value="9">Jonava</option>' . $defaultCityies;
                break;
            case 10:
                return '<option hidden disabled selected value="10">Utena</option>' . $defaultCityies;
                break;
            default:
            return $defaultCityies;
        }
    } else {
        return $defaultCityies;
    }
}

$defaultWeight = '<option value="1">Iki 10kg</option>
<option value="2">Iki 20kg</option>
<option value="3">Iki 30kg</option>';
function weigtSelectOptions($id)
{
    global $defaultWeight;
    if ($id != '') {
        switch ($id) {
            case 1:
                return '<option hidden disabled selected value="1">Iki 10kg</option>' . $defaultWeight;
                break; 
            case 2:
                return '<option hidden disabled selected value="2">Iki 20kg</option>' . $defaultWeight;
                break;
            case 3:
                return '<option hidden disabled selected value="3">Iki 30kg</option>' . $defaultWeight;
                break;
            default:
                return $defaultWeight;
        }
    } else {
        return $defaultWeight;
    }
}


$defaultSize = '<option value="1">0.5m*0.5m</option>
<option value="2">1m*1m</option>
<option value="3">1.5m*1.5m</option>';
function sizeSelectOptions($id)
{
    global $defaultSize;
    if ($id != '') {
        switch ($id) {
            case 1:
                return '<option hidden disabled selected value="1">0.5m*0.5m</option>' . $defaultSize;
                break;
            case 2:
                return '<option hidden disabled selected value="2">1.0m*1.0m</option>' . $defaultSize;
                break;
            case 3:
                return '<option hidden disabled selected value="3">1.5m*1.5m</option>' . $defaultSize;
                break;
            default:
            return $defaultSize;
        }
    } else {
        return $defaultSize;
    }
}

function getParcelStatus($id) 
{
    if ($id != '') {
        switch ($id) {
            case 1:
                return 'Priimta';
                break;
            case 2:
                return 'Paskirstymo vietoje';
                break;
            case 3:
                return 'Kurjerio vežama';
                break;
            case 4:
                return 'Pristatyta';
                break;
            default:
            return 'Statusas nerastas';
        }
    } else {
        return 'Statusas nerastas';
    }
}


