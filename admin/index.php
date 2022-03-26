
<?php
define('BASE_DIR', realpath(__FILE__));
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$LocalDirectory = dirname(__FILE__);
include "function.php";
session_start();

$content = 'login';
$adminLogin;
if(!isset($admin)){
$content="login";

}


if(isset($_GET['page']) && isset($adminLogin)){
$content = changePage($_GET['page']);
}else{
$content = 'login';
}
echo '<!DOCTYPE html>';
echo '<html lang="<?php echo $htmlLang ?>">';

include './header.php';

include    './nav.php';

include   './'.$content . '.php';

include  './footer.php';
 
?>