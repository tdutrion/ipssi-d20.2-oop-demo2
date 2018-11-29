# OOP Training project

## How to run the project

### Configuration

```
cp config/database.local.php.dist config/database.local.php
```

Then edit `config/database.local.php` and set your own variables, or remove the key to enable the global configuration.

### Serveur PHP

Either you can use a local server or the PHP integrated development server.

Using the latter, run the following command (given your port 8888 is free):

```
php -S localhost:8888
```

Then visit `http://localhost:8888`.

### Database

You'll need a mysql 5.7 database to run the project. Data are located in `resources/env/local/fixtures`.

## Glossary

* attribute: variable located inside a class that stores a part of the state of that class. It is sometimes used in place of the property (see definition), but while the property is a collaborator, the attribute is a part of the definition of the class.
* collaborator: object that interacts with another object in order to produce a given result.
* autoloading: in an interpreted language where there is no compilation nor assembly, classes are not referenced in a single location, hence the need for a method allowing the retrieval of the definition of the class. The autoloading is therefore the mechanism used to retrieve said classes.
* behaviour/behavior: description of a characteristic or an intention of an object. Formalised with `interface` in most languages.
* class: structure made of attributes, properties and methods.
* method: function contained in a class, implementation of behaviour.
* encapsulation: ability for an object not to disclose its actual state nor the actual underlying implementation of the characteristics on which the behaviour exposed is based.
* entity: object with a lifetime, which evolves and represents an element of the business/the domain. It has a unique identifier, and equality is defined by comparing this identifier.
* instance: variable resulting from the creation of an object of a given class.
* member variable: attribute or property
* method: function in a class.
* namespace: an abstract container or environment created to hold a logical grouping of unique identifiers or symbols (i.e. names). Very useful for using short contextualised names and to explicit naming.
* new keyword: keyword to allow the creation of a new instance of a class.
* object: instance of class.
* property: member variable that refers to a third party attribute, act as a owning side of a relation.
* value object: object for which the sole purpose it to store a value after having validated it, and then expose it back.
* visibility (private, protected, public): defines who can access a structure's content.
* state: current value of an element.
* PSR: 
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


## Exemple

A `Character` has a `force` and a `sword`, and is able to `fight`.

The class is `Character`, the `force` is an attribute, the `sword` is a property and `fight` is a method.

Considering `$character1 = new Character()`, `$character1` is a variable containing an `instance` of the class `Character`. The value of the variable `$character1` is therefore an `object`.

Adding `$character2 = new Character()`, the value of the variable `$character2` is another `instance` of the class `Character`.

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

