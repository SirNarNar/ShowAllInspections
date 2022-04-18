<?php
echo "<link rel=\"stylesheet\" href=\"style.css\">";
// changing the timezone to ours
date_default_timezone_set('America/Toronto');
// pulling the data from the index.html form into variables
$sDate = new DateTime($_GET['date']);
$eDate = clone($sDate);

// creating inspection class that will organize and hold the data we will pull from the API
class Inspection
{
    // creating variables for each piece of info we're going to pull
    private $vehicle;
    private $division;
    private $driver;
    private $type;
    private $time;
    private $airBrake;
    private $cab;
    private $cargo;
    private $coupling;
    private $dangerous;
    private $seat;
    private $controls;
    private $ebs;
    private $emergen;
    private $exhaust;
    private $frame;
    private $fuel;
    private $general;
    private $glass;
    private $heater;
    private $horn;
    private $hydraulic;
    private $lamps;
    private $steering;
    private $suspension;
    private $tires;
    private $wheels;
    private $wipers;
    private $plate;
    private $juri;
    private $loc;
    private $defect;
    private $oReg;

    #region getter and settters
    public function setVehicle ($vehicle)
    {$this->vehicle = $vehicle;}
    public function getVehicle()
    {return $this->vehicle;}

    public function setDivision ($division)
    {$this->division = $division;}
    public function getDivision()
    {
        switch ($this->division) 
            {
                case -762496764: 
                    return "Front End";
                    break;
                case -488398130:
                    return "Roll Off";
                    break;
                case 1168592360:
                    return "Walking Floor";
                    break;
                case 102226412:
                    return "Tractor";
                    break;
                case 827746938:
                    return "Rear Packer";
                    break;
                case -711615004:
                    return "Rear Packer";
                    break;
                default:
                    return "Peter Wyroba";
                    break;
            }
    }

    public function setDriver ($driver)
    {$this->driver = $driver;}
    public function getDriver()
    {return $this->driver;}

    public function setType ($type)
    {$this->type = $type;}
    public function getType()
    {return $this->type;}

    public function setTime ($time)
    {$this->time = $time;}
    public function getTime()
    {return $this->time;}
    
    public function setAirBrake ($airBrake)
    {$this->airBrake = $airBrake;}
    public function getAirBrake ()
    {
        if ($this->airBrake == "Undefined")
        return "N/A";
        return $this->airBrake;
    }

    public function setCab ($cab)
    {$this->cab = $cab;}
    public function getCab ()
    {
        if ($this->cab == "Undefined")
        return "N/A";
        return $this->cab;
    }

    public function setCargo ($cargo)
    {$this->cargo = $cargo;}
    public function getCargo ()
    {
        if ($this->cargo == "Undefined")
        return "N/A";
        return $this->cargo;
    }

    public function setCoupling ($coupling)
    {$this->coupling = $coupling;}
    public function getCoupling ()
    {
        if ($this->coupling == "Undefined")
        return "N/A";
        return $this->coupling;
    }

    public function setDangerous ($dangerous)
    {$this->dangerous = $dangerous;}
    public function getDangerous ()
    {
        if ($this->dangerous == "Undefined")
        {
            return "N/A";
        }
        return $this->dangerous;
    }

    public function setControls ($controls)
    {$this->controls = $controls;}
    public function getControls ()
    {
        if($this->controls == "Undefined")
        {
            return "N/A";
        }
        return $this->controls;
    }

    public function setSeat ($seat)
    {$this->seat = $seat;}
    public function getSeat ()
    {
        if ($this->seat == "Undefined")
        return "N/A";
        return $this->seat;
    }

    public function setEbs ($ebs)
    {$this->ebs = $ebs;}
    public function getEbs ()
    {
        if ($this->ebs == "Undefined")
        return "N/A";
        return $this->ebs;
    }

    public function setEmergen ($emergen)
    {$this->emergen = $emergen;}
    public function getEmergen ()
    {
        if ($this->emergen == "Undefined")
        return "N/A";
        return $this->emergen;
    }

    public function setExhaust ($exhaust)
    {$this->exhaust = $exhaust;}
    public function getExhaust ()
    {
        if ($this->exhaust == "Undefined")
        return "N/A";
        return $this->exhaust;
    }

    public function setFrame ($frame)
    {$this->frame = $frame;}
    public function getFrame ()
    {
        if ($this->frame == "Undefined")
        return "N/A";
        return $this->frame;
    }

