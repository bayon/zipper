<?php
$array = array(2422258, 2422966, 2425298, 2415066, 2409650, 2429990, 2430002, 2345954, 2430986, 2431166, 2431274, 2431914, 2432186, 2433182, 2424946, 2302586, 2399866, 2435446, 2437250, 2439078, 2397242, 2352014, 2305258, 2443958, 2444162, 2338414, 2444534, 2446298, 2331826, 2427270, 2370274, 2403258, 2416542, 2431150, 2450898, 2450906, 2408242, 2370498, 2330902, 2456614, 2353842, 2349170, 2428842, 2457410, 2457418, 2457530, 2457610, 2457730, 2457878, 2457890, 2461546, 2461666, 2461738, 2462198, 2462230, 2464346, 2464402, 2450742, 2402282, 2362638, 2469866, 2473026, 2473746, 2473998, 2475850, 2475922, 2444330, 2435590, 2382742, 2354282, 2465662, 2446622, 2444822, 2352206, 2444710, 2386938, 2389878, 2446314, 2457438, 2456678, 2468246, 2501786, 2502074, 2441554, 2461518, 2505402, 2466978, 2345706, 2434842, 2447690, 2510798, 2375654, 2513174, 2513526, 2513538, 2513550);
foreach($array as $v){
	// echo('<br>'.$v);
	$sql =  "";
	// something like this 
	//UPDATE cid_play.tickets SET 'id' = a,'command' = b,'desc' = c WHERE 1
	$sql .= "Update `cid_play`.`tickets` SET `product_id` =  16, `rootCauseId` = 826, `ticket_state_id` = 1,  `date_closed` = '".date('Y-m-d H:i:s')."' where `tid` =  ".$v." ;";
	//params: tid, 
	echo('<br>'.$sql);
}
/*
 * 
 * 
 * 
 *  L E F T   O F F   H E R E  ---figure out which fields relate to the given info.
Use the following information for the cause code info: 
Product = CCards 
Cause Code = Trouble Cleared. 
 * mysql> desc tickets;
+----------------------+-------------------------------------------+------+-----+---------------------+----------------+
| Field                | Type                                      | Null | Key | Default             | Extra          |
+----------------------+-------------------------------------------+------+-----+---------------------+----------------+
| tid                  | int(11) unsigned                          | NO   | PRI | NULL                | auto_increment |
| cid                  | int(11) unsigned                          | NO   | MUL | 0                   |                |
| lid                  | int(11) unsigned                          | NO   | MUL | 0                   |                |
| date_opened          | datetime                                  | NO   | MUL | 1975-01-01 00:00:00 |                |
| date_closed          | datetime                                  | NO   | MUL | 2038-01-01 00:00:00 |                |
| auid                 | int(11) unsigned                          | NO   | MUL | 315                 |                |
| assigned_group_id    | int(11) unsigned                          | NO   | MUL | 0                   |                |
| cuid                 | int(11) unsigned                          | NO   | MUL | 0                   |                |
| nacid                | int(11) unsigned                          | NO   | MUL | 0                   |                |
| caller_name          | varchar(100)                              | NO   |     | NULL                |                |
| caller_number        | varchar(40)                               | NO   |     | NULL                |                |
| problem_description  | text                                      | NO   |     | NULL                |                |
| solution_description | text                                      | YES  |     | NULL                |                |
| priority             | enum('1','2','3','4','5','6','7','8','9') | NO   | MUL | 3                   |                |
| due_date             | date                                      | YES  |     | NULL                |                |
| ptid                 | int(10) unsigned                          | NO   | MUL | 0                   |                |
| pstid                | int(10) unsigned                          | YES  | MUL | NULL                |                |
| soltype_id           | int(10) unsigned                          | NO   |     | 0                   |                |
| solsub_id            | int(10) unsigned                          | NO   |     | 0                   |                |
| date_modified        | timestamp                                 | NO   | MUL | CURRENT_TIMESTAMP   |                |
| cust_view            | tinyint(4)                                | NO   |     | 0                   |                |
| cc                   | text                                      | NO   |     | NULL                |                |
| port_sub_date        | date                                      | YES  |     | NULL                |                |
| port_firm            | tinyint(1)                                | NO   |     | 0                   |                |
| tqid                 | int(11)                                   | NO   |     | 0                   |                |
| vid                  | int(11)                                   | YES  | MUL | NULL                |                |
| vid_tic_num          | varchar(15)                               | YES  | MUL | NULL                |                |
| install_id           | int(10)                                   | NO   | MUL | 0                   |                |
| adlid                | varchar(2)                                | YES  |     | NULL                |                |
| ticket_type          | enum('Enhancement','Problem','Project')   | YES  | MUL | NULL                |                |
| multi_user           | tinyint(1)                                | YES  |     | NULL                |                |
| state                | varchar(255)                              | NO   |     | NULL                |                |
| ticket_state_id      | int(11) unsigned                          | YES  | MUL | 3                   |                |
| age                  | int(12)                                   | YES  | MUL | NULL                |                |
| master_tid           | int(11)                                   | NO   | MUL | NULL                |                |
| track                | tinyint(1) unsigned                       | NO   | MUL | 0                   |                |
| product_id           | bigint(20) unsigned                       | YES  |     | 0                   |                |
| rootCauseId          | int(11) unsigned                          | YES  |     | NULL                |                |
| lastCustomerUpdate   | timestamp                                 | NO   |     | 0000-00-00 00:00:00 |                |
+----------------------+-------------------------------------------+------+-----+---------------------+----------------+
 * 
 */
?>