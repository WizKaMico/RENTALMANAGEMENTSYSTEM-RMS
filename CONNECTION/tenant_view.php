 
                          <?php

                            $api_url = 'https://ipinfo.io/json?token=06013b989729d4';

                            // Read JSON file
                            $json_data = file_get_contents($api_url);

                            // Decode JSON data into PHP array
                            $response_data = json_decode($json_data);

                            $city = $response_data->city;
                            $region = $response_data->region;
                            $postal = $response_data->postal;
                            $ip = $response_data->ip;
                            $org = $response_data->org;
                            // $loc = $response_data->loc;
                            $rip =$response_data->loc;

                            // print_r($city);
                            // print_r($region);
                            // print_r($postal);
                            // print_r($ip);
                            // print_r($org);
                            date_default_timezone_set('Asia/Manila');

                     
                            $date = date('Y-m-d');
                            $email = $row['email'];
                            ?>

                            <?php 

                            include_once('conn.php');
                            mysqli_query($conn,"INSERT INTO viewers (ip, rip, city, region, org, email, date_created) VALUES ('$ip', '$rip', '$city', '$region', '$org', '$email', '$date')");  

                            ?>