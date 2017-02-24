<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        
        protected function tearDown()
        {
            Stylist::deleteAll();
        }

        function test_save()
        {
            //Arrange
            $name = "Tatsuya Uchihara";
            $bio = "Straight from Blast Salon in Tokyo, the newest Hair-etic Tatsuya 'Uchi' Uchihara brings a unique flair and dazzling smile to Portland's most radical salon.";
            $test_stylist = new Stylist($name, $bio);

            //Act
            $test_stylist->save();
            $stylists = Stylist::getAll();

            //Assert
            $this->assertEquals($test_stylist, $stylists[0]);
        }
    }

?>
