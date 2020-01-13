# CHANGELOG

## About SemVer

In summary, [SemVer](https://semver.org/) can be viewed as `[ Breaking ].[ Feature ].[ Fix ]`, where:

- Breaking version = includes incompatible changes to the API
- Feature version = adds new feature(s) in a backwards-compatible manner
- Fix version = includes backwards-compatible bug fixes

**Version `0.x.x` doesn't have to apply any of the SemVer rules**

## Version 0.1.2 2020-01-13

- Fix phpdoc on `MicroCatalog::getEntriesArray()`, the return type was defining key type but it shouldn't.
- Do not include in distribution package folder `/develop`

## Version 0.1.1 2020-01-09

- Update license year.
- Update `psalm` to `level 1`.
- Fix issues detected by `phpstan` and `psalm` recent versions.
- Fix Scrutinizer-CI build.
- Fix Travis-CI build, move from PHP `7.4snapshot` to `7.4`.

## Version 0.1.0 2019-09-30

- Initial release
