<?php
$args = $argv[1];
if (empty($args)) {
    echo 'Please write a controller name!';
    die;
} else {
    $target_dir = "application/controllers";
    if (strpos($args, '/')) {
        $arg = explode('/', $args);
        $file_name = ucfirst(array_pop($arg));
        foreach ($arg as $a) {
            if (!is_dir($target_dir . "/" . $a)) {
                mkdir($target_dir . "/" . $a);
            }
            $target_dir = $target_dir . "/" . $a;
        }
    } else {
        $file_name = ucfirst($args);
    }
    if (file_exists($target_dir . "/" . $file_name . ".php")) {
        echo "File already exist!";
    } else {
        $myfile = fopen($target_dir . "/" . $file_name . ".php", "w") or die("Unable to open file!");
        $class_name = $file_name;
        $txt = "<?php\n";
        $txt .= "defined('BASEPATH') or exit('No direct script access allowed');\n\n";
        $txt .= "class $class_name extends CI_Controller\n{\n\t";
        $txt .= "public function index()\n\t{\n\t\t";
        $txt .= "// Your code goes here\n\t\t\n\t}\n}";
        try {
            fwrite($myfile, $txt);
            fclose($myfile);
        } catch (Exception $e) {
            echo $e;
        }
        echo "Successfully create a controller!";
    }
}