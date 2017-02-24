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

        function update($new_name, $new_bio) {
            $this->setName($new_name);
            $this->setBio($new_bio);
            $sql = $GLOBALS['DB']->prepare("UPDATE stylists SET name = :name, bio = :bio WHERE id = :id;");
            $sql->execute([':name' => $this->getName(), ':bio' => $this->getBio(), ':id' => $this->getId()]);
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists WHERE id = {$this->getId()};");
        }

        static function find($id)
        {
            $found_stylist;
            $stylists = Stylist::getAll();
            foreach ($stylists as $stylist) {
                if ($stylist->getId() == $id) {
                    $found_stylist = $stylist;
                }
            }
            return $found_stylist;
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
