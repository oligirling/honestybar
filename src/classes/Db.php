<?php
namespace Honest;
require_once __DIR__ . '/../config.php';
use PDO;

class Db
{
    protected static $instance;
    protected $pdo;

    public function __construct() {
        $opt  = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES   => FALSE,
        );
        $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME;
        try {
            $this->pdo = new PDO($dsn, DB_USER, DB_PASS, $opt);
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());
            die('cannot connect');
        }
    }

    // a classical static method to make it universally available
    public static function instance()
    {
        if (self::$instance === null)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }

    // a proxy to native PDO methods
    public function __call($method, $args)
    {
        return call_user_func_array(array($this->pdo, $method), $args);
    }

    // a helper function to run prepared statements smoothly
    public function run($sql, $args = [])
    {
        if (!$args) {
            return $this->pdo->query($sql);
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    public static function resetConsumption()
    {
        $db = self::instance();
        $db->run('DROP TABLE IF EXISTS `consumption`;');
        return $db->run(
            'CREATE TABLE `consumption` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `person` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;');
    }

    public static function resetDb()
    {
        $db = self::instance();
        $db->run('DROP TABLE IF EXISTS `consumption`;');
        $db->run(
            'CREATE TABLE `consumption` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `person` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;');
        $db->run('DROP TABLE IF EXISTS `people`;');
        $db->run(
            'CREATE TABLE `people` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `barcode` varchar(255) DEFAULT NULL,
  `first_name` char(55) DEFAULT NULL,
  `last_name` char(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;');
        $db->run(
            "INSERT INTO `people` (`id`, `barcode`, `first_name`, `last_name`, `gender`)
VALUES
	(1,'0jamespattison0','James','Pattison','m'),
	(2,'0antonialston00','Antoni','Alston','m'),
	(3,'0oliverlynch000','Oliver','Lynch','m'),
	(4,'0elenapetrova00','Elena','Petrova','f'),
	(5,'0jessicabracey0','Jessica','Bracey','f'),
	(6,'0tomsteavenson0','Tom','Steavenson','m'),
	(7,'0lukepowell0000','Luke','Powell','m'),
	(8,'0jordanjunge000','Jordan','Junge','f'),
	(9,'0member00000000','Layla','Webb','f'),
	(10,'0jordanwells000','Jordan','Wells','m'),
	(11,'0leanacatty0000','Leana','Catty','f'),
	(12,'0afaanashiq0000','Afaan','Ashiq','m'),
	(13,'0bush0000000000','Alexandra','Bush','f'),
	(14,'0beccakatherine','Becca','Katherine','f'),
	(15,'0happy000000000','Jamie','Hopkins','m'),
	(16,'0georgeday00000','George','Day','m'),
	(17,'0callewis000000','Cal','Lewis','m'),
	(18,'0nathanthomas00','Nathan','Thomas','m'),
	(19,'0sambedford0000','Sam','Bedford','m'),
	(20,'0cocowolf000000','Coco','Wolf','f'),
	(21,'0peterdudbridge','Peter','Dudbridge','m'),
	(22,'0gregjoiner0000','Greg','Joiner','m'),
	(23,'0ashleydelport0','Ashley','Delport','m'),
	(24,'0jessiemold0000','Jessie','Mold','f'),
	(25,'0tessanelson000','Tessa','Nelson','f'),
	(26,'0megansquire000','Megan','Squire','f'),
	(27,'0martinpaunov00','Marty','Paunov','m'),
	(28,'0danielcurpen00','Daniel','Curpen','m'),
	(29,'0oligirling0000','Oli','Girling','m'),
	(30,'0russryan000000','Russ','Ryan','m'),
	(31,'0sarahpeters000','Sarah','Peters','f'),
	(32,'chantalwilliams','Chantal','Williams','f'),
	(33,'0paulbacskin000','Paul','Bacskin','m'),
	(34,'0donpepe0000000','Don','Pepe','m'),
	(35,'0saulgoodman000','Saul','Goodman','m');");


    }
}