    public function setFuel ($fuel)
    {$this->fuel = $fuel;}
    public function getFuel ()
    {
        if ($this->fuel == "Undefined")
        return "N/A";
        return $this->fuel;
    }

    public function setGeneral ($general)
    {$this->general = $general;}
    public function getGeneral ()
    {
        if ($this->general == "Undefined")
        return "N/A";
        return $this->general;
    }

    public function setGlass ($glass)
    {$this->glass = $glass;}
    public function getGlass ()
    {
        if ($this->glass == "Undefined")
        return "N/A";
        return $this->glass;
    }

    public function setHeater ($heater)
    {$this->heater = $heater;}
    public function getHeater ()
    {
        if ($this->heater == "Undefined")
        return "N/A";
        return $this->heater;
    }


    public function setHorn ($horn)
    {$this->horn = $horn;}
    public function getHorn ()
    {
        if ($this->horn == "Undefined")
        return "N/A";
        return $this->horn;
    }

    public function setHydraulic ($hydraulic)
    {$this->hydraulic = $hydraulic;}
    public function getHydraulic ()
    {
        if ($this->hydraulic == "Undefined")
        return "N/A";
        return $this->hydraulic;
    }

    public function setLamps ($lamps)
    {$this->lamps = $lamps;}
    public function getLamps ()
    {
        if ($this->lamps == "Undefined")
        return "N/A";
        return $this->lamps;
    }

    public function setSteering ($steering)
    {$this->steering = $steering;}
    public function getSteering ()
    {if ($this->steering == "Undefined")
        return "N/A";
        return $this->steering;
    }

    public function setSuspension ($suspension)
    {$this->suspension = $suspension;}
    public function getSuspension ()
    {
        if ($this->suspension == "Undefined")
        return "N/A";
        return $this->suspension;
    }
    public function setTires ($tires)
    {$this->tires = $tires;}
    public function getTires ()
    {
        if ($this->tires == "Undefined")
        return "N/A";
        return $this->tires;
    }

    public function setWheels ($wheels)
    {$this->wheels = $wheels;}
    public function getWheels ()
    {
        if ($this->wheels == "Undefined")
        return "N/A";
        return $this->wheels;
    }

    public function setWipers ($wipers)
    {$this->wipers = $wipers;}
    public function getWipers ()
    {
        if ($this->wipers == "Undefined")
        return "N/A";
        return $this->wipers;
    }

    public function setPlate ($plate)
    {$this->plate = $plate;}
    public function getPlate ()
    {
        if ($this->plate == "")
        return "N/A";
        return $this->plate;
    }

    public function setJuri ($juri)
    {$this->juri = $juri;}
    public function getJuri ()
    {
        if ($this->juri == "")
        return "N/A";
        return $this->juri;
    }

    public function setLoc ($loc)
    {$this->loc = $loc;}
    public function getLoc ()
    {
        if ($this->loc == "")
        return "N/A";
        return $this->loc;
    }

    public function setDefect ($defect)
    {$this->defect = $defect;}
    public function getDefect ()
    {
        if ($this->defect == "Undefined")
        return "N/A";
        return $this->defect;
    }

    public function setOReg ($oReg)
    {$this->oReg = $oReg;}
    public function getOReg ()
    {
        if ($this->oReg == "Undefined")
        return "N/A";
        return $this->oReg;
    }
    #endregion
}

// API Pull
$inspectionArray = array(); //will store the activities
error_reporting(1);
$startDate = $sDate->format('Y-m-d');
$endDate = $eDate->format('Y-m-d');
$searchCriteria = "{\"minDate\": \"" . $startDate . "\",\"maxDate\": \"" . $endDate . "\"}";
$apiKey = '****** ';
$url = '******' . $startDate . '******' . $startDate ;
$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'X-Apikey: ' . $apiKey;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_TIMEOUT, 3);

$jsonExec = curl_exec($ch);
if(curl_errno($ch))
{
	echo 'Error:' . curl_error($ch);
}

curl_close($ch);


$json = json_decode($jsonExec, true); 
$length = count($json['Data'], 0);
echo "<h1>" . $count . " Driver Inspections Found!</h1><strong>Date:</strong> " . substr($startDate,0,10) . "<hr>";

