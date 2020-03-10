
## Requirements:

- PHP 7.x +
- Composer

# Setup

- Clone the repository.
- Run composer install.
- Insert Discord API Token into `run.php`.
- Replace my discord user_id with yours in `App\Middleware\AdminOnly.php`.
- In project root, run `php run.php`.

## Issues

- Feel free to submit issues and enhancement requests.

## Contributing

1. Fork the repo on GitHub.
2. Clone the project to your own machine.
3. Commit changes to your own branch.
4. Push your work back up to your fork.
5. Submit a Pull request so that I can review your changes.

## File Structure

```
+-- run.php
+-- App
	+-- Yorbot.php
	+-- Core
	    +-- Resources
	        +-- Command.php
	        +-- Exception.php
	        +-- Middleware.php
	        +-- Route.php
	    +-- Structure.php
	+-- Commands
	    +-- ExampleCommand.php
	+-- Middleware
	    +-- AdminOnly.php
	+-- Event
	+-- Listener
+-- Vendor
```

## Adding Commands

- Extend `App\Core\Resource\Command` in a new file in `App\Commands`.
- Update the `boot()` method with the new Command and middleware assiocated with it in `App\Yordabot.php`.
- Register the new Route that the Command belongs too after registering the command & middleware.

```php
    // Example of registering a new 
    // command && middleware && registering the route

    public function boot()
    {
        // register command here
        $exampleCommand = new ExampleCommand();

        // set middleware here
        $middleware = new AdminOnly();
        $exampleCommand->setMiddleware($middleware);

        $this->registerCommand($exampleCommand);

        // register the commands route
        $route = new Route($exampleCommand);
        $this->registerRoute($route);
    }
```

## Credit

Special thanks to the work the folks over at [Team Reflex](https://github.com/teamreflex) have put in on the DiscordPHP package.

