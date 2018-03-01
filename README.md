# Description

The application is a simulation of a toy robot moving on a square tabletop, of dimensions 5 units x 5 units. (_Please find full description in TASK.md_)

# Assumptions

 - Commands are case insensitive
 - Incorrect commands are ignored 
 - If robot is placed out of the table, all commands are ignored (keeping robot in hands)

# Installation

```
composer install
```

# Run

```
php run.php samples/sample_a.txt
```

# Testing

```
./vendor/bin/phpunit tests
```