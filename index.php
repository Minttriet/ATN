<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$HOST = "ec2-174-129-24-148.compute-1.amazonaws.com";
$PORT = "5432";
$DBNAME = "d1g74t0e6s49db";
$USER = "tvjtxkjxjvahmk";
$PASSWORD = "1fa623a191d164af5a074cfea1a65aa3a787ce8ded1c6c9bc4940ddccab0671f";

//$link = pg_connect("host=$HOST dbname=$DBNAME user=$USER password=$PASSWORD sslmode=require");
 $link = pg_connect("dbname=d1g74t0e6s49db host=ec2-174-129-24-148.compute-1.amazonaws.com port=5432 user=
tvjtxkjxjvahmk password=1fa623a191d164af5a074cfea1a65aa3a787ce8ded1c6c9bc4940ddccab0671f sslmode=require");
//$link = pg_connect(getenv("DATABASE_URL"));

// Check connection
if($link === false){
    die("ERROR: Could not connect. ");
}
 else {echo "Connected";}

// Escape user inputs for security

$id = pg_escape_string ($link, $_REQUEST['id']);
$name = pg_escape_string ($link, $_REQUEST['name']);
$cat = pg_escape_string ($link, $_REQUEST['cat']);
$date = pg_escape_string ($link, $_REQUEST['date']);
$price = pg_escape_string ($link, $_REQUEST['price']);
$description = pg_escape_string ($link, $_REQUEST['desc']);

// Attempt insert query execution
$sql = 'INSERT INTO public."Product" ("Date", "Id", "Product_Name", "Catergory", "Descriptions", "Price") VALUES ('$id', '$name', '$cat','$date','$price','desc')";
echo $sql;

/*$sql2 = "INSERT INTO Product (Id, Product_Name, Catergory, Date, Price, Descriptions) VALUES ('02', 'Me', 'CatX','2019-12-20',11,'abc')";*/

/*$sql3 = 'INSERT INTO public."Product" (
"Date", "Id", "Product_Name", "Catergory", "Descriptions", "Price") VALUES ('."
'2019-12-23'::date, '123'::character varying(20), 'DCM'::character varying(100), 'VCL'::character varying(40), 'REEEEE'::character varying(200), '55'::integer)".
 'returning "Id"';
echo $sql3;*/

$result = pg_query($link, $sql);
echo $result;

if($result){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . pg_error($link);
}

// Close connection

pg_close($link);
?>
