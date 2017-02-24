<?php

    date_default_timezone_set("America/Los_Angeles");
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";

    $app = new Silex\Application();

    $app['debug'] = true;

    $server = 'mysql:host=localhost:8889;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), ["twig.path" => __DIR__."/../views"]);

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->get('/', function() use ($app) {
        return $app['twig']->render('home.html.twig', ['stylists' => Stylist::getAll()]);
    });

    $app->post('/add_stylist', function() use ($app) {
        $name = $_POST['name'];
        $bio = $_POST['bio'];
        $new_stylist = new Stylist($name, $bio);
        $new_stylist->save();
        return $app->redirect('/');
    });

    $app->get('stylists/{id}', function($id) use ($app) {
        $stylist = Stylist::find($id);
        $clients = $stylist->getClients();
        return $app['twig']->render('stylist.html.twig', ['stylist' => $stylist, 'clients' => $clients]);
    });

    $app->post('stylists/{id}', function($id) use ($app) {
        $name = $_POST['name'];
        $stylist_id = Stylist::find($id)->getId();
        $new_client = new Client($name, $stylist_id);
        $new_client->save();
        return $app->redirect('/stylists/'.$id);
    });

    $app->patch('stylists/{id}', function($id) use ($app) {
        $stylist = Stylist::find($id);
        $new_name = $_POST['name'];
        $new_bio = $_POST['bio'];
        $stylist->update($new_name, $new_bio);
        return $app->redirect('/');
    });

    $app->delete('stylists/{id}', function($id) use ($app) {
        $stylist = Stylist::find($id);
        $stylist->delete();
        return $app->redirect('/');
    });

    $app->get('stylists/{id}/edit', function($id) use ($app) {
        $stylist = Stylist::find($id);
        return $app['twig']->render('edit_stylist.html.twig', ['stylist' => $stylist]);
    });

    return $app;
?>
