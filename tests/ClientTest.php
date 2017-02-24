<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";
    
    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Client::deleteAll();
        }

        function test_save() {
            //Arrange
            $name = "Minori Nakada";
            $stylist_id = 1;
            $test_client = new Client($name, $stylist_id);

            //Act
            $test_client->save();
            $result = Client::getAll();

            //Assert
            $this->assertEquals($test_client, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $name = "Minori Nakada";
            $stylist_id = 1;
            $test_client = new Client($name, $stylist_id);
            $test_client->save();

            $name = "Mizuki Shida";
            $stylist_id = 4;
            $test_client2 = new Client($name, $stylist_id);
            $test_client2->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $name = "Minori Nakada";
            $stylist_id = 1;
            $test_client = new Client($name, $stylist_id);
            $test_client->save();

            $name = "Mizuki Shida";
            $stylist_id = 4;
            $test_client2 = new Client($name, $stylist_id);
            $test_client2->save();

            //Act
            Client::deleteAll();
            $result = Client::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_update()
        {
            //Arrange
            $name = "Minori Nakada";
            $stylist_id = 1;
            $test_client = new Client($name, $stylist_id);
            $test_client->save();

            //Act
            $new_name = "Makoto Hasegawa";
            $test_client->update($new_name);
            $result = Client::getAll();

            //Assert
            $this->assertEquals($test_client, $result[0]);
        }

        function test_delete()
        {
            //Arrange
            $name = "Minori Nakada";
            $stylist_id = 1;
            $test_client = new Client($name, $stylist_id);
            $test_client->save();

            $name = "Mizuki Shida";
            $stylist_id = 4;
            $test_client2 = new Client($name, $stylist_id);
            $test_client2->save();

            //Act
            $test_client->delete();
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client2], $result);
        }
    }

?>
