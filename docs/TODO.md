# eclipxe/micro-catalog To Do List

## `substr` calls

The function `substr()` on PHP versions lower than PHP 8.0 can return false.
Remove the cast to string when this library is no longer compatible with those versions.
