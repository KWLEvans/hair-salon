<?php

    class Stylist
    {
        private $name;
        private $bio;
        private $id;

        function __construct($name, $bio, $id = null)
        {
            $this->name = $name;
            $this->bio = $bio;
            $this->id = $id;
        }

        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function getBio()
        {
            return $this->bio;
        }

        function setBio($new_bio)
        {
            $this->bio = $new_bio;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $sql = $GLOBALS['DB']->prepare("INSERT INTO stylists (name, bio) VALUES (:name, :bio);");
            $sql->execute([':name' => $this->getName(), ':bio' => $this->getBio()]);
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
            $stylists = [];

            foreach ($returned_stylists as $stylist) {
                $name = $stylist['name'];
                $bio = $stylist['bio'];
                $id = $stylist['id'];
                $new_stylist = new Stylist($name, $bio, $id);
                array_push($stylists, $new_stylist);
            }
            return $stylists;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists;");
        }
    }

?>
