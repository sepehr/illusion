# Illuminate Console Skeleton App
A DI-enabled console application skeleton built on top of symfony/console and standalone Illuminate (Laravel) components.  

Included Illuminate components are:
- Container
- Log
- Config
- Database (optional)

## Create a new application
```shell
$ composer create-project sepehr/illuminate-cli-app new-cli-app/
```

## Running your application
```
$ chmod +x bin/app
$ bin/app
```

## Example command: Welcome
```
$ bin/app welcome
Welcome!
```

## Remove the example command
Remove the command class from `bin/app`:

```
$app->add(
    new Example\ExampleCommand($container)
);
```

And then remove the directory:

`$ rm -r src/Welcome`

## Adding more components
...
