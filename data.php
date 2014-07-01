<?php
/*
// DB table to use
$table = 'datatables_demo';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'first_name', 'dt' => 0 ),
    array( 'db' => 'last_name',  'dt' => 1 ),
    array( 'db' => 'position',   'dt' => 2 ),
    array( 'db' => 'office',     'dt' => 3 ),
    array(
        'db'        => 'start_date',
        'dt'        => 4,
        'formatter' => function( $d, $row ) {
            return date( 'jS M y', strtotime($d));
        }
    ),
    array(
        'db'        => 'salary',
        'dt'        => 5,
        'formatter' => function( $d, $row ) {
            return '$'.number_format($d);
        }
    )
);
 
$sql_details = array(
    'user' => '',
    'pass' => '',
    'db'   => '',
    'host' => ''
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
require( 'ssp.class.php' );
 
echo $_GET['callback'].'('.json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
).');';

[
    {
        "ID": "001",
        "Bezeichnung": "Lenovo E32",
        "Typ": "Schüler-PC",
        "Aktionen": "Bearbeiten Löschen"
    },
    {
        "ID": "002",
        "Bezeichnung": "Lenovo E32",
        "Typ": "Schüler-PC",
        "Aktionen": "Bearbeiten Löschen"
    },
    {
        "ID": "003",
        "Bezeichnung": "Lenovo E32",
        "Typ": "Schüler-PC",
        "Aktionen": "Bearbeiten Löschen"
    }
]

*/
?>
{
  "draw": 1,
  "recordsTotal": 57,
  "recordsFiltered": 57,
  "data": [
    [
      "Airi",
      "Satou",
      "Accountant",
      "Tokyo",
      "28th Nov 08",
      "$162,700"
    ],
    [
      "Angelica",
      "Ramos",
      "Chief Executive Officer (CEO)",
      "London",
      "9th Oct 09",
      "$1,200,000"
    ],
    [
      "Ashton",
      "Cox",
      "Junior Technical Author",
      "San Francisco",
      "12th Jan 09",
      "$86,000"
    ],
    [
      "Bradley",
      "Greer",
      "Software Engineer",
      "London",
      "13th Oct 12",
      "$132,000"
    ],
    [
      "Brenden",
      "Wagner",
      "Software Engineer",
      "San Francisco",
      "7th Jun 11",
      "$206,850"
    ],
    [
      "Brielle",
      "Williamson",
      "Integration Specialist",
      "New York",
      "2nd Dec 12",
      "$372,000"
    ],
    [
      "Bruno",
      "Nash",
      "Software Engineer",
      "London",
      "3rd May 11",
      "$163,500"
    ],
    [
      "Caesar",
      "Vance",
      "Pre-Sales Support",
      "New York",
      "12th Dec 11",
      "$106,450"
    ],
    [
      "Cara",
      "Stevens",
      "Sales Assistant",
      "New York",
      "6th Dec 11",
      "$145,600"
    ],
    [
      "Cedric",
      "Kelly",
      "Senior Javascript Developer",
      "Edinburgh",
      "29th Mar 12",
      "$433,060"
    ]
  ]
}