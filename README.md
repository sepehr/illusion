# Illuminate Console Skeleton App
A minimal orchestration of Symfony's console with Illuminate components on top.

In clearer words; A minimal DI-enabled console application skeleton built on top of symfony/console and standalone Illuminate (Laravel) components.  

Included Illuminate components:
- illuminate/config
- illuminate/container

Supported Illuminate components:
- illuminate/log
- illuminate/database
- illuminate/filesystem


## New Application
### Create a new application
```shell
$ composer create-project sepehr/illuminate-cli-app new-cli-app/
```

### Running your new application
```
$ chmod +x bin/app
$ bin/app
```

Please note that this is not a framework, but an application skeleton; thus you're free to make any changes to any files you want; there's no "core". 


## Example command
### App\Commands\Example\Welcome
```
$ bin/app example:welcome [your-name]
```

### Remove the example command
Remove the command class from `config/app.php`:

```
$app->add(
    new Example\ExampleCommand($container)
);
```

And then remove the directory:

`$ rm -r src/Commands/Example`


## New command
### Add a new regular command
### Add a new container-aware command
### Testing your commands


## Adding more Illiminate components
...
