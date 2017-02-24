<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Stylist::deleteAll();
            Client::deleteAll();
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

        function test_getAll()
        {
            //Arrange
            $name = "Tatsuya Uchihara";
            $bio = "Straight from Blast Salon in Tokyo, the newest Hair-etic Tatsuya 'Uchi' Uchihara brings a unique flair and dazzling smile to Portland's most radical salon.";
            $test_stylist = new Stylist($name, $bio);
            $test_stylist->save();

            $name = "Hackjob Harrison";
            $bio = "One of the founders of the Hair-etics, Hackjob has pioneered a rough-cut psycho-chic esthetic which is taking Portland by storm. Inspired by the ingenuity and unbridled creativity of kindergarteners with scissors, Hackjob originals are the hottest new trend.";
            $test_stylist2 = new Stylist($name, $bio);
            $test_stylist2->save();

            //Act
            $stylists = Stylist::getAll();

            //Assert
            $this->assertEquals([$test_stylist, $test_stylist2], $stylists);
        }

        function test_deleteAll()
        {
            //Arrange
            $name = "Tatsuya Uchihara";
            $bio = "Straight from Blast Salon in Tokyo, the newest Hair-etic Tatsuya 'Uchi' Uchihara brings a unique flair and dazzling smile to Portland's most radical salon.";
            $test_stylist = new Stylist($name, $bio);
            $test_stylist->save();

            $name = "Hackjob Harrison";
            $bio = "One of the founders of the Hair-etics, Hackjob has pioneered a rough-cut psycho-chic esthetic which is taking Portland by storm. Inspired by the ingenuity and unbridled creativity of kindergarteners with scissors, Hackjob originals are the hottest new trend.";
            $test_stylist2 = new Stylist($name, $bio);
            $test_stylist2->save();

            //Act
            Stylist::deleteAll();
            $stylists = Stylist::getAll();

            //Assert
            $this->assertEquals([], $stylists);
        }

        function test_find()
        {
            //Arrange
            $name = "Tatsuya Uchihara";
            $bio = "Straight from Blast Salon in Tokyo, the newest Hair-etic Tatsuya 'Uchi' Uchihara brings a unique flair and dazzling smile to Portland's most radical salon.";
            $test_stylist = new Stylist($name, $bio);
            $test_stylist->save();

            $name = "Hackjob Harrison";
            $bio = "One of the founders of the Hair-etics, Hackjob has pioneered a rough-cut psycho-chic esthetic which is taking Portland by storm. Inspired by the ingenuity and unbridled creativity of kindergarteners with scissors, Hackjob originals are the hottest new trend.";
            $test_stylist2 = new Stylist($name, $bio);
            $test_stylist2->save();

            //Act
            $result = Stylist::find($test_stylist->getId());

            //Assert
            $this->assertEquals($test_stylist, $result);
        }

        function test_update()
        {
            //Arrange
            $name = "Tatsuya Uchihara";
            $bio = "Straight from Blast Salon in Tokyo, the newest Hair-etic Tatsuya 'Uchi' Uchihara brings a unique flair and dazzling smile to Portland's most radical salon.";
            $test_stylist = new Stylist($name, $bio);
            $test_stylist->save();

            //Act
            $new_name = "Uchi";
            $new_bio = "This isn't terrace house anymore.";
            $test_stylist->update($new_name, $new_bio);
            $stylist = Stylist::getAll()[0];

            //Assert
            $this->assertEquals($new_name, $stylist->getName());
            $this->assertEquals($new_bio, $stylist->getBio());
        }

        function test_delete()
        {
            //Arrange
            $name = "Tatsuya Uchihara";
            $bio = "Straight from Blast Salon in Tokyo, the newest Hair-etic Tatsuya 'Uchi' Uchihara brings a unique flair and dazzling smile to Portland's most radical salon.";
            $test_stylist = new Stylist($name, $bio);
            $test_stylist->save();

            $name = "Hackjob Harrison";
            $bio = "One of the founders of the Hair-etics, Hackjob has pioneered a rough-cut psycho-chic esthetic which is taking Portland by storm. Inspired by the ingenuity and unbridled creativity of kindergarteners with scissors, Hackjob originals are the hottest new trend.";
            $test_stylist2 = new Stylist($name, $bio);
            $test_stylist2->save();

            //Act
            $test_stylist->delete();
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([$test_stylist2], $result);
        }

        function test_getClients()
        {
            //Arrange
            $name = "Tatsuya Uchihara";
            $bio = "Straight from Blast Salon in Tokyo, the newest Hair-etic Tatsuya 'Uchi' Uchihara brings a unique flair and dazzling smile to Portland's most radical salon.";
            $test_stylist = new Stylist($name, $bio);
            $test_stylist->save();

            $name = "Minori Nakada";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($name, $stylist_id);
            $test_client->save();

            $name = "Mizuki Shida";
            $stylist_id = $test_stylist->getId();
            $test_client2 = new Client($name, $stylist_id);
            $test_client2->save();

            //Act
            $result = $test_stylist->getClients();

            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }
    }

?>