$j = 0;
if ($length > 0)
{
    // create new activity object for each seperate entry pulled from API
    for ($i = 0; $i < $length; $i++)
    {
        $inspectionArray[$j] = new Inspection();
        $inspectionArray[$j]->setVehicle ($json['Data'][$j]['vehicleName']);
        $inspectionArray[$j]->setDivision ($json['Data'][$j]['divisionId']);
        $inspectionArray[$j]->setDriver ($json['Data'][$j]['driverCode']);
        $inspectionArray[$j]->settype ($json['Data'][$j]['type']);
        $inspectionArray[$j]->setTime ($json['Data'][$j]['CreatedTimestamp']);
        $inspectionArray[$j]->setAirBrake ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][0]["Value"]);
        $inspectionArray[$j]->setCab ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][1]["Value"]);
        $inspectionArray[$j]->setCargo ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][2]["Value"]);
        $inspectionArray[$j]->setCoupling ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][3]["Value"]);
        $inspectionArray[$j]->setDangerous ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][4]["Value"]);
        $inspectionArray[$j]->setControls ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][5]["Value"]);
        $inspectionArray[$j]->setSeat ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][6]["Value"]);
        $inspectionArray[$j]->setEbs ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][7]["Value"]);
        $inspectionArray[$j]->setEmergen ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][8]["Value"]);
        $inspectionArray[$j]->setExhaust ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][9]["Value"]);
        $inspectionArray[$j]->setFrame ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][10]["Value"]);
        $inspectionArray[$j]->setFuel ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][11]["Value"]);
        $inspectionArray[$j]->setGeneral ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][12]["Value"]);
        $inspectionArray[$j]->setGlass ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][13]["Value"]);
        $inspectionArray[$j]->setHeater ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][14]["Value"]);
        $inspectionArray[$j]->setHorn ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][15]["Value"]);
        $inspectionArray[$j]->setHydraulic ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][16]["Value"]);
        $inspectionArray[$j]->setLamps ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][17]["Value"]);
        $inspectionArray[$j]->setSteering ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][18]["Value"]);
        $inspectionArray[$j]->setSuspension ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][19]["Value"]);
        $inspectionArray[$j]->setTires ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][20]["Value"]);
        $inspectionArray[$j]->setWheels ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][21]["Value"]);
        $inspectionArray[$j]->setWipers ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][0]["Units"][22]["Value"]);
        $inspectionArray[$j]->setPlate ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][1]["Units"][0]["Note"]);
        $inspectionArray[$j]->setJuri ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][1]["Units"][1]["Note"]);
        $inspectionArray[$j]->setLoc ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][1]["Units"][2]["Note"]);
        $inspectionArray[$j]->setDefect ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][1]["Units"][3]["Value"]);
        $inspectionArray[$j]->setOReg ($json['Data'][$j]['inspectionData'][0]["UnitGroups"][1]["Units"][4]["Value"]);
        $j++;
    }
}

// code to print all the data
$count = 1;
echo "<style>
        th {padding: 5px; text-align: center; border-style: solid hidden double hidden; background-color: LightGray;}
        td {padding: 5px; text-align: center; border-style: solid hidden solid hidden; white-space: nowrap;}
        table {border-style: solid; border-collapse: collapse;}
        .right {border-right: solid;}
        .left {border-left: solid;}
        .even {background-color: LightGray;}
        .odd {background-color: white;}
      </style>";
echo "<table>
        <tr>
            <th class = \"left\">Truck</th>
            <th>Driver</th>
            <th>Division</th>
            <th>Type</th>
            <th>Time</th>
            <th>Air Brake</th>
            <th>Cab</th>
            <th>Cargo</th>
            <th>Coupling</th>
            <th>Dangerous</th>
            <th>Controls</th>
            <th>Seat</th>
            <th>EBS</th>
            <th>Emergency Equipment</th>
            <th>Exhaust</th>
            <th>Frame</th>
            <th>Fuel</th>
            <th>General</th>
            <th>Glass & Mirrors</th>
            <th>Heater / Defroster</th>
            <th>Horn</th>
            <th>Hydraulic</th>
            <th>Lamps</th>
            <th>Steering</th>
            <th>Suspension</th>
            <th>Tires</th>
            <th>Wheels</th>
            <th>Wipers</th>
            <th>Plate Number</th>
            <th>Plate Jurisdiction</th>
            <th>Location of Inspection</th>
            <th>No Major or Minor Defects Found</th>
            <th class = \"right\">Done according to O. Reg 199/07</th>
        </tr>";
