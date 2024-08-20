
<h1>Middleware:</h1>
<p>Middleware provide a convenient mechanism for inspecting and filtering HTTP requests entering your application. For example, Laravel includes a middleware that verifies the user of your application is authenticated. If the user is not authenticated, the middleware will redirect the user to your application's login screen. However, if the user is authenticated, the middleware will allow the request to proceed further into the application.

Additional middleware can be written to perform a variety of tasks besides authentication. For example, a logging middleware might log all incoming requests to your application. A variety of middleware are included in Laravel, including middleware for authentication and CSRF protection; however, all user-defined middleware are typically located in your application's app/Http/Middleware directory.</p>


<ol>There are two types of Middleware in Laravel. </ol>

<li>1- GlobalMiddleware:will run on every HTTP request of the application</li>
<li>2-Route Middleware will be assigned to a specific route




<h2> Terminable Middleware:</h2>
<p>Terminable middleware performs some task after the response has been sent to the browser. This can be accomplished by creating a middleware with terminate method in the middleware. Terminable middleware should be registered with global middleware. The terminate method will receive two arguments $request and $response. </p>

