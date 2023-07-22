<?php
session_start();

include("./scripts/php/databaseFunctions.php");

$connect = dbconnect();

$idCompany = $_SESSION['companyID'];

$checkRollingType = $connect->prepare("SELECT `VehicleType`.`name` as `type` FROM `rollingStock`
    INNER JOIN `VehicleType` on `rollingStock`.`idVehicleType` = `VehicleType`.`id`
    WHERE `rollingStock`.`idCompany` = :idCompany
    GROUP BY `rollingStock`.`idVehicleType`");
$checkRollingType->bindValue(":idCompany", $idCompany, PDO::PARAM_INT);
$checkRollingType->execute();

$searchAllVehicles = $connect->prepare("SELECT * FROM `rollingStock`
    WHERE `idCompany` = :idCompany");
$searchAllVehicles->bindValue(":idCompany", $idCompany, PDO::PARAM_INT);
$searchAllVehicles->execute();

$buttonAllVeh = $connect->prepare("SELECT * FROM `rollingStock`
    WHERE `idCompany` = :idCompany");
$buttonAllVeh->bindValue(":idCompany", $idCompany, PDO::PARAM_INT);
$buttonAllVeh->execute();

?>
<div class="section container-fluid">
    <div class="row">
        <H3>Spis taboru</H3>
        <p><b>Ostatnia aktualizacja:</b> <?php $lastDate = lastDate();
                                            echo $lastDate; ?></p>
        <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
            <li class="tabs-main" role="presentation">
                <a class="nav-link active" id="ex1-tab-1" data-toggle="tab" href="#ex1-tabs-1" role="tab" aria-controls="ex1-tabs-1" aria-selected="true">Wszystkie wozy</a>
            </li>
            <?php

            $i = 2;
            while ($checkRollingTypeFinish = $checkRollingType->fetch()) {

                echo '<li class="tabs-main" role="presentation">
                    <a
                    class="nav-link"
                    id="ex1-tab-' . $i . '"
                    data-toggle="tab"
                    href="#ex1-tabs-' . $i . '"
                    role="tab"
                    aria-controls="ex1-tabs-' . $i . '"
                    aria-selected="false"
                    >' . $checkRollingTypeFinish['type'] . '</a>
                    </li>';
                $i++;
            }

            ?>

        </ul>
        <div class="tab-content" id="ex1-content">
            <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                <div class="main-window col-12">
                    <div class="window-main">
                        <?php
                        echo "<table class='table-main'>
                        <tr>
                        <th>Numer taborowy</th>
                        <th>Marka</th>
                        <th>Model</th>
                        <th class='d-none d-md-block'>Rok produkcji</th><th></th>
                        <th class='d-none d-md-block'>Rok wprowadzenia do eksploatacji</th>
                        <th>Więcej</th>

                        </tr>";
                        while ($searchAllVehiclesFinish = $searchAllVehicles->fetch()) {
                            echo
                            "<tr><td><b>" . $searchAllVehiclesFinish['rollingStockNumber'] . "</b> ";
                            if ($searchAllVehiclesFinish['lowFloor'] == 'yes') {
                                echo "<i class='fas fa-wheelchair'></i>";
                            }
                            echo " ";
                            if ($searchAllVehiclesFinish['airConditional'] == 'yes') {
                                echo "<i class='fas fa-snowflake'></i>";
                            }
                            echo " ";
                            if ($searchAllVehiclesFinish['ticketMachine'] == 'yes') {
                                echo "<i class='fas fa-ticket-alt'></i>";
                            }
                            echo " ";
                            if ($searchAllVehiclesFinish['bidirectional'] == 'yes') {
                                echo "<i class='fas fa-code'></i>";
                            }
                            echo "</td>
                            <td>" . $searchAllVehiclesFinish['producer'] . "</td>
                            <td>" . $searchAllVehiclesFinish['model'] . "</td>
                            <td class='d-none d-md-block'>" . $searchAllVehiclesFinish['productionYear'] . "</td><td></td>
                            <td class='d-none d-md-block'>" . $searchAllVehiclesFinish['launchYear'] . "</td>
                            <td><button type='button' class='btn btn-primary stock-list-button' data-toggle='modal' data-target='#modal" . $searchAllVehiclesFinish['id'] . "'>
                            Więcej informacji
                          </button></td>";

                            echo "<div class='modal fade' id='modal" . $searchAllVehiclesFinish['id'] . "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                            <div class='modal-dialog' role='document'>
                              <div class='modal-content'>
                                <div class='modal-header'>
                                  <h5 class='modal-title' id='exampleModalLabel'>" . $searchAllVehiclesFinish['producer']. " " . $searchAllVehiclesFinish['model'] . " #" . $searchAllVehiclesFinish['rollingStockNumber'] . "</h5>
                                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                  </button>
                                </div>
                                <div class='modal-body'>
                                    <p>" . $searchAllVehiclesFinish['image'] . "</p>
                                    <p><b>Marka:</b> " . $searchAllVehiclesFinish['producer'] . "</p>
                                    <p><b>Model:</b> " . $searchAllVehiclesFinish['model'] . "</p>
                                    <p><b>Numer Taborowy:</b> " . $searchAllVehiclesFinish['rollingStockNumber'] . "</p>
                                    <p><b>Rok produkcji:</b> " . $searchAllVehiclesFinish['productionYear'] . "</p>
                                    <p><b>Rok wprowadzenia do eksploatacji:</b> " . $searchAllVehiclesFinish['launchYear'] . "</p>
                                    <p><b>Układ drzwi: </b>" . $searchAllVehiclesFinish['doorway'] . "</p>
                                    <p><b>Atrybuty:</b> ";
                                        if ($searchAllVehiclesFinish['lowFloor'] == 'yes') {
                                        echo "<i class='fas fa-wheelchair'></i>";
                                        }
                                        echo " ";
                                        if ($searchAllVehiclesFinish['airConditional'] == 'yes') {
                                        echo "<i class='fas fa-snowflake'></i>";
                                        }
                                        echo " ";
                                        if ($searchAllVehiclesFinish['ticketMachine'] == 'yes') {
                                            echo "<i class='fas fa-ticket-alt'></i>";
                                        }
                                        echo " ";
                                        if ($searchAllVehiclesFinish['bidirectional'] == 'yes') {
                                            echo "<i class='fas fa-code'></i>";
                                        }
                                        if ($searchAllVehiclesFinish['lowFloor'] == 'no'&&$searchAllVehiclesFinish['airConditional'] == 'no'&&$searchAllVehiclesFinish['ticketMachine'] == 'no'&&$searchAllVehiclesFinish['bidirectional'] == 'no')
                                        {
                                            echo "brak";
                                        }
                                        echo "</p>
                                </div>
                                <div class='modal-footer'>
                                    <div class='legendary'>
                                        <H4>Legenda:</H4>
                                        <p><i class='fas fa-wheelchair'></i> - niskopodłogowy</p>
                                        <p><i class='fas fa-snowflake'></i> - klimatyzacja</p>
                                        <p><i class='fas fa-ticket-alt'></i> - biletomat/kasa</p>
                                        <p><i class='fas fa-code'></i> - pojazd dwukierunkowy</p>
                                    </div>
                                    <button type='button' class='btn btn-primary' data-dismiss='modal'>Edytuj pojazd</button>
                                    <button type='button' class='btn btn-primary' data-dismiss='modal'>Usuń pojazd</button>
                                </div>
                              </div>
                            </div>
                          </div></tr>";
                        }

                        echo "</table>";

                        ?>
                    </div>
                    <div class="window-footer">
                        <?php
                        if ($_SESSION['permissions'][8] == '8') {
                            echo "<a href=panel.php?page=" . $_SESSION['permissionsLink'][8] . ">Dodaj pojazd</a>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php

            //$a = 2;
            //while($checkRollingTypeFinish = $checkRollingType->fetch())
            for ($count = 2; $count <= 4; $count++) {
                $idVehicleType = $count - 1;

                $searchTypeVehicles = $connect->prepare("SELECT * FROM `rollingStock`
                    WHERE `idCompany` = :idCompany and `idVehicleType` = :idVehicleType");
                $searchTypeVehicles->bindValue(":idCompany", $idCompany, PDO::PARAM_INT);
                $searchTypeVehicles->bindValue(":idVehicleType", $idVehicleType, PDO::PARAM_INT);
                $searchTypeVehicles->execute();

                echo '<div class="tab-pane fade" id="ex1-tabs-' . $count . '" role="tabpanel" aria-labelledby="ex1-tab-' . $count . '">
                    <div class="main-window col-12">
                        <div class="window-main">';

                echo "<table class='table-main'>
                            <tr>
                            <th>Numer taborowy</th>
                            <th>Marka</th>
                            <th>Model</th>
                            <th class='d-none d-md-block'>Rok produkcji</th><th></th>
                            <th class='d-none d-md-block'>Rok wprowadzenia do eksploatacji</th>
                            <th>Więcej</th>

                            </tr>";
                while ($searchTypeVehiclesFinish = $searchTypeVehicles->fetch()) {
                    echo
                    "<tr><td><b>" . $searchTypeVehiclesFinish['rollingStockNumber'] . "</b> ";
                    if ($searchTypeVehiclesFinish['lowFloor'] == 'yes') {
                        echo "<i class='fas fa-wheelchair'></i>";
                    }
                    echo " ";
                    if ($searchTypeVehiclesFinish['airConditional'] == 'yes') {
                        echo "<i class='fas fa-snowflake'></i>";
                    }
                    echo " ";
                    if ($searchTypeVehiclesFinish['ticketMachine'] == 'yes') {
                        echo "<i class='fas fa-ticket-alt'></i>";
                    }
                    echo " ";
                    if ($searchTypeVehiclesFinish['bidirectional'] == 'yes') {
                        echo "<i class='fas fa-code'></i>";
                    }
                    echo "</td>
                                <td>" . $searchTypeVehiclesFinish['producer'] . "</td>
                                <td>" . $searchTypeVehiclesFinish['model'] . "</td>
                                <td class='d-none d-md-block'>" . $searchTypeVehiclesFinish['productionYear'] . "</td><td></td>
                                <td class='d-none d-md-block'>" . $searchTypeVehiclesFinish['launchYear'] . "</td>
                                <td><button type='button' class='btn btn-primary stock-list-button' data-toggle='modal' data-target='#modaltype" . $searchTypeVehiclesFinish['id'] . "'>
                            Więcej informacji
                          </button></td>";
                          
                          echo "<div class='modal fade' id='modaltype" . $searchTypeVehiclesFinish['id'] . "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                            <div class='modal-dialog' role='document'>
                              <div class='modal-content'>
                                <div class='modal-header'>
                                  <h5 class='modal-title' id='exampleModalLabel'>" . $searchTypeVehiclesFinish['producer']. " " . $searchTypeVehiclesFinish['model'] . " #" . $searchTypeVehiclesFinish['rollingStockNumber'] . "</h5>
                                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                  </button>
                                </div>
                                <div class='modal-body'>
                                    <p>" . $searchTypeVehiclesFinish['image'] . "</p>
                                    <p><b>Marka:</b> " . $searchTypeVehiclesFinish['producer'] . "</p>
                                    <p><b>Model:</b> " . $searchTypeVehiclesFinish['model'] . "</p>
                                    <p><b>Numer Taborowy:</b> " . $searchTypeVehiclesFinish['rollingStockNumber'] . "</p>
                                    <p><b>Rok produkcji:</b> " . $searchTypeVehiclesFinish['productionYear'] . "</p>
                                    <p><b>Rok wprowadzenia do eksploatacji:</b> " . $searchTypeVehiclesFinish['launchYear'] . "</p>
                                    <p><b>Atrybuty:</b> ";
                                        if ($searchTypeVehiclesFinish['lowFloor'] == 'yes') {
                                        echo "<i class='fas fa-wheelchair'></i>";
                                        }
                                        echo " ";
                                        if ($searchTypeVehiclesFinish['airConditional'] == 'yes') {
                                        echo "<i class='fas fa-snowflake'></i>";
                                        }
                                        echo " ";
                                        if ($searchTypeVehiclesFinish['ticketMachine'] == 'yes') {
                                            echo "<i class='fas fa-ticket-alt'></i>";
                                        }
                                        echo " ";
                                        if ($searchTypeVehiclesFinish['bidirectional'] == 'yes') {
                                            echo "<i class='fas fa-code'></i>";
                                        }
                                        if ($searchTypeVehiclesFinish['lowFloor'] == 'no'&&$searchTypeVehiclesFinish['airConditional'] == 'no'&&$searchTypeVehiclesFinish['ticketMachine'] == 'no'&&$searchTypeVehiclesFinish['bidirectional'] == 'no')
                                        {
                                            echo "brak";
                                        }
                                        echo "</p>
                                </div>
                                <div class='modal-footer'>
                                    <div class='legendary'>
                                        <H4>Legenda:</H4>
                                        <p><i class='fas fa-wheelchair'></i> - niskopodłogowy</p>
                                        <p><i class='fas fa-snowflake'></i> - klimatyzacja</p>
                                        <p><i class='fas fa-ticket-alt'></i> - biletomat/kasa</p>
                                        <p><i class='fas fa-code'></i> - pojazd dwukierunkowy</p>
                                    </div>
                                    <button type='button' class='btn btn-primary' data-dismiss='modal'>Edytuj pojazd</button>
                                    <button type='button' class='btn btn-primary' data-dismiss='modal'>Usuń pojazd</button>
                                </div>
                              </div>
                            </div>
                          </div></tr>";
                }
                echo "</table>";
                echo "</div>
                        <div class='window-footer'>";
                if ($_SESSION['permissions'][8] == '8') {
                    echo "<a href=panel.php?page=" . $_SESSION['permissionsLink'][8] . ">Dodaj pojazd</a>";
                }
                echo '</div>
                        </div>
                    </div>';
            }

            ?>

            <?php
            while ($button = $buttonAllVeh->fetch()) {
            }
            ?>
        </div>
    </div>
</div>