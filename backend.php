<?php


$origin = $_GET['origin'];
$destination1 = $_GET['destination1'];
$destination2 = $_GET['destination2'];
$mode_s = $_GET['mode'];

if($origin != '' && $destination1 != '' && $destination2 != '')
{/******Values Empty******/
  $status = '';
  $location_status = '';
  $origin_address = '';

  $distance1 = '';
  $duration1 = '';
  $destination_address1 = '';

  $distance2 = '';
  $duration2 = '';
  $destination_address2 = '';
  $distance_diff = '';
  $duration_diff = '';

  $filt_origin = str_replace(' ', '', $origin);
  $filt_destination1 = str_replace(' ', '', $destination1);
  $filt_destination2 = str_replace(' ', '', $destination2);
  $option = array("driving", "bicycling", "walking");
  $mode = $option[$mode_s];

  evaluatedestiantion($filt_origin, $filt_destination1, $mode);
  $status1 = $status;
              if($status1 == "OK")
              {/******Status-1******/
                      $location_status1 = $location_status;

                      if($location_status1 == "OK")
                      {/******Location Status-1******/

                                      $origin_add = $origin_address;

                                      $distance1 = $distance * 0.001;
                                      $distance1a = $distance1."Km";
                                      $duration1 = $duration;
                                      $duration1_sec = $duration_sec / 60;
                                      $destination_address1 = $destination_address;

                                      evaluatedestiantion($filt_origin, $filt_destination2, $mode);
                                      $status2 = $status;
                                      if($status2 == "OK")
                                      {/******Status-2******/
                                        $location_status2 = $location_status;
                                        if($location_status2 == "OK")
                                        {/******Location Status-2******/
                                          $distance2 = $distance * 0.001;
                                          $distance2a = $distance2."Km";
                                          $duration2 = $duration;
                                          $duration2_sec = $duration_sec / 60;
                                          $destination_address2 = $destination_address;



                                          echo "<div class='well'>";
                                            echo "<b>".$origin." → ".$destination_address1."</b>";
                                            echo "<br/>";
                                            echo "<b>Distance: </b>".$distance1." km";
                                            echo "<br/>";
                                            echo "<b>Time to reach ".$destination1.": </b>".$duration1;
                                          echo "</div>";



                                          echo "<div class='well'>";
                                            echo "<b>".$origin." → ".$destination_address2."</b>";
                                            echo "<br/>";
                                            echo "<b>Distance: </b>".$distance2." km</span>";
                                            echo "<br/>";
                                            echo "<b>Time to reach ".$destination2.":</b> ".$duration2;
                                          echo "</div>";




                                            if($distance1 > $distance2)
                                            {
                                              //If destination 1 is more far from the origin than destination 2.
                                              $distance_diff = $distance1 - $distance2;
                                              $duration_diff = $duration1_sec - $duration2_sec;
                                                  if($duration_diff > 60)
                                                  {
                                                      $duration_diff = round($duration_diff / 60);
                                                      $duration_diff = $duration_diff." hour";
                                                  }
                                                  else
                                                  {
                                                    $duration_diff = $duration_diff." minutes";
                                                  }

                                              echo "<i>".$destination1. "</i> is <font size='4'><span class='label label-info'>". $distance_diff ."km</span></font> more far from ".$origin." than <i>". $destination2.".</i>";

                                              echo "<br/><br/>";

                                              echo "To reach <i>".$destination1."</i> you need to spend <b><font size='4'><span class='label label-info'>". $duration_diff."</span></font></b> more time than to reach <i>". $destination2.".</i>";
                                            }
                                            elseif($distance2 > $distance1)
                                            {
                                              //If destination 2 is more far from the origin than destination 1.
                                              $distance_diff = $distance2 - $distance1;
                                              $duration_diff = $duration2_sec - $duration1_sec;
                                                  if($duration_diff > 60)
                                                  {
                                                      $duration_diff = round($duration_diff / 60);
                                                      $duration_diff = $duration_diff." hour";
                                                  }
                                                  else
                                                  {
                                                    $duration_diff = $duration_diff." minutes";
                                                  }

                                              echo "<i>".$destination2. "</i> is <font size='4'><span class='label label-info'>". $distance_diff ."km</span></font> more far from ".$origin." than <i>". $destination1.".</i>";

                                              echo "<br/><br/>";

                                              echo "To reach <i>".$destination2."</i> you need to spend <b><font size='4'><span class='label label-info'>". $duration_diff."</span></font></b> more time than to reach <i>". $destination1.".</i>";
                                            }
                                            else
                                            {
                                              echo "Both the locations are same.";
                                            }
                                        }
                                        else
                                        {
                                          echo $destination2." not found.";
                                        }/******End Location Status-2******/
                                      }
                                      else
                                      {
                                        echo "Unable to process. Please try after few seconds.";
                                      }/******End Status-2******/
                        }
                        else
                        {
                            echo $destination1." not found.";
                        }/******End Location Status-1******/
              }
              else
              {
                  echo "Unable to process now. Try after few seconds.";
              }/******End Status-1******/

}
else{
  echo "Location Empty. Unable to evaluate";
}/******End Values Empty******/

/****Function*****/
function evaluatedestiantion($filt_origin, $filt_destination, $mode)
{
  $string = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$filt_origin."&destinations=".$filt_destination."&mode=".$mode."&language=fr-FR&key=PUT-YOUR-GOOGLE-API-KEY-HERE";

  $data = json_decode(file_get_contents($string),true);
  global $status;
  $status = $data['status'];
  global $location_status;
  $location_status = $data['rows']['0']['elements']['0']['status'];

    if($status == "OK")
    {
      if($location_status == "OK")
      {
        global $origin_address, $destination_address, $distance, $duration, $duration_sec;
        $destination_address = $data['destination_addresses']['0'];
        $origin_address = $data['origin_addresses']['0'];
        $distance = $data['rows']['0']['elements']['0']['distance']['value'];
        $duration = $data['rows']['0']['elements']['0']['duration']['text'];
        $duration_sec = $data['rows']['0']['elements']['0']['duration']['value'];
      }
    }
}
/****Function end*****/
?>
