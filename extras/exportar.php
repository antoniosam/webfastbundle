<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
/**
 * Created by PhpStorm.
 * User: marcosamano
 * Date: 27/02/19
 * Time: 11:29 AM
 */

use Ast\MwbExporterExtra\Exporter;

require(__DIR__.'/../vendor/autoload.php');

Exporter::symfony4(__DIR__.'/site.mwb',__DIR__.'/sf4/');
Exporter::symfony3(__DIR__.'/site.mwb',__DIR__.'/sf3/');