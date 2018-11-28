# OOP Training project

## Glossary

* attribute
* autoloading
* behaviour/behavior
* class
* encapsulation
* entity
* instance
* member variable
* method
* namespace
* new keyword
* object
* property
* value object
* visibility
* state
* PSR
* PHP-FIG
* static
* scope
* this
* immutability
* interface
* inheritance
* composition
* abstraction
* overriding
* overloading
* method signature
* code style
* Generics
* Typed collection
* Repository
* MVC/ADR
* polymorphism
* constructor
* dependency injection
* dependency inversion
* dependency injection container
* relations
* aggregation

## Syntax basics

In OOP (except for languages like es5 and older javascript), one can define structures that are able to store data as
well as expose a behaviour. These structures are named classes.

```php
class User
{

}
```

In a class, the values stored (state) are named member variable, properties or attributes (even though these terms are
not mathematically equal, they are equivalent as the nuance introduced is minimal).

```php
class User
{
    var $property;
    var $memberVariable;
    var $attribute;
}
```

On top of the state, the class contains the definition of behaviour, using the form of a function, for which the scope
is limited to the class. These are named method.

```php
class User
{
    var $property;
    var $memberVariable;
    var $attribute;
    
    function thisIsABehaviour()
    {
    }
}
```

Now that the structure is defined, one (as in "the developer") can use it in one's code. The variable containing an
`instance` of a `class` is named an `object`.

```php
$myUser = new User();
```

Notice the `new` keyword above, meaning variable will contain an instance of the class.



## Step 1: project definition

The project consists at first in creating a web application that only lists invoices.

An `invoice` is made of `total price tax included`, a `creation date`, a `customer name` and a `customer address`.

The latter requirement let us consider having different objects

