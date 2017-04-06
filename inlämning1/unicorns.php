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

    public function showUnicornData()
    {
      $foundUnicorn = false;
      $id = $_GET["id"];

      if(isset($id)) {
          $response = $this->getUnicorn($id);
          if($response->code == 200 && $id != "") {
            $foundUnicorn = true;
            $unicorn = $response->body;

            echo $this->generateUnicornDetails($unicorn->name,
              $unicorn->description, $unicorn->reportedBy,
              $unicorn->spottedWhen->date, $unicorn->image);
        }
      }
      if($foundUnicorn == false) {
        if(isset($id)) {
          echo "<p class='bg-danger'>Could not found unicorn with id: $id </p>";
        }
        foreach ($this->getUnicorns() as $unicorn) {
          echo $this->generateUnicornOneline($unicorn->id, $unicorn->name, $unicorn->details);
        }
      }
    }

    private function getUnicorns()
    {
      $headers = array('Accept' => 'application/json');
      $response = Unirest\Request::get('http://unicorns.idioti.se/', $headers);
      $this->log->info("All Unicorns");
      return $response->body;
    }

    private function getUnicorn($id)
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

    private static function generateUnicornOneline($id, $name, $details)
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

    private static function generateUnicornDetails($name, $description, $raporter, $time, $img)
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
