<?php
$con = mysqli_connect("sql8.netmark.pl", "filipmar_asia", "asia123", "filipmar_asia") or die("Connection was not established");

function search_test($set, $friend)
{
	if ($set != 0) {
		global $con;

		$get_tests = 'SELECT * from bidding_tests JOIN player_bidding_tests ON bidding_tests.id_test = player_bidding_tests.id_test
			RIGHT JOIN bridgeplayers ON player_bidding_tests.first_player =  bridgeplayers.id
			WHERE (player_bidding_tests.id_player_set = ' . $set . ') AND (bridgeplayers.id = ' . $friend . ' or player_bidding_tests.second_player = ' . $friend . ') order by completed_test, test_number';

		$run_biddingtest = mysqli_query($con, $get_tests);

		while ($row_biddingtest = mysqli_fetch_array($run_biddingtest)) {
			$biddingtest = $row_biddingtest['id_player_test'];
			$test_main_id = $row_biddingtest['id_test'];
			$completed = $row_biddingtest['completed_test'];
			$turn = $row_biddingtest['bidding_person'];
			$points = $row_biddingtest['points'];
			$bidding_string = $row_biddingtest['bidding_string'];
			$test_number = $row_biddingtest['test_number'];

			if ($turn == 2) {
				$bidding_person = $row_biddingtest['first_player'];
			} else {
				$bidding_person = $row_biddingtest['second_player'];
			}

			$src = 'img/done.png';

			if (!$completed) {
				$get_pic = 'SELECT * from bridgeplayers where id = ' . $bidding_person . '';
				$run_pic = mysqli_query($con, $get_pic);

				while ($row_pic = mysqli_fetch_array($run_pic)) {
					$src = $row_pic['profile_picture'];
				}
			}

			echo "
				<div class='col-sm-4'>
					<img class='profile_picture' src='$src''>
						";
			if ($completed) {
				echo " 
							<form method='get' action='points_table.php'>
								<input type=hidden name='biddingtest' value='$biddingtest'/>
								<input type=hidden name='test_main_id' value='$test_main_id'/>
								<input type=hidden name='friend' value='$friend'/>
								<input type=hidden name='type' value='0'/>
								<input type=hidden name='test_number' value='$test_number'/>
								<p><button class='profile_view_button' name='view_points_table'>Punktacja " . $test_number . "</button></p>
								<p>Punkty: $points </p>
							";
			} else {
				echo "
							<form method='get' action='bidding_page.php'>
								<input type=hidden name='biddingtest' value='$biddingtest'/>
								<input type=hidden name='friend' value='$friend'/>
								<input type=hidden name='type' value='0'/>
								<input type=hidden name='test_number' value='$test_number'/>
								<p><button class='profile_view_button' name='add'>Rozwiąż " . $test_number . "</button></p>
							";
			}
			echo "
						<input type=hidden name='friend' value='$friend'/>
					</form>
				</div>
				";

			if (isset($_GET['view_points_table'])) {
				echo "<script>window.location.href = 'points_table.php';</script>";
			}
			if (isset($_GET['add'])) {
				echo "<script>window.location.href = 'bidding_page.php';</script>";
			}
		}
	}
}