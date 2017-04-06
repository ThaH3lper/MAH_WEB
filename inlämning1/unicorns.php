<?php

require_once "vendor/autoload.php";

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class UnicornHelper
{
    private $log;

    public function __construct()
    {
      $this->log = new Logger('unicorn');
      $this->log->pushHandler(new StreamHandler('visited.log', Logger::INFO));
    }
    public function getUnicorns()
    {
      $headers = array('Accept' => 'application/json');
      $response = Unirest\Request::get('http://unicorns.idioti.se/', $headers);
      $this->log->info("All Unicorns");
      return $response->body;
    }

    public function getUnicorn($id)
    {
      $headers = array('Accept' => 'application/json');
      $response = Unirest\Request::get("http://unicorns.idioti.se/$id", $headers);
      if($response->code == 200) {
        $this->log->info("Visited: " . $response->body->name);
      } else {
        $this->log->info("Tried to visit unicorn with id: $id");
      }
      return $response;
    }

    public static function generateUnicornOneline($id, $name, $details)
    {
      //In future, put this in seperate html file
        return "<div class='row'>
          <div class='container customListItem'>
            <div class='col-sm-2'>
              <p> $id </p>
            </div>
            <div class='col-sm-8'>
              <p> $name </p>
            </div>
            <div class='col-sm-2'>
              <form action='index.php' method='get'>
                  <input type='hidden' value='$id' name='id' />
                  <input type='submit' value='Details' class='btn btn-info'>
              </form>
            </div>
          </div>
        </div>";
    }

    public static function generateUnicornDetails($name, $description, $raporter, $time, $img)
    {
      //In future, put this in seperate html file
        $date = explode(" ", $time);
        return "<h2> $name </h2>
        <p><strong>Date reported: $date[0]</strong></p>
        <p> $description </p>
        <p><strong>Reporter: $raporter</strong></p>
        <img src='$img'/>";
    }
}

?>