//go through each object in the array and print it
foreach($inspectionArray as $inspection)
{
    // make sure onject matches the da we actually want
    if (substr($inspection->getTime(), 0, 10) != substr($startDate,0,10))
    continue;
    // check if it's the type we want from the selection made in the form
    if ($inspection->gettype() == "PRE" && !isset($_GET['pre']))
    continue;
    // check if it's the type we want from the selection made in the form
    if ($inspection->getType() == "POST" && !isset($_GET['post']))
    continue;
    // use an if statement to keep track of even rows. This is used to change the background colours in CSS
    if (($count%2)==0)
    echo "<tr class = \"even\">";
    else
    echo "<tr class = \"odd\">";
    echo "<td class = \"left\">" . substr($inspection->getVehicle(),3) . "</td>";
    echo "<td>" . $inspection->getDriver() . "</td>";
    echo "<td>" . $inspection->getDivision() . "</td>";
    echo "<td>" . $inspection->gettype() . "</td>";
    echo "<td>" . substr($inspection->getTime(), 11,5) . "</td>";
    echo "<td>" . $inspection->getAirBrake() . "</td>";
    echo "<td>" . $inspection->getCab() . "</td>";
    echo "<td>" . $inspection->getCargo() . "</td>";
    echo "<td>" . $inspection->getCoupling() . "</td>";
    echo "<td>" . $inspection->getDangerous() . "</td>";
    echo "<td>" . $inspection->getControls() . "</td>";
    echo "<td>" . $inspection->getSeat() . "</td>";
    echo "<td>" . $inspection->getEbs() . "</td>";
    echo "<td>" . $inspection->getEmergen() . "</td>";
    echo "<td>" . $inspection->getExhaust() . "</td>";
    echo "<td>" . $inspection->getFrame() . "</td>";
    echo "<td>" . $inspection->getFuel() . "</td>";
    echo "<td>" . $inspection->getGeneral() . "</td>";
    echo "<td>" . $inspection->getGlass() . "</td>";
    echo "<td>" . $inspection->getHeater() . "</td>";
    echo "<td>" . $inspection->getHorn() . "</td>";
    echo "<td>" . $inspection->getHydraulic() . "</td>";
    echo "<td>" . $inspection->getLamps() . "</td>";
    echo "<td>" . $inspection->getSteering() . "</td>";
    echo "<td>" . $inspection->getSuspension() . "</td>";
    echo "<td>" . $inspection->getTires() . "</td>";
    echo "<td>" . $inspection->getWheels() . "</td>";
    echo "<td>" . $inspection->getWipers() . "</td>";
    echo "<td>" . $inspection->getPlate() . "</td>";
    echo "<td>" . $inspection->getJuri() . "</td>";
    echo "<td>" . $inspection->getLoc() . "</td>";
    echo "<td>" . $inspection->getDefect() . "</td>";
    echo "<td class = \"right\">" . $inspection->getOReg() . "</td>";
    echo "</tr>";
    $count++;
}
echo "</table>";
echo "<br><strong>Total:</strong> " . $count . " Inspections Found<hr><button id =\"download-button\">Download</button>";

//bunch of javascript I found online that will let the user download te table to a .csv file

// this function takes the table and makes it intot a csv object
echo"<script>function htmlToCSV(html, filename) {
	var data = [];
	var rows = document.querySelectorAll(\"table tr\");
			
	for (var i = 0; i < rows.length; i++) {
		var row = [], cols = rows[i].querySelectorAll(\"td, th\");
				
		for (var j = 0; j < cols.length; j++) {
		        row.push(cols[j].innerText);
        }
		        
		data.push(row.join(",")); 		
	}

	downloadCSVFile(data.join(\"\\n\"), filename);
}</script>";

// this is the function that makes the csv file
echo "<script>function downloadCSVFile(csv, filename) {
	var csv_file, download_link;

	csv_file = new Blob([csv], {type: \"text/csv\"});

	download_link = document.createElement(\"a\");

	download_link.download = filename;

	download_link.href = window.URL.createObjectURL(csv_file);

	download_link.style.display = \"none\";

	document.body.appendChild(download_link);

	download_link.click();
}</script>";

// this is just an eventlistner that uses the other functions when the button is pressed
echo "<script>document.getElementById(\"download-button\").addEventListener(\"click\", function () {
	var html = document.querySelector(\"table\").outerHTML;
	htmlToCSV(html, \"Inspections.csv\");
});</script>";
?>