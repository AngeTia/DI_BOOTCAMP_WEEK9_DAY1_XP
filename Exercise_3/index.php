<?php
// Include the autoloader that loads all the required classes
require_once './vendor/autoload.php';

// Import the classes we'll be using
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RouteCollection;

// Create a new collection of routes
$routes = new RouteCollection();

// Add a new route to the collection with a name 'hello' and path '/hello'
$routes->add('hello', new Route('/hello', array(
    // Define a controller function that will return a 'Hello World!' response
    '_controller' => function (Request $request) {
        return new Response('Hello World !');
    }
)));

// Create a new UrlMatcher that will match the incoming request to the routes defined above
$matcher = new UrlMatcher($routes, new RequestContext());

// Create a new Request object from the incoming request
$request = Request::createFromGlobals();

try {
    // Try to match the incoming request to one of the routes
    $attributes = $matcher->match($request->getPathInfo());

    // Call the controller function defined in the matched route and pass it the request object
    $response = call_user_func_array($attributes['_controller'], array($request));
} catch (ResourceNotFoundException $e) {
    // If the request doesn't match any of the routes, return a 404 Not Found response
    $response = new Response('Not Found !', 404);
}

// Send the response to the client
$response->send();
