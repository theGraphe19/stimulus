
$trip = "select * from agent_trips";
               $run_trip11 = mysqli_query($link, $trip);
               while($ee = mysqli_fetch_array($run_trip11, MYSQLI_ASSOC))
               {
                  $trip_loc11 = $ee['trip_place'];
                  $trip_food11 = $ee['trip_food'];
                  $trip_agent11 = $ee['trip_agent_id'];
                  $trip_date11 = $ee['trip_date'];
                  $trip_time11 = $ee['trip_time'];

                  $ho_book_id11 = $ee['trip_agent_id'].$trip_loc11.$trip_food11.date('d-m-Y',strtotime($trip_date11));


                  $ww = "select * from hotels where h_food_type = '$trip_food11' and h_location = '$trip_loc11'";
                  $qwe = mysqli_query($link, $ww);
                  
                  while($ff = mysqli_fetch_array($qwe, MYSQLI_ASSOC))
                  {

                              $get_ho = $ff['h_id'];
                              $get_cap = $ff['h_capacity'];

                              $hwkr = "select * from hotel_booking where ho_book_id = '$ho_book_id11' and hotel_reser_date = '$trip_date11'";
                              $hqhr = mysqli_query($link, $hwkr);
                              $fjhd = mysqli_fetch_array($hqhr, MYSQLI_ASSOC);

                              // if($ho_book_id11 != $fjhd['ho_book_id'] && $trip_date11 != $fjhd['hotel_reser_date'])
                              // {

                              $ho = "insert into hotel_booking (ho_book_id, hotel_id, hotel_reser_date, hotel_food_type, hotel_location, hotel_capacity, hotel_reserved_seat)
                                    values ('$ho_book_id11'.'$get_ho', '$get_ho', '$trip_date11', '$trip_food11', '$trip_loc11', '$get_cap', '0')";
                              mysqli_query($link, $ho);

                              // }
                  }
               }