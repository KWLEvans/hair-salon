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

    }

?>
