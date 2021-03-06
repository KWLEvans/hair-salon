<?php

    class Client
    {
        private $name;
        private $stylist_id;
        private $id;

        function __construct($name, $stylist_id, $id = null)
        {
            $this->name = $name;
            $this->stylist_id = $stylist_id;
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

        function getStylistId()
        {
            return $this->stylist_id;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $sql = $GLOBALS['DB']->prepare("INSERT INTO clients (name, stylist_id) VALUES (:name, :stylist_id);");
            $sql->execute([':name' => $this->getName(), ':stylist_id' => $this->getStylistId()]);
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function update($new_name)
        {
            $this->setName($new_name);
            $sql = $GLOBALS['DB']->prepare("UPDATE clients SET name = :name WHERE id = :id;");
            $sql->execute([':name' => $this->getName(), ':id' => $this->getId()]);
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients WHERE id = {$this->getId()};");
        }

        static function find($id) {
            $found_client;
            $clients = Client::getAll();
            foreach ($clients as $client) {
                if ($client->getId() == $id) {
                    $found_client = $client;
                }
            }
            return $found_client;
        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = [];

            foreach ($returned_clients as $client) {
                $name = $client['name'];
                $stylist_id = $client['stylist_id'];
                $id = $client['id'];
                $new_client = new Client($name, $stylist_id, $id);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }
    }

?>
